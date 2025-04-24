<?php

namespace App\Http\Controllers\Vclaim\Referensi;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class ObatGnerikPRBController extends Controller
{

    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $title ='Fungsi : Pencarian data Obat Generik Program PRB!';
        $label1 ="Parameter 1 : nama obat generik";
        $label2 ="Parameter 2 : Jenis Faskes (1. Faskes 1, 2. Faskes 2/RS)";
        return view('vclaim.referensi.Obat_Generik_Program_PRB.index', compact('title', 'label1','label2'));
    }

    public function getData(Request $request)
    {
        // return $request->all();   
        $title = "Hasil pencarian Obat Generik Program PRB";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $request->parameter2;
        
        $alamat="referensi/faskes/".$Parameter1."/".$Parameter2;
        $url = config('vclaim.baseurl')."referensi/obatprb/".$Parameter1;
        $data = $this->apiService->fetchData($url);
        // return $data;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.referensi.Obat_Generik_Program_PRB.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.referensi.Obat_Generik_Program_PRB.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif($data['metaData']['code']==200){
            return view('vclaim.referensi.Obat_Generik_Program_PRB.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        return redirect()->route('vclaim.referensi.ObatGnerikPRBController');
    }
}
