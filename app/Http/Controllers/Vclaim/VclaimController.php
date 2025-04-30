<?php

namespace App\Http\Controllers\Vclaim;

use App\Helpers\Headers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Helper;

class VclaimController extends Controller
{
    public function index()
    {
        try{
            $baseUrl=config('vclaim.baseurlAntrian');
            $data=Headers::setHeaders();
            $data['user_key']=config('vclaim.user_key');
            // return $data;
            return view('vclaim.index', compact('data','baseUrl'));

        }
        catch (\Exception $e){
            return "error:";
            // return response()->view('errors.custom', [], 500);
        }
    }
}
