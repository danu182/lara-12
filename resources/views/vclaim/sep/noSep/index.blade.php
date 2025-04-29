
@extends('main.app')

@section('content')


<div class="col-lg">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
        </div>
        <form class="user" method="POST" action="{{ route('vclaim.sep.noKaPost') }}">
            @csrf
            <div class="form-group">
                <label for="parameter1">Parameter 1 : NIK KTP</label>
                <input type="text" class="form-control form-control-user" id="parameter1" aria-describedby="emailHelp" name="parameter1" placeholder="Parameter 1 : Nomor Kartu">
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