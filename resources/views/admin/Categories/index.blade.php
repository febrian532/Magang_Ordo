@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Daftar Kategori</h3>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">
        + Tambah Kategori
    </a>

    <table id="categories-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {

    // INIT DATATABLE
    var table = $('#categories-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.categories.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    // DELETE BUTTON
    $(document).on('click', '.delete', function () {
        let id = $(this).data('id');

        if (!confirm("Yakin ingin menghapus kategori ini?")) {
            return;
        }

        $.ajax({
            url: "/admin/categories/" + id,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                if (res.status === "success") {
                    alert("Kategori berhasil dihapus");
                    table.ajax.reload();
                }
            },
            error: function () {
                alert("Gagal menghapus kategori");
            }
        });
    });

});
</script>
@endpush
