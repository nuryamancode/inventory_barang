@extends('layout.admin.base-home', ['title' => 'Kelola Gudang'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Kelola Gudang</h3>
            </div>
        </div>
        <a href="{{ route('admingudang.tambah.kelola.gudang') }}" class="btn btn-primary">Tambah Data</a>
        <table id="kelolagudang" class="table table-bordered table-responsive text-nowrap" style="width:100%">
            <thead class="bg-primary text-white ">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Gudang</th>
                    <th class="text-center">No Rak</th>
                    <th class="text-center">No Urut</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gudang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_gudang }}</td>
                        <td>{{ $item->no_rak }}</td>
                        <td>{{ $item->no_urut }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-danger" data-confirm-delete="true">
                                <i class="bi bi-trash"></i>
                            </a>
                            <a href="#" class="btn btn-warning" data-confirm-delete="true">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- content --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#kelolagudang', {
            fixedColumns: {
                left: 0,
                right: 1
            },
            scrollX: true,
            scrollXInner: "100%",
            autoWidth: true,
        });
    </script>
@endsection
