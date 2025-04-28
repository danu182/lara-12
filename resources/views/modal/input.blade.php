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
                <label for="parameter1">ID</label>
                <input type="number" class="form-control form-control-user" id="inputId" aria-describedby="emailHelp" name="parameter1" placeholder="Parameter 1 : Nomor Kartu">
            </div>
            <div class="form-group">
                <label for="parameter2">Nama</label>
                <input type="text" class="form-control form-control-user" id="inputNama" aria-describedby="emailHelp" name="parameter2">
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
    <div class="modal-dialog" role="document">
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
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
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
                        data.forEach(function(item) {
                            rows += `<tr>
                                        <td>${item.id}</td>
                                        <td>${item.nama}</td>
                                        <td><button class="btn btn-danger btn-select" data-id="${item.id}" data-name="${item.nama}">Pilih</button></td>
                                    </tr>`;
                        });
                        $('#dataList').html(rows);
                        $('#dataTable').DataTable(); // Initialize DataTable after populating data
                    }
                });
            });

            // Pilih data dan set ke input form
            $(document).on('click', '.btn-select', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                
                // Set data ke input form
                $('#inputId').val(id);
                $('#inputNama').val(name);
                
                // Tutup modal
                $('#dataModal').modal('hide');
            });

        // Clear input fields when modal is closed
        // $('#dataModal').on('hidden.bs.modal', function() {
        //     $('#inputId').val('');
        //     $('#inputNama').val('');
        //     if (dataTable) {
        //         dataTable.search('').draw(); // Clear any search filters
        //     }
        // });
        
        });
    </script>
@endpush

@endsection 