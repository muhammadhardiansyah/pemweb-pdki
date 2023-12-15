<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\DataPDKIController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function search(Request $request, DataPDKIController $pdki) {
        $responses = $pdki->search($request->search);
        return view('search',[
            'responses' => $responses['hits']['hits'], 
            'request' =>$request->search
        ]);
    }

    public function show($id, DataPDKIController $pdki){
        $responses = $pdki->search($id);
        return view('show',[
            'response' => $responses['hits']['hits'][0]['_source']
        ]);
    }
}
