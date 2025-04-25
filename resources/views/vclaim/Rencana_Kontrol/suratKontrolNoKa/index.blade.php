
@extends('main.app')

@section('content')


<div class="col-lg">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
        </div>
        <form class="user" method="POST" action="{{ route('vclaim.rencanKontrol.CariNoSuratKontrolNoKaPost') }}">
            @csrf
            <div class="form-group">
                <label for="parameter1">{{ $label1 }}</label>
                <select name="paramater1" id="" class="form-control ">
                    @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                        <option value="{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="parameter2">{{ $label2 }}</label>
                <input type="number" class="form-control form-control-user" id="parameter2" aria-describedby="emailHelp" name="Parameter2" >
            </div>
            <div class="form-group">
                <label for="parameter3">{{ $label3 }}</label>
                <input type="number" class="form-control form-control-user" id="parameter2" aria-describedby="emailHelp" name="Parameter3" >
            </div>
            <div class="form-group">
                <label for="parameter3">{{ $label2 }}</label>
                <select name="paramater4" id="" class="form-control ">
                    <option disabled>--Pilih Salah Satu ---</option>
                    <option value="1">tanggal entri</option>
                    <option value="2">tanggal rencana kontrol</option>
                </select>
            </div>
            
            <button class="btn btn-primary btn-user btn-block">Cari</button>

            {{-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                Login
            </a> --}}
            <hr>
            
        </form>
        {{-- <hr> --}}
        
    </div>
</div>

@endsection