@extends('main.app')

@section('content')

{{-- <div class="container-fluid"> --}}

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Headers Api vclaim BPJS Kesehatan</h1>
    <p class="text-l font-weight-bold text-info mb-4"><a href=""></a>Trust Musk BPJS</p>

    <!-- Content Row -->
    <div class="row">
       

        <div class="col-lg">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Header Vclaim BPJS Kesehatan</h6>
                </div>
                <div class="card-body">
                    <p>X-Cons-id: {{ $data['X-cons-id'] }}</p>
                    <p>X-Timestamp: {{ $data['X-timestamp'] }}</p>
                    <p>X-Signature: {{ $data['X-signature'] }}</p>
                    <p>user_key: {{ $data['user_key'] }}</p>
                    {{-- ": "7586aabd0e7b9846ebec940d1c2cd83a" --}}
                </div>
            </div>
    
        </div>
                           

    </div>

{{-- </div> --}}
    
@endsection
