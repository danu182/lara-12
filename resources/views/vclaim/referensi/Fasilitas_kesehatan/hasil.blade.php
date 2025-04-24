@extends('main.app')

@section('content')
    
@push('sebelum')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
<p class="mb-4">{{ $alamat }}</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
    </div>
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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($data['response']['faskes'] as $faskes)
                    <tr>
                        <td>{{ $faskes['kode'] }}</td>
                        <td>{{ $faskes['nama'] }}</td>
                    </tr> 
                    @empty
                        <p>kosong tidak tersedia</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>


@push('setelah')
<!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js')}}"></script>
@endpush


@endsection

