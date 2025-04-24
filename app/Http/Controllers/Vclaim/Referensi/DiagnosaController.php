<?php

namespace App\Http\Controllers\Vclaim\Referensi;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $title='Fungsi : Pencarian data diagnosa (ICD-10)!';
        return view('vclaim.referensi.Diagnosa.index', compact('title'));
    }

    public function getData(Request $request)
    {
        $title = "Hasil pencarian Diangnosa";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $this->apiService->formatDate($request->parameter2);
        
        $alamat="referensi/diagnosa/".$Parameter1;
        $url = config('vclaim.baseurl')."referensi/diagnosa/".$Parameter1;
        $data = $this->apiService->fetchData($url);
        // return $data;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.referensi.Diagnosa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.referensi.Diagnosa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif($data['metaData']['code']==200){
            // return $data;
            return view('vclaim.referensi.Diagnosa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        
    }
}
