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
        <li><a class="nav-link active" href="/docente/departamentos">Departamentos</a></li>
        <li><a class="nav-link active" href="/docente/carreras">Carreras</a></li>
        <li><a class="nav-link active" href="/docente/materias">Materias</a></li>
      </ul>
      <!-- Authentication -->
      <form class="navbar-nav" method="POST" action="{{ route('docente.logout') }}">
        @csrf
            <x-dropdown-link :href="route('docente.logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
</nav>