<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\Vclaim\Peserta\PesertaNikController;
use App\Http\Controllers\Vclaim\Peserta\PesertNoKaController;
use App\Http\Controllers\Vclaim\PRB\SrbPRBController;
use App\Http\Controllers\Vclaim\Referensi\DiagnosaController;
use App\Http\Controllers\Vclaim\Referensi\DpjpController;
use App\Http\Controllers\Vclaim\Referensi\FasilitasKesehatanController;
use App\Http\Controllers\Vclaim\Referensi\ObatGnerikPRBController;
use App\Http\Controllers\Vclaim\Referensi\PoliController;
use App\Http\Controllers\Vclaim\RencanControl\CariNoSuratKontrolController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/pesertaNoKa',[PesertNoKaController::class,'index']);
// Route::post('/pesertaNoKa/hasil',[PesertNoKaController::class,'getData']);



Route::group(['prefix' => 'vclaim'], function () {
   
    Route::group(['prefix' => 'peserta'], function () {
        Route::get('/pesertaNoKa',[PesertNoKaController::class,'index'])->name('vclaim.peserta.noKaBPJS');  
        Route::post('/pesertaNoKa/hasil',[PesertNoKaController::class,'getData'])->name('vclaim.peserta.noKartuBPJSPost');
        Route::get('/pesertaNik',[PesertaNikController::class,'index'])->name('vclaim.peserta.nikBPJS');  
        Route::post('/pesertaNik/hasil',[PesertaNikController::class,'getData'])->name('vclaim.peserta.nikBPJSPost');
    });

    Route::group(['prefix' => 'referensi'], function () {
        // diagnosa
        Route::get('/diagnosa',[DiagnosaController::class,'index'])->name('vclaim.referensi.diagnosa');  
        Route::post('/diagnosa/hasil',[DiagnosaController::class,'getData'])->name('vclaim.referensi.diagnosaPost');
        // poli
        Route::get('/poli',[PoliController::class,'index'])->name('vclaim.referensi.poli');  
        Route::post('/poli/hasil',[PoliController::class,'getData'])->name('vclaim.referensi.poliPost');
        // fasilitas kesehatan
        Route::get('/fasilitas-kesehatan',[FasilitasKesehatanController::class,'index'])->name('vclaim.referensi.fasilitas-kesehatan');  
        Route::post('/fasilitas-kesehatan/hasil',[FasilitasKesehatanController::class,'getData'])->name('vclaim.referensi.fasilitas-kesehatanPost');
        // spesialistik
        Route::get('/dpjp',[DpjpController::class,'index'])->name('vclaim.referensi.dpjp');  
        Route::post('/dpjp/hasil',[DpjpController::class,'getData'])->name('vclaim.referensi.dpjpPost');
        // Obat Generik Program PRB
        Route::get('/ObatGnerikPRBController',[ObatGnerikPRBController::class,'index'])->name('vclaim.referensi.ObatGnerikPRBController');  
        Route::post('/ObatGnerikPRBController/hasil',[ObatGnerikPRBController::class,'getData'])->name('vclaim.referensi.ObatGnerikPRBControllerPost');

    });
        
    Route::group(['prefix' => 'prb'], function () {
        
        // Pencarian Data PRB
        Route::get('/NomorSRB',[SrbPRBController::class,'index'])->name('vclaim.prb.NomorSRB');  
        Route::post('/NomorSRB/hasil',[SrbPRBController::class,'getData'])->name('vclaim.prb.NomorSRBPost');
    
    });
        
    Route::group(['prefix' => 'rencana-control'], function () {
        
        // Pencarian Data PRB
        Route::get('/CariNoSuratKontrol',[CariNoSuratKontrolController::class,'index'])->name('vclaim.rencanKontrol.CariNoSuratKontrol');  
        Route::post('/CariNoSuratKontrol/hasil',[CariNoSuratKontrolController::class,'getData'])->name('vclaim.rencanKontrol.CariNoSuratKontrolPost');
    
    });

});

// Route::get('/test',[TestController::class,'test']);
