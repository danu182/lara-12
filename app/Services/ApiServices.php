<?php

namespace App\services;

// use App\Helpers\Headers;
use Illuminate\Support\Facades\Http;
use App\Helpers\Headers; // Pastikan Anda memiliki helper Headers
use DateTime;
use Illuminate\Support\Facades\Log;
use LZCompressor\LZString;

class ApiServices
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
            $tHeaders['user_key'] = config('vclaim.user_key');
            Log::info('headers request BPJS', ['tHeaders' => $tHeaders]);
            Log::info('url ws BPJS Fetching data from API', ['url' => $url]);
            
            $hasil =Http::withHeaders($tHeaders)->get($url);
            Log::info('Response Fetching data from API', ['hasil' => $hasil]);
            return $hasil;
            // return $hasil['metaData']['code'] ;
            
            
            // return $hasil;
            if($hasil['metaData']['code']=='200'){
                // return $hasil;
                // jika tidak ada error akan megeksekusi perintah di bawah ini
                $decryptedData= $this->decryptData($hasil['response'], $tHeaders['X-timestamp']);
            
                Log::info('hasil dari respons sebelum di decrypted ', ['hasil' => $hasil]);
                Log::info('hasil dari decryptedData api bpjs', ['decryptedData' => $decryptedData]);
                $peserta=  $decryptedData;
                // return $data;
                $response = [
                    
                    'metaData' => [
                        'code' => '200',
                        'message' => 'OK',
                    ],
                    'response'=>$peserta,
                ];
                
                Log::info('response dari decryptedData api bpjs', ['response' => $response]);
                return $response;
            }elseif($hasil['metaData']['code']<>'200'){
                Log::error('Request failed', ['url' => $url, 'response' => $hasil->body()]);
                return $hasil;
            }
            else{
                Log::error('Request failed', ['url' => $url, 'response' => $hasil->body()]);
                $response = [
                'metaData' => [
                    'code' => '500',
                    'message' => 'Request to API failed cek consID secretKey, ce timestamp koneksi internet, coba tanya ke IT BPJS',
                ],
            ];
            return $response;
            }
            
            // elseif($hasil->failed()){
            //     Log::error('Request failed', ['url' => $url, 'response' => $hasil->body()]);
            //     return response()->json(['error' => 'Request to API failed.'], 500);
            // }
            
            // convert the respon to array
            // $data= $hasil->json(); // Return the data as an array
          
            
            // jika tidak ada error akan megeksekusi perintah di bawah ini
            // return $this->decryptData($hasil['response'], $tHeaders['X-timestamp']);
            // $decryptedData = $this->decryptData($hasil['response'], $tHeaders['X-timestamp']);
            
            // Log::info('hasil dari decryptedData api bpjs', ['decryptedData' => $decryptedData]);
            // return $decryptedData;

        } catch (\Exception $e) {
            Log::error('Error fetching data', ['message' => $e->getMessage()]);

            $response = [
                'metaData' => [
                    'code' => '500',
                    'message' => 'Request to API failed cek consID secretKey, ce timestamp koneksi internet, coba tanya ke IT BPJS',
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


    public function getbed($url)
    {
        $tHeaders= Headers::setHeaders();     
        // $tHeaders['user_key'] = config('vclaim.user_key');
        Log::info('headers request BPJS', ['tHeaders' => $tHeaders]);
        Log::info('url ws BPJS Fetching data from API', ['url' => $url]);
        
        $hasil =Http::withHeaders($tHeaders)->get($url);
        Log::info('Response Fetching data from API', ['hasil' => $hasil]);
        return $hasil;
            
    } 


}