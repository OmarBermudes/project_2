{{-- Navbar --}}
<nav class="navbar navbar-expand-md fixed-top navbar-light text-uppercase navbar-main">
    {{-- <nav class="row text-white justify-content-between align-items-center text-uppercase pt-4"> --}}
    <div class="container">
        {{-- Logo --}}
        <a href="#" class="navbar-brand">
            <img src="./images/logo-blanco.png" alt="Logo Nostalx">
        </a>
        {{-- Button --}}
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav"
            aria-expanded="false" aria-label="Navigation Bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Links --}}
        <div class="collapse navbar-collapse" id="mainNav">
            <div class="nav ms-auto text-light">
                <a href="{{ route('home') }}" class="nav-link active">Home</a>
                <a href="{{ route('product') }}" class="nav-link">Product</a>
                <a href="#" class="nav-link">Conctac Us</a>
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
      </div>
