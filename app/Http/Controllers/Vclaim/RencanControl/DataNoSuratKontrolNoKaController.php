<?php

namespace App\Http\Controllers\Vclaim\RencanControl;

use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class DataNoSuratKontrolNoKaController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $title='Data Nomor Surat Kontrol Berdasarkan No Kartu!';
        $label1="Parameter 1: Bulan. Contoh: Januari => 01";
        $label2 = "Parameter 2: Tahun";
        $label3="Parameter 3: Nomor Kartu";
        $label4="Parameter 4: Format filter --> 1: tanggal entri, 2: tanggal rencana kontrol";
        return view('vclaim.Rencana_Kontrol.suratKontrolNoKa.index', compact('title', 'label1','label2','label3','label4'));
    }

    public function getData(Request $request)
    {
        return $request->all();
        
        $title = "Cari Nomor Surat Kontrol";
        $Parameter1 = $request->parameter1; 
        $Parameter2 = $request->parameter2; 
        $Parameter2 = $this->apiService->formatDate($request->parameter2);
        
        $alamat="{BASE URL}/{Service Name}/RencanaKontrol/noSuratKontrol/".$Parameter1;
        $url = config('vclaim.baseurl')."RencanaKontrol/noSuratKontrol/".$Parameter1;
        $data = $this->apiService->fetchData($url);
        // return $data;   
      
        // Check if there is an error in the response
        if($data['metaData']['code'] == 500){
            return view('vclaim.Rencana_Kontrol.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif ($data['metaData']['code'] <> 200) {
            return view('vclaim.Rencana_Kontrol.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        elseif($data['metaData']['code']==200){
            return view('vclaim.Rencana_Kontrol.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        }
        return view('vclaim.Rencana_Kontrol.pesertaNoKa.index');
    }
}
