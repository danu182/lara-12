<?php

namespace App\Http\Controllers;

use App\services\ApiServices;
use Illuminate\Http\Request;

class TestController extends Controller
{
   protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        return view('vclaim.peserta.index');
    }

    public function getData()
    {
        $tanggal='12-03-2025';
        $tanggal2=$this->apiService->formatDate($tanggal);
        // return $tanggal;
        

        $url = config('vclaim.baseurl')."Peserta/nokartu/0001052288043/tglSEP/2025-04-22";
        $data = $this->apiService->fetchData($url);
        // return $data;
      
        // Check if there is an error in the response
        if (isset($data->error)) {
            // Pass the error message to the view
            return view('vclaim.peserta.hasil', ['error' => $data['error']]);
        }

        return view('vclaim.peserta.hasil', compact('data'));
    }



    public function test()
    {
        return view('dataTable');
    }

    public function getDataModel()
    {
            
        // $data = [
            
        //     [
        //         'id'=>1,
        //         'nama'=>"budi",
        //     ],
        //      [   'id'=>2,
        //         'nama'=>"wati",
        //     ],
        //       [  'id'=>3,
        //         'nama'=>"joko",
        // ],
        // [
        //         'id'=>4,
        //         'nama'=>"maman",
        // ],
        //   [      'id'=>5,
        //         'nama'=>"bambang",
        //     ],
        // ];

        // return response()->json($data);

        $url = config('vclaim.baseurl')."RencanaKontrol/ListRencanaKontrol/tglAwal/2025-04-29/tglAkhir/2025-04-29/filter/2"
;
        $data = $this->apiService->fetchData($url);
        return $data; 

    }


    

    public function inputModel()
    {
        $data = [
            
            [
                'id'=>1,
                'nama'=>"budi",
            ],
             [   'id'=>2,
                'nama'=>"wati",
            ],
              [  'id'=>3,
                'nama'=>"joko",
            ],
            [
                'id'=>4,
                'nama'=>"maman",
            ],
            [      'id'=>5,
                'nama'=>"bambang",
            ],
        ];
        // return response()->json($data);

        
        // return $data;
        return view('modal.input', compact('data'));
    }


    public function modalPost(Request $request)
    {
        return $request->all();
    }

    public function getdatabaru()
    {
        // return $request->all();
        
        // $title = "Cari Nomor Surat Kontrol";
        // $Parameter1 = $request->parameter1; 
        // $Parameter2 = $request->parameter2; 
        // $Parameter2 = $this->apiService->formatDate($request->parameter2);
        
        $alamat="{BASE URL}/{Service Name}/RencanaKontrol/ListRencanaKontrol/tglAwal/{parameter 1}/tglAkhir/{parameter 2}/filter/{parameter 3}
";
        $url = config('vclaim.baseurl')."RencanaKontrol/ListRencanaKontrol/tglAwal/2025-04-29/tglAkhir/2025-04-29/filter/1"
;
        $data = $this->apiService->fetchData($url);
        return $data;   
      
        // Check if there is an error in the response
        // if($data['metaData']['code'] == 500){
        //     return view('vclaim.Rencana_Kontrol.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        // }
        // elseif ($data['metaData']['code'] <> 200) {
        //     return view('vclaim.Rencana_Kontrol.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        // }
        // elseif($data['metaData']['code']==200){
        //     return view('vclaim.Rencana_Kontrol.pesertaNoKa.hasil', compact('data','Parameter1','Parameter2','title','alamat'));
        // }
        // return view('vclaim.Rencana_Kontrol.pesertaNoKa.index');
    
    }

}
