@extends('layout.admin.base-home', ['title' => 'Kelola User'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <a href="" class="btn btn-primary">Tambah Data</a>
        <table id="manajemenuser" class="table table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Peran</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>USERNAME</td>
                    <td>PERAN</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger" data-confirm-delete="true">
                            <i class="bi bi-trash"></i>
                        </a>
                        <a href="#" class="btn btn-warning" data-confirm-delete="true">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- content --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#manajemenuser', {
            fixedColumns: {
                left: 0,
                right: 1
            },
            scrollX: true,
            scrollXInner: "100%",
            autoWidth: false,
        });
    </script>
@endsection
