    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MediCarePro</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                    <a class="nav-link {{ request()->routeIs('medicos') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('medicos') }}">Médicos</a>
                    <a class="nav-link {{ request()->routeIs('pacientes') ? 'active' : '' }}"
                        href="{{ route('pacientes') }}">Pacientes</a>
                    <a class="nav-link {{ request()->routeIs('atendimentos') ? 'active' : '' }}"
                        href="{{ route('atendimentos') }}">Atendimentos</a>
                </div>
            </div>
        </div>
    </nav>
