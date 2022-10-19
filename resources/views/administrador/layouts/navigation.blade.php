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
        <li><a class="nav-link active" href="/administrador/departamentos">Departamentos</a></li>
        <li><a class="nav-link active" href="/administrador/carreras">Carreras</a></li>
        <li><a class="nav-link active" href="/administrador/materias">Materias</a></li>
        <li><a class="nav-link active" href="/administrador/docentes">Docentes</a></li>
        <li><a class="nav-link active" href="/administrador/alumnos">Alumnos</a></li>
      </ul>
      <!-- Authentication -->
      <form method="POST" action="{{ route('administrador.logout') }}">
        @csrf
            <x-dropdown-link :href="route('administrador.logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
</nav>