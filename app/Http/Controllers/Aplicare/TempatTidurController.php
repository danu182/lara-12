<?php

namespace App\Http\Controllers\Aplicare;

use App\Helpers\Headers;
use App\Http\Controllers\Controller;
use App\services\ApiServices;
use Illuminate\Http\Request;

class TempatTidurController extends Controller
{
    protected $apiService;

    public function __construct(ApiServices $apiService)
    {
        $this->apiService = $apiService;
    }
    public function index()
    {

        $ws ="aplicaresws/rest/bed/read/0221R011/1/100";
        

            $alamat="{BASE URL}/{Service Name}/aplicaresws/rest/bed/read/0221R011/1/100";
            $url = config('vclaim.baseurlAplicare').$ws;
            $data = $this->apiService->getbed($url);
            
            $hasil = $data->json();
            // return $hasil;
            // $hasil=['response']['list'];   
            // return $hasil['response']['list'];

            if ($hasil['metadata']['code'] == 1) {
                // Mengelompokkan data berdasarkan kodekelas
                $groupedRooms = collect($hasil['response']['list'])->groupBy('kodekelas');
                return view('aplicareBPJD.index2', compact('groupedRooms'));
            }
            return response()->json(['message' => 'Data tidak ditemukan'], 404);




            // $hasil = $data['response']['list']    ;
            // return ;
            return view('aplicareBPJD.index',compact('hasil'));
        
           
    }
}

