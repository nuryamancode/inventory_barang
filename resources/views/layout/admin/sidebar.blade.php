<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admingudang.dashboard') }}" class="nav-item nav-link active">
                <i class="fa fa-tachometer-alt me-2"></i>
                Dashboard
            </a>
            <a href="{{ route('admingudang.kelola.supplier') }}" class="nav-item nav-link"><i
                    class="fa fa-users me-2"></i>Kelola Supplier</a>
            <a href="{{ route('admingudang.kelola.gudang') }}" class="nav-item nav-link">
                <i class="fa fa-building me-2"></i>Kelola Gudang</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-cubes me-2"></i>Kelola Barang</a>
                <div class="dropdown-menu bg-transparent border-0 pl-5">
                    <a href="{{ route('admingudang.data.barang') }}" class="dropdown-item"><i
                            class="fa fa-cube me-2"></i> Data Barang</a>
                    <a href="{{ route('admingudang.persediaan.barang') }}" class="dropdown-item"><i
                            class="fa fa-archive me-2"></i> Persediaan Barang</a>
                    <a href="{{ route('admingudang.barang.masuk') }}" class="dropdown-item"><i
                            class="fa fa-cube me-2"></i> Data Barang Masuk</a>
                    <a href="{{ route('admingudang.barang.keluar') }}" class="dropdown-item"><i
                            class="fa fa-truck me-2"></i> Data Barang Keluar</a>
                </div>
            </div>
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-file me-2"></i>
                Kelola Laporan
            </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-th me-2"></i> Data Master</a>
                <div class="dropdown-menu bg-transparent border-0 pl-5">
                    <a href="{{ route('admingudang.kelola.user') }}" class="dropdown-item"><i
                            class="fa fa-user me-2"></i> Manajemen User</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
