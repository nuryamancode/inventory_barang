@extends('layout.admin.base-home', ['title' => 'Persediaan Barang'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Persediaan Barang</h3>
            </div>
        </div>
        <table id="persediaanbarang" class="table table-bordered table-responsive text-nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr class="">
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Barang</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Harga Jual</th>
                    <th class="text-center">Gudang</th>
                    <th class="text-center">No Urut</th>
                    <th class="text-center">No Rak</th>
                    <th class="text-center">Stok Barang</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persediaan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->kode_barang }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td><img src="{{ asset($item->barang->foto_barang) }}" width="80px" alt=""></td>
                        <td>Rp. {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                        <td>{{ $item->gudang->nama_gudang }}</td>
                        <td>{{ $item->gudang->no_urut }}</td>
                        <td>{{ $item->gudang->no_rak }}</td>
                        <td>{{ $item->stok_barang }}/500</td>
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
        new DataTable('#persediaanbarang', {
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
