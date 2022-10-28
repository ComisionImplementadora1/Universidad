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
            @if (Auth::guard('administrador')->check())
              <li><a class="nav-link active" href="/administrador/">Inicio</a></li>
              <li><a class="nav-link active" href="/administrador/departamentos">Departamentos</a></li>
              <li><a class="nav-link active" href="/administrador/carreras">Carreras</a></li>
              <li><a class="nav-link active" href="/administrador/materias">Materias</a></li>
              <li><a class="nav-link active" href="/administrador/docentes">Docentes</a></li>
              <li><a class="nav-link active" href="/administrador/alumnos">Alumnos</a></li>
              <li><a class="nav-link active" href="/administrador/comisiones">Comision cursado</a></li>
            @elseif (Auth::guard('docente')->check())
              <li><a class="nav-link active" href="/docente/">Inicio</a></li>
              <li><a class="nav-link active" href="/docente/departamentos">Departamentos</a></li>
              <li><a class="nav-link active" href="/docente/carreras">Carreras</a></li>
              <li><a class="nav-link active" href="/docente/materias">Materias</a></li>
              <li><a class="nav-link active" href="/docente/comisiones">Comision cursado</a></li>
            @else
              <li><a class="nav-link active" href="/alumno/">Inicio</a></li>
              <li><a class="nav-link active" href="/alumno/departamentos">Departamentos</a></li>
              <li><a class="nav-link active" href="/alumno/carreras">Carreras</a></li>
              <li><a class="nav-link active" href="/alumno/materias">Materias</a></li>
            @endif
          </ul>
          @if (Auth::guard('administrador')->check())
            <!-- Authentication -->
            <form class="navbar-nav" method="POST" action="{{ route('administrador.logout') }}">
              @csrf
              <x-dropdown-link :href="route('administrador.logout')"
                class="nav-link active"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-dropdown-link>
            </form>
          @elseif (Auth::guard('docente')->check())
            <!-- Authentication -->
            <form class="navbar-nav" method="POST" action="{{ route('docente.logout') }}">
              @csrf
              <x-dropdown-link :href="route('docente.logout')"
                class="nav-link active"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-dropdown-link>
            </form>
          @else
            <!-- Authentication -->
            <form class="navbar-nav" method="POST" action="{{ route('alumno.logout') }}">
              @csrf
              <x-dropdown-link :href="route('alumno.logout')"
                class="nav-link active"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-dropdown-link>
            </form>
          @endif

        </div>
      </nav>
    

    <div class="container mt-3">
        @yield('contenido')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>