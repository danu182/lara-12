@extends('main.app')

@section('content')

{{-- <div class="container-fluid"> --}}

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Aplicare BPJS</h1>
    <p class="text-l font-weight-bold text-info mb-4"><a href=""></a>Trust Musk BPJS</p>

    <!-- Content Row -->
    <div class="row">
       <div class="col-lg">
            <!-- Basic Card Example -->
            <div class="container-fluid">   
                {{-- star --}}

                {{-- <div class="container"> --}}
                    @php
                        $index=0;
                    @endphp
                    @foreach($groupedRooms as $kodekelas => $rooms)
                        <h2>Kelas: {{ $kodekelas }}</h2>
                        <div id="carousel-{{ $kodekelas }}" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> AAAAAAA 
                                                        </div>
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-auto">
                                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> BBBBBBBB </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="progress progress-sm mr-2">
                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="progress progress-sm mr-2">
                                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> CCCCCCCCCC </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- @foreach($rooms as $index => $room)
                                    
                                @endforeach --}}
                            </div>
                            <a class="carousel-control-prev" href="#carousel-{{ $kodekelas }}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-{{ $kodekelas }}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endforeach
                {{-- </div> --}}

                 {{-- end --}}

            </div>           
    </div>
    </div>

</div>
    
@endsection
