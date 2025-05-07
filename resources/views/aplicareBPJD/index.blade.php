@extends('main.app')

@section('content')

{{-- <div class="container-fluid"> --}}

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Aplicare BPJS</h1>
    <p class="text-l font-weight-bold text-info mb-4"><a href=""></a>Trust Musk BPJS</p>

    
    
    <div class="row">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md">
                    
                    @php
                        $i=0;

                    @endphp

                    {{-- carousel START --}}
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($groupedRooms as $kodekelas => $rooms)
                                @php
                                    $activeClass = $i === 0 ? 'active' : '';
                                    $i++;
                                @endphp
                                <div class="carousel-item {{ $activeClass }}">
                                    @foreach($rooms as $room)
                                        <h1>{{ $kodekelas }}</h1>
                                        {{-- <img src="https://images.freeimages.com/images/large-previews/355/poppies-2-1334190.jpg" class="d-block w-100" alt="..."> --}}
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    {{-- carousel END --}}
                </div>
            </div>
        </div>
     
   

        </div>
    </div>
    
    
    <!-- Content Row -->
    <div class="row">
       
        
        

        <div class="col-lg">

           
            <!-- Basic Card Example -->
           <div class="container-fluid">

                    <!-- Page Heading -->
                    @foreach($groupedRooms as $kodekelas => $rooms)
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">{{ $kodekelas }}</h1>
                        </div> 
                        <div class="row">

                        
                            {{-- {{ $item['koderuang'] }} --}}
                            <!--    tasks Card Example start -->
                            @foreach($rooms as $room)
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ $room['namaruang'] }}
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $room['tersedia'] }}</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $room['tersedia'] }}</div>
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
                            @endforeach
                            <!--    tasks Card Example end -->
                            
                            
                        </div>
                    @endforeach

                </div>
    
        </div>
                           

    </div>

{{-- </div> --}}
    
@endsection
