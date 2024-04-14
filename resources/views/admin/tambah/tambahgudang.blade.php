@extends('layout.admin.base-home', ['title' => 'Tambah Gudang'])

@section('content')
    {{-- spinner --}}
    @include('layout.admin.spinner')
    {{-- spinner --}}
    {{-- content --}}
    <div class="container-fluid pt-4 px-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Tambah Gudang</h3>
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
                <form action="{{ route('admingudang.simpan.kelola.gudang') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_gudang" class="form-label">Nama Gudang</label>
                        <input type="name" class="form-control" id="nama_gudang" name="nama_gudang">
                    </div>
                    <div class="mb-3">
                        <label for="no_rak" class="form-label">No Rak</label>
                        <input type="no_rak" class="form-control" id="no_rak" name="no_rak">
                    </div>
                    <div class="mb-3">
                        <label for="no_urut" class="form-label">No Urut</label>
                        <input type="no_urut" class="form-control" id="no_urut" name="no_urut">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    {{-- content --}}
@endsection
