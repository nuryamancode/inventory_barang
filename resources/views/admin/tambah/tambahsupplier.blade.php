@extends('layout.admin.base-home', ['title' => 'Tambah Supplier'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Tambah Supplier</h3>
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
                <form action="{{ route('admingudang.simpan.kelola.supplier') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Supplier</label>
                        <input type="name" class="form-control" id="nama" name="nama_supplier">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Supplier</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_hp" class="form-label">Nomor Hp</label>
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_hp" class="form-label">Alamat</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="alamat" id="alamat" style="height: 100px"></textarea>
                            <label for="alamat">Masukkan alamat</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    {{-- content --}}
@endsection
