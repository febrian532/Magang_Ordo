@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Daftar Produk</h3>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">
        + Tambah Produk
    </a>

    <table id="products-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {

    // ==============================
    // DATATABLE
    // ==============================
    let table = $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.products.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'category', name: 'category.name' },
            { data: 'price', name: 'price' },
            { data: 'stock', name: 'stock' },
            { data: 'image', name: 'image', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    // ==============================
    // HAPUS PRODUK
    // ==============================
    $(document).on('click', '.delete', function () {
        const id = $(this).data('id');

        if (!confirm("Yakin ingin menghapus produk ini?")) return;

        $.ajax({
            url: "/admin/products/" + id,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                if (res.status === "success") {
                    alert("Produk berhasil dihapus");
                    table.ajax.reload(); // reload datatable
                }
            }
        });
    });

});
</script>
@endpush
