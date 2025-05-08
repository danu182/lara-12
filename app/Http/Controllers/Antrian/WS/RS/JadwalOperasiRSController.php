<?php

namespace App\Http\Controllers\Antrian\WS\RS;

use App\Http\Controllers\Controller;
use App\services\ApiAntrianWSBpjs;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class JadwalOperasiRSController extends Controller
{
    protected $apiService;

    public function __construct(ApiAntrianWSBpjs $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $title="Jadwal Operasi RS";
        return view('antrian.wS.RS.jadawlOperasi.pesertaNIK.index', compact('title'));
    }

    public function hasil(Request $request)
    {

        $alamat = "JadwalOperasiRS";
        $tanggalawal = $request->parameter1;
        $tanggalakhir = $request->parameter2;

        $data =  $this->apiService->fetchDataAntrian($tanggalawal,$tanggalakhir, $alamat);
        $title="list jadwal operasi rs";
        $alamat= config('vclaim.baseurl_ws_rs_antrol').$alamat;
        // return $alamat;
        return view('antrian.wS.RS.jadawlOperasi.pesertaNIK.hasil', compact('data','title','alamat'));
    }


}
