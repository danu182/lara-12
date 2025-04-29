<?php

namespace App\Http\Controllers\Antrian;

use App\Helpers\Headers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        try{
            $data=Headers::setHeaders();
            $data['user_key']=config('vclaim.user_key_antrian');
            // return $data;
            return view('vclaim.index', compact('data'));

        }
        catch (\Exception $e){
            return "error:";
            // return response()->view('errors.custom', [], 500);
        }
    }
}
