@extends('layout.admin.base-home', ['title' => 'Tambah Barang Keluar'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Tambah Barang Keluar</h3>
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
                <form action="{{ route('admingudang.simpan.barang.keluar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="pilih_barang" class="form-label">Pilih Barang</label>
                        <select name="persediaan_id" id="pilih_barang" class="form-select">
                            @if ($barang->isEmpty())
                                <option>Tidak ada data barang</option>
                            @else
                                @php
                                    $sortedBarang = $barang->sortByDesc(function($item) {
                                        return $item->barangmasuk->created_at;
                                    });
                                @endphp
                                @foreach ($sortedBarang as $item)
                                    <option value="{{ $item->id }}">{{ $item->barang->nama_barang }} -
                                        {{ \Carbon\Carbon::parse($item->barangmasuk->created_at)->locale('id_ID')->isoFormat('D MMMM Y') }}
                                    </option>
                                @endforeach
                            @endif
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="harga_beli" class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli">
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    {{-- content --}}
@endsection
