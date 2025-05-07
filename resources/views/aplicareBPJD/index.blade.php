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
