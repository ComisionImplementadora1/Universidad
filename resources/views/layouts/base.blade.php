<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/slate/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Universidad</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#toggleMobileMenu"
          aria-controls="toggleMobileMenu"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between navbar-dark bg-dark" id="toggleMobileMenu">
          <ul class="navbar-nav text-center">
            <li><a class="nav-link active" href="/departamentos">Departamentos</a></li>
            <li><a class="nav-link active" href="/carreras">Carreras</a></li>
            <li><a class="nav-link active" href="/materias">Materias</a></li>
            <li><a class="nav-link active" href="/docentes">Docentes</a></li>
            <li><a class="nav-link active" href="/alumnos">Alumnos</a></li>
          </ul>
          <!-- Authentication -->
          <form class="navbar-nav" method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
              class="nav-link active"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-dropdown-link>
          </form>

        </div>
      </nav>
    

    <div class="container mt-3">
        @yield('contenido')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>