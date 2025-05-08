<?php

namespace App\services;

// use App\Helpers\Headers;
use Illuminate\Support\Facades\Http;
use App\Helpers\Headers; // Pastikan Anda memiliki helper Headers
use DateTime;
use Illuminate\Support\Facades\Log;
use LZCompressor\LZString;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ApiAntrianWSBpjs
{

    protected $encryptMethod = 'AES-256-CBC';
   
    public static function formatDate($dateString, $format = 'Y-m-d')
    {
        $date = new DateTime($dateString);
        return $date->format($format);
    }



    public function fetchData($url)
    {
        try {

            $tHeaders= Headers::setHeaders();     
            $tHeaders['user_key'] = config('vclaim.user_key_antrian');
            // return $tHeaders;
            Log::info('headers request BPJS', ['tHeaders' => $tHeaders]);
            Log::info('url ws BPJS Fetching data from API', ['url' => $url]);
            

            // $hasil =Http::withHeaders($headers)->get($url);
            $hasil =Http::withHeaders($tHeaders)->get($url);
            Log::info('Response Fetching data from API', ['hasil' => $hasil]);
            // return $hasil ;
            // return $hasil['metadata']['list'] ;
            
            
            // return $hasil;
            if($hasil['metadata']['code']=='200'){
                Log::info('hasil dari respons sebelum di decrypted ', ['hasil' => $hasil]);
                return $hasil;

            }elseif($hasil['metadata']['code']<>'200'){
                Log::error('Request failed', ['url' => $url, 'response' => $hasil->body()]);
                return $hasil;
            }
            else{
                Log::error('Request failed', ['url' => $url, 'response' => $hasil->body()]);
                $response = [
                'metadata' => [
                    'code' => '500',
                    'message' => 'Request to API failed cek consID secretKey, ce timestamp koneksi internet, coba tanya ke IT BPJS',
                ],
                ];
                return $response;
            }
            
        } catch (\Exception $e) {
            Log::error('Error fetching data', ['message' => $e->getMessage()]);

            $response = [
                'metadata' => [
                    'code' => '500',
                    'message' => 'Request to API failed cek consID secretKey,pesan dari try cathy',
                ],
            ];
            return $response;
            // Mengembalikan respons kesalahan
            // return response()->json(['error' => 'Terjadi kesalahan saat memproses permintaan.'], 500);

        }
    }


    public function decryptData($data, $timestamp)
    {
        $key = env('consid_vclaim') . env('secretKey_vclaim') . $timestamp;
        $keyHash = hex2bin(hash('sha256', $key));
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($data), $this->encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);

        $decompressedData = LZString::decompressFromEncodedURIComponent($output);
        return json_decode($decompressedData, true);
    }


    public function getToken()
    {
        // $url="https://antri.rssuciparamita.com/api/BpjsAntrol/GetToken";
        $url=config('vclaim.baseurl_ws_rs_antrol')."GetToken";
        $headers=[
            'x-username'=> config('vclaim.username_antri'),
            'x-password'=> config('vclaim.password_antri'),
        ];

        $hasil =Http::withHeaders($headers)->get($url);
        
        if($hasil['metadata']['code']==200){
            return $hasil["response"]["token"];
        }
        return "tidak bisa generate token";
        
    }
   

    public function fetchDataAntrian($tanggalawal,$tanggalakhir, $alamat)
    {
        $token = $this->getToken();
        $Header =[
            'x-token'=> $token,
            'x-username'=> config('vclaim.username_antri'),
        ];

        $url=config('vclaim.baseurl_ws_rs_antrol').$alamat;

        $body=[
            'tanggalawal'=> Headers::formatDate($tanggalawal),
            'tanggalakhir'=>Headers::formatDate($tanggalakhir),
        ];

        $response = Http::withHeaders($Header)->post($url, $body);
        return $response->json();
    }

}