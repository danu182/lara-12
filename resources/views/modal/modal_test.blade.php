

{{-- <!-- Button untuk membuka modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dataModal">
    Pilih Data
</button> --}}

<!-- Modal -->
{{-- <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalLabel">Pilih Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataList">
                        <!-- Data akan dimuat di sini -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


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
                                <td>${item.name}</td>
                                <td><button class="btn btn-select" data-id="${item.id}" data-name="${item.name}">Pilih</button></td>
                             </tr>`;
                });
                $('#dataList').html(rows);
            }
        });
    });

    // Pilih data dan set ke input form
    $(document).on('click', '.btn-select', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        
        // Set data ke input form
        $('#inputId').val(id);
        $('#inputName').val(name);
        
        // Tutup modal
        $('#dataModal').modal('hide');
        });
    });
</script> --}}