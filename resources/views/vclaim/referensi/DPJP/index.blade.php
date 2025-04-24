
@extends('main.app')

@section('content')


<div class="col-lg">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
        </div>
        <form class="user" method="POST" action="{{ route('vclaim.referensi.dpjpPost') }}">
            @csrf
            <div class="form-group">
                <label for="parameter1">Parameter 1 : Jenis Pelayanan (1. Rawat Inap, 2. Rawat Jalan)</label>
                <select class="form-control " name="parameter1" id="">
                    <option disabled> --PILLIH--</option>
                    <option value="1">1. Rawat Inap</option>
                    <option value="2">2. Rawat Jalan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="parameter2">Parameter 2 : Tgl.Pelayanan/SEP (yyyy-mm-dd)</label>
                <input type="date" class="form-control form-control-user" id="parameter1" aria-describedby="emailHelp" name="parameter2" placeholder="Parameter : Kode atau Nama Diagnosa" value="{{ date('Y-m-d') }}">
            </div>
            
            @if( $data['metaData']['code']=='500' || $data['metaData']['code']<>'200' )
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data {{ $title }}</h6>
                    </div>
                {{-- <div class="col-xl-3 col-md-6 mb-4"> --}}
                <div class="col-lg-6">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        respons</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">"code" = {{ $data['metaData']['code'] }}</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">"message" = {{ $data['metaData']['message'] }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <div class="form-group">
                    <label for="parameter3">spesialistik</label>
                    <select class="form-control " name="parameter3" id="">
                        @foreach ($data['response']['list'] as $item)
                            <option value="{{ $item['kode'] }}">{{ $item['nama'] }}</option>
                        @endforeach
            
                    </select>
                </div>
            @endif
                <button class="btn btn-primary btn-user btn-block">Cari</button>

            
            <hr>
            
        </form>
        {{-- <hr> --}}
        
    </div>
</div>

@endsection