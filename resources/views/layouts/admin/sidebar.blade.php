<nav id="sidebar">
    <div class="shadow-bottom"></div>
    <ul class="list-unstyled menu-categories" id="accordionExample">

        <li class="menu">
            <a href="{{ route('home') }}" {{(Route::currentRouteName() == 'home' ? 'data-active=true' : '')}}  aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fa-solid fa-house mr-3"></i>
                    <span>Inicio</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('persona.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'persona' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-user mr-3"></i>
                    <span>Persona</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('paciente.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'paciente' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-user-injured mr-3"></i>
                    <span>Paciente</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('doctor.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'doctor' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-user-md mr-3"></i>
                    <span>Doctor</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('especialidad.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'especialidad' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-star-of-life mr-3"></i>
                    <span>Especialidad</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('agenda_consulta.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'agenda_consulta' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-calendar-times mr-3"></i>
                    <span>Agenda Consulta</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('consulta.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'consulta' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-question mr-3"></i>
                    <span>Consulta General</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('doctor_consulta.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'doctor_consulta' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-stethoscope mr-3"></i>
                    <span>Doctor M.</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('user.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'user' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-user-tie mr-3"></i>
                    <span>Usuario</span>
                </div>
            </a>
        </li>

        <li class="menu">
            <a href="{{ route('role.index') }}" {{(substr(Route::currentRouteName() , 0 , strpos(Route::currentRouteName(), '.')) == 'role' ? 'data-active=true' : '')}}
                aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="fas fa-users mr-3"></i>
                    <span>Grupo Usuario</span>
                </div>
            </a>
        </li>


    </ul>
    <!-- <div class="shadow-bottom"></div> -->

</nav>
