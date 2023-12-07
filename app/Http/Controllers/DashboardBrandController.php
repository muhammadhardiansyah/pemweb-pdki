<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('brands.index', [
            'active'=> 'dash_brands',
            'brands' => Brand::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create',[
            'active' => 'dash_brands'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'name'          => 'required|min:3|max:255',
            'address'       => 'required|min:3|max:255',
            'owner'         => 'required|min:3|max:255',
            'logos'         => 'image|file|max:2048',
            'certificate'   => 'mimes:pdf|max:10000',
            'signature'     => 'image|file|max:2048',
        ]);

        if ($request -> file('logos')) {
            $validatedData['logos'] = $request->file('logos')->store('brand-logos');
        }
        if ($request -> file('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('brand-certificate');
        }
        if ($request -> file('signature')) {
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
        return view('brands.show',[
            'active' => 'dash_brands',
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit',[
            'active' => 'dash_brands',
            'brand' => $brand
        ]);
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

        $validatedData= $request->validate($rules);
        
        if ($request -> file('logos')) {
            if($brand->logos){
                Storage::delete($brand->logos);
            }
            $validatedData['logos'] = $request->file('logos')->store('brand-logos');
        }
        if ($request -> file('certificate')) {
            if($brand->certificate){
                Storage::delete($brand->certificate);
            }
            $validatedData['certificate'] = $request->file('certificate')->store('brand-certificate');
        }
        if ($request -> file('signature')) {
            if($brand->signature){
                Storage::delete($brand->signature);
            }
            $validatedData['signature'] = $request->file('signature')->store('brand-signature');
        }
        
        
        Brand::where('id', $brand->id)->update($validatedData);

        return redirect('/admin/brands')->with('warning', 'Pengajuan merek berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if($brand->logos){
            Storage::delete($brand->logos);
        }
        if($brand->certificate){
            Storage::delete($brand->certificate);
        }
        if($brand->signature){
            Storage::delete($brand->signature);
        }
        Brand::destroy($brand->id);

        return redirect('/admin/brands')->with('danger', 'Pengajuan merek sudah dihapus!');
    }
}
