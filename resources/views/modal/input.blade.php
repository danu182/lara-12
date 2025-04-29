@extends('main.app')

@section('content')

@push('sebelum')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

<div class="col-lg">
    <div class="p-5">
        <div class="text-center">
            {{-- <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1> --}}
        </div>
        <form class="user" method="POST" action="{{ route('modalPost') }}">
            @csrf
            <div class="form-group">
                <label for="noSuratKontrol">noSuratKontrol</label>
                <input type="text" class="form-control form-control-user" id="noSuratKontrol" aria-describedby="emailHelp" name="noSuratKontrol" placeholder="Parameter 1 : Nomor Kartu">
            </div>
            <div class="form-group">
                <label for="noKartu">nomer Kartu</label>
                <input type="text" class="form-control form-control-user" id="noKartu"  name="noKartu">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control form-control-user" id="nama" aria-describedby="emailHelp" name="nama">
            </div>
            <div class="form-group">
                <label for="nama">tglRencanaKontrol</label>
                <input type="text" class="form-control form-control-user" id="tglRencanaKontrol" aria-describedby="emailHelp" name="tglRencanaKontrol">
            </div>
            
            <button class="btn btn-primary btn-user btn-block">Cari</button>

            <!-- Button untuk membuka modal -->
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#dataModal">
                Pilih Data
            </button>
            <hr>
        </form>
    </div>
</div>

<!-- Modal start -->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalLabel">Pilih Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>noSuratKontrol</th>
                                <th>noKartu</th>
                                <th>nama</th>
                                <th>tglRencanaKontrol</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>noSuratKontrol</th>
                                <th>noKartu</th>
                                <th>nama</th>
                                <th>tglRencanaKontrol</th>
                                <th>Pilihan</th>
                            </tr>
                        </tfoot>
                        <tbody id="dataList">
                            <!-- Data akan dimuat di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

@push('setelah')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Ambil data saat modal dibuka
            $('#dataModal').on('show.bs.modal', function() {
                $.ajax({
                    url: '/api/data', // Ganti dengan URL endpoint Anda
                    method: 'GET',
                    success: function(data) {
                        let rows = '';
                        data.response.list.forEach(function(item) {
                            rows += `<tr>
                                        <td>${item.noSuratKontrol}</td>
                                        <td>${item.noKartu}</td>
                                        <td>${item.nama}</td>
                                        <td>${item.tglRencanaKontrol}</td>
                                        <td><button class="btn btn-danger btn-select" data-tanggal="${item.tglRencanaKontrol}" data-nama="${item.nama}"  data-kontrol="${item.noSuratKontrol}" data-kartu="${item.noKartu}"  ">Pilih</button></td>
                                    </tr>`;
                        })
                        $('#dataList').html(rows); $('#dataTable').DataTable(); // Initialize DataTable after populating data 
                        } 
                    });
                 }); 
             // Pilih data dan set ke input form
            $(document).on('click', '.btn-select', function() {
                const noKartu = $(this).data('kartu');
                const noSuratKontrol = $(this).data('kontrol');
                const nama = $(this).data('nama');;
                const tglRencanaKontrol = $(this).data('tanggal');;
             
                console.log(tglRencanaKontrol);
                
                // Set data ke input form
                $('#noSuratKontrol').val(noSuratKontrol);
                $('#noKartu').val(noKartu);
                $('#nama').val(nama);
                $('#tglRencanaKontrol').val(tglRencanaKontrol);
                
                if ($.fn.DataTable.isDataTable('#dataTable')) {
                    $('#dataTable').DataTable().search('').draw(); // Clear any search filters
                }
                // Tutup modal
                $('#dataModal').modal('hide');
            });

           
        
        });
    </script>
@endpush

@endsection 