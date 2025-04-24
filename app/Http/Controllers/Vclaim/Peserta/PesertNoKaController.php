<?php

namespace App\Http\Controllers\Vclaim\Peserta;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class PesertNoKaController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        return view('vclaim.peserta.pesertaNoKa.index');
    }

    public function getData(Request $request)
    {
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $this->apiService->formatDate($request->parameter2);

        $url = config('vclaim.baseurl')."Peserta/nokartu/".$Parameter1."/tglSEP/".$Parameter2;
        $data = $this->apiService->fetchData($url);
        // return $data;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.peserta.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.peserta.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2'));
        }
        elseif($data['metaData']['code']==200){
            return view('vclaim.peserta.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2'));
        }
        
    }


}
