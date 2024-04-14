@extends('layout.admin.base-home', ['title' => 'Tambah Data Barang'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Tambah Data Barang</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('admingudang.simpan.data.barang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="text-center">Data Barang</h4>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" id="kode" name="kode_barang">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="name" class="form-control" id="nama" name="nama_barang">
                    </div>
                    <div class="mb-3">
                        <label for="pilih_supplier" class="form-label">Pilih Supplier</label>
                        <select name="supplier_id" id="pilih_supplier" class="form-select">
                            @if ($supplier->isEmpty())
                                <option>Tidak ada data supplier</option>
                            @else
                                @foreach ($supplier as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto_barang" class="form-label">Foto Barang</label>
                        <input type="file" class="form-control" id="foto_barang" name="foto_barang">
                    </div>
                    <div class="mb-3">
                        <label for="spesifikasi" class="form-label">Spesifikasi Barang</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="spesifikasi" id="spesifikasi" style="height: 100px"></textarea>
                          </div>
                    </div>
                    <h4 class="text-center">Persediaan Barang</h4>
                    <div class="mb-3">
                        <label for="gudang_id" class="form-label">Nama Gudang - No Rak - No Urut</label>
                        <select name="gudang_id" id="gudang_id" class="form-select">
                            @foreach ($gudang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_gudang }} - No Rak: {{ $item->no_rak }} - No Urut: {{ $item->no_urut }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stok_barang" class="form-label">Stok Barang</label>
                        <input type="number" class="form-control" id="stok_barang" name="stok_barang">
                    </div>
                    <div class="mb-3">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual">
                    </div>
                    <div class="mb-3">
                        <label for="status_barang" class="form-label">Status Barang</label>
                        <select name="status_barang" id="status_barang" class="form-select">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    {{-- content --}}
@endsection
