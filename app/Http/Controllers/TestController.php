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

}
