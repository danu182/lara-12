@extends('main.app')

@section('content')

{{-- <div class="container-fluid"> --}}

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">{{ $title }}</h1>
    <p class="text-l font-weight-bold text-info mb-4">{BASE URL}/{Service Name}/Peserta/nokartu/{{ $Parameter1 }}/tglSEP/{{ $Parameter2 }}</p>

    <!-- Content Row -->
    <div class="row">
        @if( $data['metaData']['code']=='500' || $data['metaData']['code']<>'200' )

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
            @forelse ( $data['response']['prb'] as $key => $val )
                <div class="col-lg-6">
                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-body">
                            <h6 class="m-0 font-weight-bold text-primary">{{ ucfirst($key) }}</h6>
                            @if (is_array($val))
                                @foreach ($val as $subKey => $item)
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ucfirst($subKey) }}</div>
                                    <p><strong>{{ ucfirst($subKey) }}:</strong> {{ $item ?? 'Tidak ada' }}</p>
                                @endforeach
                            @else
                                <p>{{ $val }}</p>
                            @endif      
                        </div>
                    </div>
                </div>    
            
            @empty
                <p>data tidak ada</p>
            @endforelse ($data['peserta'] as $key => $val) 
            

        @endif

        

    </div>

{{-- </div> --}}
    
@endsection
