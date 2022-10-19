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
      </ul>
      <!-- Authentication -->
      <form method="POST" action="{{ route('alumno.logout') }}">
        @csrf
            <x-dropdown-link :href="route('alumno.logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
</nav>