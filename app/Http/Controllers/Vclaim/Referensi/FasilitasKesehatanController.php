<?php

namespace App\Http\Controllers\Vclaim\Referensi;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class FasilitasKesehatanController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $title='Fungsi : Pencarian data fasilitas kesehatan!';
        $label1="Parameter : Kode atau Nama Poli";
        $label2="Parameter 2 : Jenis Faskes (1. Faskes 1, 2. Faskes 2/RS)";
        return view('vclaim.referensi.Fasilitas_kesehatan.index', compact('title', 'label1','label2'));
    }

    public function getData(Request $request)
    {
        
        $title = "Hasil pencarian Fasilitas Kesehatan";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $request->parameter2;
        
        $alamat="referensi/faskes/".$Parameter1."/".$Parameter2;
        $url = config('vclaim.baseurl')."referensi/faskes/".$Parameter1."/".$Parameter2;
        $data = $this->apiService->fetchData($url);
        // return $data;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.referensi.Fasilitas_kesehatan.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.referensi.Fasilitas_kesehatan.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif($data['metaData']['code']==200){
            return view('vclaim.referensi.Fasilitas_kesehatan.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        
    }
}
