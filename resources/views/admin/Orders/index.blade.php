@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pesanan</h2>

    <table id="orders-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Pemesan</th>
                <th>Tanggal Pesanan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(function () {
    $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.orders.data') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchchable: fable },
            { data: 'pemesan', name: 'user.name' },
            { data: 'tanggal_pesanan', name: 'created_at' },
            { data: 'total_harga', name: 'total_price' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
