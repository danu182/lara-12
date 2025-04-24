<?php
namespace App\Helpers;

use DateTime;
use Illuminate\Support\Facades\Http;


class Headers{
    public static function setHeaders(){
        $consid = config('vclaim.consid');
        $secretKey = config('vclaim.secretKey');
        $user_key=config('vclaim.user_key');
        // $user_key="7586aabd0e7b9846ebec940d1c2cd83a";
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $consid."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
       
        $headers = [
            'X-cons-id'=>$consid,
            'X-timestamp'=>$tStamp ,
            'X-signature'=>$encodedSignature,
            // 'user_key'=>$user_key,  
        ];
        return $headers;
    }


    public static function formatDate($dateString, $format = 'Y-m-d')
    {
        $date = new DateTime($dateString);
        return $date->format($format);
    }


}