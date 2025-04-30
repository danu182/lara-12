<?php

namespace App\Http\Controllers\Antrian\WS\BPJS;

use App\Http\Controllers\Controller;
use App\services\ApiAntrianWSBpjs;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class DashboardPerBulanController extends Controller
{
    protected $apiService;

    public function __construct(ApiAntrianWSBpjs $apiService)
    {
        $this->apiService = $apiService;
    }

    


    public function index()
    {
        $bulan=[
            "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"
        ];

        $title='Dashboard Antrian Per Tanggal!';
        $label1='Parameter1 : {diisi bulan}=> 07';
        $label2='Parameter2 : {diisi tahun}=> 2021';
        $label3='Parameter3 : {diisi waktu}=> rs atau server';
        return view('antrian.wS.bpjs.dashbpardPerBulan.dashboard.index', compact('title','bulan','label1','label2'));
    }

    public function getData(Request $request)
    {

        // return $request->all();

        $title = "Dashboarr Antrian MJKN per Bulan";
        $Parameter1 = $request->parameter1; // bulan contoh 07
        $Parameter2 = $request->parameter2; // tahun contoh 2024
        $Parameter3 = $request->parameter3; // rs atau
        // return $Parameter1;
        
        $alamat="dashboard/waktutunggu/bulan/{Parameter1}/tahun/{Parameter2}/waktu/{Parameter3}";
        $url = config('vclaim.baseurlAntrian')."dashboard/waktutunggu/bulan/".$Parameter1."/tahun/".$Parameter2."/waktu/".$Parameter3;
        $data =collect(  $this->apiService->fetchData($url)->json());
        // return $data;   
      
        try{
            // Check if there is an error in the response
            if($data['metadata']['code'] == 500){
                return view('antrian.wS.bpjs.dashbpardPerBulan.dashboard.hasil', compact('data','Parameter1','Parameter2','Parameter1','title','alamat'));
            }
            elseif ($data['metadata']['code'] <> 200) {
                return view('antrian.wS.bpjs.dashbpardPerBulan.dashboard.hasil', compact('data','Parameter1','Parameter2','Parameter1','title','alamat'));
            }
            elseif($data['metadata']['code']==200){
                return view('antrian.wS.bpjs.dashbpardPerBulan.dashboard.hasil', compact('data','Parameter1','Parameter2','Parameter1','title','alamat'));
            }
        }
        catch (\Exception $e) {
            return redirect()->route('Antrian.DashboardPerBulan');
        }
        
    }
}
