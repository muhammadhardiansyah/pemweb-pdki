<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DataPDKIController extends Controller
{
    public function search(String $string) {
        $responses = Http::withHeaders([
            'Pdki-Signature' => 'PDKI/4716dc3d0b6f7c4b50216006783350031fde61cd3d69cddc3ff78fcc968ec27ac995d8e272d2e59df430af4fc33d0175bd45716163b5931586ce8f24cd86cc81'
        ])->get('https://pdki-indonesia.dgip.go.id/api/search?keyword='.$string.'&page=1&showFilter=true&type=trademark')->json();
        
        return $responses;
    }
    public function searchSingle(String $id){
        $response= Http::withHeaders([
            'Pdki-Signature' => 'PDKI/4716dc3d0b6f7c4b50216006783350031fde61cd3d69cddc3ff78fcc968ec27ac995d8e272d2e59df430af4fc33d0175bd45716163b5931586ce8f24cd86cc81'
        ])->get('https://pdki-indonesia.dgip.go.id/api/search?keyword='.$id.'&page=1&showFilter=true&type=trademark')->json();
        return $response;
    }
}
