
@extends('main.app')

@section('content')


<div class="col-lg">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
        </div>
        <form class="user" method="POST" action="{{ route('vclaim.referensi.fasilitas-kesehatanPost') }}">
            @csrf
            <div class="form-group">
                <label for="parameter1">{{ $label1 }}</label>
                <input type="text" class="form-control form-control-user" id="parameter1" aria-describedby="emailHelp" name="parameter1" placeholder="Parameter : Kode atau Nama Diagnosa">
            </div>
            <div class="form-group">
                <label for="parameter1">{{ $label2 }}</label>
                <select class="form-control " name="parameter2" id="">
                    <option value="1">Faskes 1 (klinik / puskesmas)</option>
                    <option value="2">Faskes 2 / Rumah Sakit</option>
                </select>
            </div>
            <button class="btn btn-primary btn-user btn-block">Cari</button>

           
            <hr>
            
        </form>
        {{-- <hr> --}}
        
    </div>
</div>

@endsection