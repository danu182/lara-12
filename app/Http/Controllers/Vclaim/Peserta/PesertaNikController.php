<?php

namespace App\Http\Controllers\Vclaim\Peserta;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class PesertaNikController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $title='Cari Peserta Dengan No NIK!';
        return view('vclaim.peserta.pesertaNIK.index', compact('title'));
    }

    public function getData(Request $request)
    {
        $alamat="{BASE URL}/{Service Name}/Peserta/nik/{parameter 1}/tglSEP/{parameter 2}";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $this->apiService->formatDate($request->parameter2);

        $url = config('vclaim.baseurl')."Peserta/nik/".$Parameter1."/tglSEP/".$Parameter2;
        $data = $this->apiService->fetchData($url);
        // return $data;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.peserta.pesertaNIK.hasil', compact('data','Parameter1','Parameter2','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.peserta.pesertaNIK.hasil', compact('data','Parameter1','Parameter2','alamat'));
        }
        elseif($data['metaData']['code']==200){
            return view('vclaim.peserta.pesertaNIK.hasil', compact('data','Parameter1','Parameter2','alamat'));
        }
        
    }

}
