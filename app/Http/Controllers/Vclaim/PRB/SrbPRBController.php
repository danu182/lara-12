<?php

namespace App\Http\Controllers\Vclaim\PRB;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class SrbPRBController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $title='Fungsi : Pencarian Data PRB!';
        $label1="Parameter 1 : No. SRB Peserta";
        $label2="Parameter 2 : No. SEP";
        return view('vclaim.PRB.Nomor_SRB.index', compact('title', 'label1','label2'));
    }

    public function getData(Request $request)
    {
        $title = "Pencarian Data PRB";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $request->parameter2; 
        // $Parameter2 = $this->apiService->formatDate($request->parameter2);
        
        $alamat="prb/".$Parameter1."/nosep/".$Parameter2;
        $url = config('vclaim.baseurl')."prb/".$Parameter1."/nosep/".$Parameter2;
        $data = $this->apiService->fetchData($url);
        // return $data;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.PRB.Nomor_SRB.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.PRB.Nomor_SRB.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif($data['metaData']['code']==200){
            return view('vclaim.PRB.Nomor_SRB.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        
    }
}
