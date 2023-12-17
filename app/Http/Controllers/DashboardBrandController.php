<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\User;
use App\Notifications\ReviseBrandNotification;
use App\Notifications\ApproveBrandNotification;
use App\Notifications\RejectBrandNotification;
use App\Http\Controllers\DataPDKIController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Notification;

class DashboardBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin'))
        {
            return view('brands.index', [
                'active' => 'dash_brands',
                'brands' => Brand::latest()->get()
            ]);
        }
        else
        {
            return view('brands.index', [
                'active' => 'dash_brands',
                'brands' => Brand::where('user_id',auth()->user()->id)->latest()->get()
            ]);
        }
    }

    private function similiarity(String $string1, String $string2)
    {
        $word1 = strtolower($string1);
        $word2 = strtolower($string2);

        $levenshteinDistance = levenshtein($word1, $word2);
        $maxStringLength = max(strlen($word1), strlen($word2));

        // Calculate similarity percentage
        $percent = ($maxStringLength - $levenshteinDistance) / $maxStringLength * 100;

        return round($percent, 1);
    }

    private function get_PDKI_table(DataPDKIController $pdki, String $string)
    {
        $array = [];
        $responses = $pdki->search($string);
        $i = 0;
        foreach ($responses['hits']['hits'] as $item) {
            if ($i < 3) {
                $array[] = [
                    'id' => $item['_id'],
                    'name' => $item['_source']['nama_merek'],
                    'similiarity' => $this->similiarity($item['_source']['nama_merek'], session('brand_name')),
                    'image' => $item['_source']['image'][0]['image_path']
                ];
            } else {
                break;
            }
            $i++;
        }
        return $array;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DataPDKIController $pdki)
    {
        if (session('brand_name')) {
            session(['name' => session('brand_name')]);
            return view('brands.create', [
                'active' => 'dash_brands',
                'responses' => $this->get_PDKI_table($pdki,session('name'))
            ]);
        } else {
            return view('brands.create', [
                'active' => 'dash_brands'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'name'          => 'required|min:3|max:255',
            'user_id'     => 'required',
            'address'       => 'required|min:3|max:255',
            'owner'         => 'required|min:3|max:255',
            'logos'         => 'required|image|file|max:2048',
            'certificate'   => 'mimes:pdf|max:10000',
            'signature'     => 'required|image|file|max:2048',
        ]);

        if ($request->file('logos')) {
            $validatedData['logos'] = $request->file('logos')->store('brand-logos');
        }
        if ($request->file('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('brand-certificate');
        }
        if ($request->file('signature')) {
            $validatedData['signature'] = $request->file('signature')->store('brand-signature');
        }

        // Memeriksa keunikan slug
        // $validatedData['slug'] = Validator::make(['slug' => $validatedData['slug']],['slug' => 'required|unique:posts,slug'])->validate()['slug'];

        Brand::create($validatedData);

        return redirect('/admin/brands')->with('success', 'Merek berhasil diajukan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('brands.show', [
            'active' => 'dash_brands',
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand, DataPDKIController $pdki)
    {
        if (session('brand_name')) {
            session(['name' => session('brand_name')]);
            return view('brands.edit', [
                'active' => 'dash_brands',
                'responses' => $this->get_PDKI_table($pdki,session('name')),
                'brand' => $brand
            ]);
        } else {
            return view('brands.edit', [
                'active' => 'dash_brands',
                'brand' => $brand
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'name'          => 'required|min:3|max:255',
            'address'       => 'required|min:3|max:255',
            'owner'         => 'required|min:3|max:255',
            'logos'         => 'image|file|max:2048',
            'certificate'   => 'mimes:pdf|max:10000',
            'signature'     => 'image|file|max:2048',

        ];

        $validatedData = $request->validate($rules);

        if ($request->file('logos')) {
            if ($brand->logos) {
                Storage::delete($brand->logos);
            }
            $validatedData['logos'] = $request->file('logos')->store('brand-logos');
        }
        if ($request->file('certificate')) {
            if ($brand->certificate) {
                Storage::delete($brand->certificate);
            }
            $validatedData['certificate'] = $request->file('certificate')->store('brand-certificate');
        }
        if ($request->file('signature')) {
            if ($brand->signature) {
                Storage::delete($brand->signature);
            }
            $validatedData['signature'] = $request->file('signature')->store('brand-signature');
        }

        if ($brand->decision == 3) {
            $validatedData['decision'] = 2;
        }


        Brand::where('id', $brand->id)->update($validatedData);

        return redirect('/admin/brands')->with('warning', 'Pengajuan merek berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->logos) {
            Storage::delete($brand->logos);
        }
        if ($brand->certificate) {
            Storage::delete($brand->certificate);
        }
        if ($brand->signature) {
            Storage::delete($brand->signature);
        }
        Brand::destroy($brand->id);

        return redirect('/admin/brands')->with('danger', 'Pengajuan merek sudah dihapus!');
    }

    public function accept(Brand $brand)
    {
        Brand::where('id', $brand->id)->update(['decision' => 1]);
        $user = User::find($brand->applicant->id);
        $user->notify(new ApproveBrandNotification($brand));
        return redirect('/admin/brands')->with('success', 'Pengajuan merek sudah disetujui!');
    }

    public function reject(Request $request)
    {
        Brand::where('id', $request->id_brand)->update(['decision' => 0]);
        $brand = Brand::find($request->id_brand);
        $user = User::find($brand->applicant->id);
        $user->notify(new RejectBrandNotification($brand, $request->notes));
        return redirect('/admin/brands')->with('danger', 'Pengajuan merek sudah ditolak!');
    }

    public function revise(Request $request)
    {
        Brand::where('id', $request->id_brand)->update(['decision' => 3]);
        $brand = Brand::find($request->id_brand);
        $user = User::find($brand->applicant->id);
        $user->notify(new ReviseBrandNotification($brand, $request->notes));
        return redirect('/admin/brands')->with('warning', 'Pengajuan merek harus direvisi!');
    }

    public function checkCreate(Request $request)
    {
        return redirect('/admin/brands/create')->with('brand_name', $request->name);
    }
    public function checkEdit($id, Request $request)
    {
        $brand = Brand::find($id);
        return redirect('/admin/brands/'.$brand->id.'/edit')->with('brand_name', $request->name);
    }
}
