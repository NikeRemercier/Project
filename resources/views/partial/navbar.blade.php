{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MID</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('barang') }}">Barang</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('supplier') }}">Supplier</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('sumber_dana') }}">Sumber Dana</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('level_user') }}">Level User</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('user') }}">User</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('lokasi') }}">Lokasi</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('detail_barang') }}">Detail Barang</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('barang_keluar') }}">Barang Keluar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('peminjaman_barang') }}">Peminjaman Barang</a>
          </li> 
        </ul>
      </div>
    </div>
  </nav> --}}
  <div>
    <div class="sidebar p-4 bg-primary" id="sidebar">
      <h4 class="mb-5 text-white" style="text-align: center">MID</h4>
      <li>
        <a class="text-white" href="{{ url('barang') }}">
          <i class="bi bi-house mr-2"></i>
          Barang
        </a>
      </li>
      <li>
        <a class="text-white" href="{{ url('supplier') }}">
          <i class="bi bi-bag mr-2"></i>
          Supplier
        </a>
      </li>
      <li>
        <a class="text-white" href="{{ url('sumber_dana') }}">
          <i class="bi bi-basket mr-2"></i>
          Sumber Dana
        </a>
      </li>
      <li>
        <a class="text-white" href="{{ url('user') }}">
          <i class="bi bi-people mr-2"></i>
          User
        </a>
      </li>
      <li>
        <a class="text-white" href="{{ url('lokasi') }}">
          <i class="bi bi-building mr-2"></i>
          Lokasi
        </a>
      </li>
      <li>
        <a class="text-white" href="{{ url('detail_barang') }}">
          <i class="bi bi-clipboard mr-2"></i>
          Detail Barang
        </a>
      </li>
      <li>
        <a class="text-white" href="{{ url('barang_keluar') }}">
          <i class="bi bi-bag-dash mr-2"></i>
          Barang Keluar
        </a>
      </li>
      <li>
        <a class="text-white" href="{{ url('peminjaman_barang') }}">
          <i class="bi bi-send mr-2"></i>
          Peminjaman Barang
        </a>
      </li>
    </div>
  </div>
  