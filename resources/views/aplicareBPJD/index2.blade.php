@extends('main.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Aplicare BPJS</h1>
    <p class="text-l font-weight-bold text-info mb-4"><a href="#"></a>Trust Musk BPJS</p>

    <div class="container-fluid">
        <!-- Carousel start-->
        <div id="roomCarousel" class="carousel slide" data-ride="carousel" style="max-height: 600px;">
            <div class="carousel-inner">
                @foreach($groupedRooms as $kodekelas => $rooms)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="container">
                            <div class="d-block w-100 align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">{{ $kodekelas }}</h1>
                            </div>
                            <div class="row">
                                @foreach($rooms as $room)
                                    @php
                                        $kapasitas = $room['kapasitas'] ?? 1; // avoid division by zero
                                        $tersedia = $room['tersedia'] ?? 0;
                                        $progressPercent = ($kapasitas>0) ? round(($tersedia / $kapasitas) * 100) : 0;
                                        if($progressPercent > 100) {
                                            $progressPercent = 100;
                                        }
                                    @endphp
                                    <div class="col-xl mb-4">
                                        <div class="card mb-3" style="max-width: 540px; height: 100%;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="https://images.freeimages.com/images/large-previews/355/poppies-2-1334190.jpg" class="img-fluid rounded-start" alt="Room image" style="height: 100%; object-fit: cover;">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $room['namaruang'] }}</h5>
                                                        <p class="card-text">Tersedia: {{ $tersedia }} / Kapasitas: {{ $kapasitas }}</p>
                                                        
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: {{ $progressPercent }}%;" aria-valuenow="{{ $progressPercent }}" aria-valuemin="0" aria-valuemax="100">
                                                                {{ $progressPercent }}%
                                                            </div>
                                                        </div>
                                                        <p class="card-text"><small class="text-muted">Last lastupdate {{ $room["lastupdate"] }}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#roomCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#roomCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Carousel end -->
    </div>

@endsection

@push('styles')
<style>
    /* Custom styles for the carousel */
    #roomCarousel {
        height: 600px; /* Set the height of the carousel */
    }

    .carousel-item {
        height: 100%; /* Ensure carousel items take full height */
    }

    .card {
        height: 100%; /* Ensure cards take full height */
    }

    .card img {
        height: 100%; /* Ensure images take full height */
        object-fit: cover; /* Maintain aspect ratio */
    }
</style>
@endpush
</content>
</create_file>
