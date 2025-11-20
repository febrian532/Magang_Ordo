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
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'pemesan', name: 'pemesan' },
            { data: 'tanggal_pesanan', name: 'tanggal_pesanan' },
            { data: 'total_harga', name: 'total_harga' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
