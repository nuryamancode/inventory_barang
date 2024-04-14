@extends('layout.admin.base-home', ['title' => 'Barang Masuk'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Barang Masuk</h3>
            </div>
        </div>
        <a href="{{ route('admingudang.tambah.barang.masuk') }}" class="btn btn-primary">Tambah Data</a>
        <table id="barangmasuk" class="table table-bordered table-responsive text-nowrap" style="width:100%">
            <thead class="bg-primary text-white ">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Barang</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Nama Supplier</th>
                    <th class="text-center">Tanggal Masuk</th>
                    <th class="text-center">Foto Barang</th>
                    <th class="text-center">Spesifikasi</th>
                    <th class="text-center">Jumlah Barang</th>
                    <th class="text-center">Harga Beli</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang_masuk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->persediaan->barang->kode_barang }}</td>
                        <td>{{ $item->persediaan->barang->nama_barang }}</td>
                        <td>{{ $item->persediaan->barang->supplier->nama_supplier }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->isoFormat('D MMMM Y') }}</td>
                        <td><img src="{{ asset($item->persediaan->barang->foto_barang) }}" width="80px" alt=""></td>
                        <td class="d-inline-block text-truncate" style="max-width: 150px;">{{ $item->persediaan->barang->spesifikasi }}</td>
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
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
        new DataTable('#barangmasuk', {
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
