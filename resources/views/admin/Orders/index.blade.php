@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Daftar Order</h3>

    <table id="orders-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    let table = $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.orders.data') }}",
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'user', name: 'user.name' },
            { data: 'total', name: 'total_price' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', orderable: false, searchable: false },
        ]
    });

    // Delete Order
    $(document).on('click', '.delete', function() {
        const id = $(this).data('id');

        if(!confirm("Yakin ingin menghapus order ini?")) return;

        $.ajax({
            url: "/admin/orders/" + id,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(res) {
                if (res.status === 'success') {
                    alert(res.message);
                    table.ajax.reload();
                }
            }
        });
    });
});
</script>
@endpush
