@extends('layout.admin.base-home', ['title' => 'Data Barang'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Data Barang</h3>
            </div>
        </div>
        <a href="{{ route('admingudang.tambah.data.barang') }}" class="btn btn-primary">Tambah Data</a>
        <table id="databarang" class="table table-bordered table-responsive" style="width:100%">
            <thead class="bg-primary text-white text-nowrap">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Barang</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Nama Supplier</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Spesifikasi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->supplier->nama_supplier }}</td>
                        <td><img src="{{ asset($item->foto_barang) }}" width="80px" alt=""></td>
                        <td class="d-inline-block text-truncate" style="max-width: 150px;">{{ $item->spesifikasi }}</td>
                        <td class="text-center">
                            <div class="mb-2">
                                <a href="#" class="btn btn-danger" data-confirm-delete="true">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                            <div class="mb-2">
                                <a href="{{ route('admingudang.detail.barang', $item->kode_barang) }}" class="btn btn-primary" data-confirm-delete="true">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                            <div class="mb-2">
                                <a class="btn btn-warning" href="{{ route('admingudang.data.barang.download.qrcode', $item->kode_barang) }}">
                                    <i class="bi bi-qr-code"></i>
                                </a>
                            </div>
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
        new DataTable('#databarang', {
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
