<?php

namespace App\Http\Controllers\Vclaim\Referensi;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Http\Request;

class DpjpController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index(Request $request)
    {
        $title = "Pencarian Dokter DPJP";
        $label1 = "Pencarian Dokter DPJP";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $this->apiService->formatDate($request->parameter2);
        
        $alamat="{Base URL}/{Service Name}/referensi/spesialistik";
        $url = config('vclaim.baseurl')."referensi/spesialistik";
        // return $url;
        $data = $this->apiService->fetchData($url);
        // return $url;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.referensi.DPJP.index', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.referensi.DPJP.index', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif($data['metaData']['code']==200){
            return view('vclaim.referensi.DPJP.index', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        return view('vclaim.referensi.DPJP.index', compact('title'));
    }

    public function getData(Request $request)
    {
        // return $request->all();
        $alamat="{BASE URL}/{Service Name}/Peserta/nik/{parameter 1}/tglSEP/{parameter 2}";
        $title="Dokter DPJP (Pencarian data dokter DPJP untuk pengisian DPJP Layan)";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $this->apiService->formatDate($request->parameter2);
        $Parameter3 = $request->parameter3;;

        $url = config('vclaim.baseurl')."referensi/dokter/pelayanan/".$Parameter1."/tglPelayanan/".$Parameter2."/Spesialis/".$Parameter3;
        $data = $this->apiService->fetchData($url);
        // return $url;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.referensi.DPJP.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.referensi.DPJP.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif($data['metaData']['code']==200){
            // return $data;
            return view('vclaim.referensi.DPJP.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        return redirect()->route('vclaim.referensi.dpjp');
    }
}
