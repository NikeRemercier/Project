<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MID</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('barang') }}">Dashboard</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('supplier') }}">Supplier</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('sumber_dana') }}">Sumber Dana</a>
          </li> 
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hak Akses
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ url('level_user') }}">Level User</a></li>
              <li><a class="dropdown-item" href="{{ url('user') }}">User</a></li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('level_user') }}">Level User</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('user') }}">User</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('lokasi') }}">Lokasi</a>
          </li> 
        </ul>
      </div>
    </div>
  </nav>
