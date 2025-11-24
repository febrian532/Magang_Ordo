@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Daftar Pengguna</h3>

    <table id="users-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    let table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.users.data') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role', name: 'role' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
