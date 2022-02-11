<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/')}}">Firebase Kasir Buku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if(!Session::has('idToken')) : ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('bukuguest')}}">DaftarBuku</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a href="{{ url('login') }}" class="btn btn-outline-success mr-3">Masuk</a>
      </li>
      <li class="nav-item">
      <a href="{{ url('daftar') }}" class="btn btn-outline-danger">Daftar</a>
      </li>
      <?php else : ?>
        <li class="nav-item">
      <a href="{{ url('logout') }}" class="btn btn-outline-danger">Log Out</a>
      </li>
      </ul>
    </div>
    <?php endif; ?>
  </div>
</nav>