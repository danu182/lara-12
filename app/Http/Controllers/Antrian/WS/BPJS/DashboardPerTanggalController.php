<?php

namespace App\Http\Controllers\Antrian\WS\BPJS;

use App\Http\Controllers\Controller;
use App\services\ApiAntrianWSBpjs;
use Illuminate\Http\Request;

class DashboardPerTanggalController extends Controller
{
    protected $apiService;

    public function __construct(ApiAntrianWSBpjs $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $title='Dashboard Antrian Per Tanggal!';
        $label1='Parameter1 : {diisi tanggal}=> 2021-04-16';
        $label2='Parameter2 : {diisi waktu}=> rs atau server';
        return view('antrian.wS.bpjs.dashboardPerTanggal.Diagnosa.index', compact('title','label1','label2'));
    }

    public function getData(Request $request)
    {

        // return $request->all();

        $title = "Dashboard antrian per Tanggal";
        $Parameter1 = $this->apiService->formatDate($request->parameter1);
        $Parameter2 = $request->parameter2; 
        // return $Parameter1;
        
        $alamat="dashboard/waktutunggu/tanggal/".$Parameter1."/waktu/".$Parameter2;
        $url = config('vclaim.baseurlAntrian')."dashboard/waktutunggu/tanggal/".$Parameter1."/waktu/".$Parameter2;
        $data =collect(  $this->apiService->fetchData($url)->json());
        // return $data;   
      
        try{
            // Check if there is an error in the response
            if($data['metadata']['code'] == 500){
                return view('antrian.wS.bpjs.dashboardPerTanggal.Diagnosa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
            }
            elseif ($data['metadata']['code'] <> 200) {
                return view('antrian.wS.bpjs.dashboardPerTanggal.Diagnosa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
            }
            elseif($data['metadata']['code']==200){
                // $label= $data->keys();
                // $datas= $data['response']['list']->value();

                // return $data;
                return view('antrian.wS.bpjs.dashboardPerTanggal.Diagnosa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
            }
        }
        catch (\Exception $e) {
            return redirect()->route('Antrian.DashboardPerTanggal');
        }
        
    }
}
