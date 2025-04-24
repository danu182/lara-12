<?php

namespace App\Http\Controllers\Vclaim\Referensi;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $title='Fungsi : Pencarian data poli!';
        $label="Parameter : Kode atau Nama Poli";
        return view('vclaim.referensi.Poli.index', compact('title', 'label'));
    }

    public function getData(Request $request)
    {
        $title = "Hasil pencarian Poli";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $this->apiService->formatDate($request->parameter2);
        
        $alamat="referensi/poli/".$Parameter1;
        $url = config('vclaim.baseurl')."referensi/poli/".$Parameter1;
        $data = $this->apiService->fetchData($url);
        // return $data;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.referensi.Poli.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.referensi.Poli.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif($data['metaData']['code']==200){
            return view('vclaim.referensi.Poli.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        
    }
}
