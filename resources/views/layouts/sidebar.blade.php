<div class="sidebar">

    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="nav-icon icon-speedometer"></i> Inicio
                </a>
            </li>

            @role('superuser|supervisor|administrative')

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-chalkboard-teacher"></i>
                    &emsp;Alumnos
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}">
                            • Listar alumnos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.create') }}">
                            • Cargar alumno
                        </a>
                    </li>
                </ul>

            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-chalkboard-teacher"></i>&emsp;Calificaciones
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agents.index') }}">
                            • Dar de alta
                        </a>
                    </li>
                </ul>

            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-chalkboard-teacher"></i>&emsp;Agentes
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agents.index') }}">
                            • Dar de alta
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agents.assign.positions') }}">
                            • Asignar propuesta
                        </a>
                    </li>

                    <a class="nav-link" href="{{ route('agents.proposals.pending') }}">
                        • Propuestas pendientes
                    </a>
                    <li class="nav-item">
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Reasignaciones
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Búsqueda de expediente
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Cambiar situación de revista
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="">
                            • Dar de baja
                        </a>
                    </li>
                </ul>

            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-check"></i>&emsp;Movimientos diarios
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link " href="#">
                            • Parte diario
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('agent_licenses.index') }}">
                            • Entrada de licencias
                        </a>
                    </li>
                </ul>
            </li>

            @endrole

            @role('superuser|supervisor|janitor')
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-calendar-check"></i>&emsp;Reportes
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Inasistencia
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Asistencia
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Licencias
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Planilla parte diario
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Horarios de clases
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Planilla parte mensual
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            • Historial laboral de un agente
                        </a>
                    </li>

                </ul>
            </li>
            @endrole

            @role('superuser|supervisor')
            <li class="nav-item nav-dropdown">

                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-cogs"></i>&emsp;Panel de control
                </a>

                <ul class="nav-dropdown-items">

                    <li class="nav-item nav-dropdown">

                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fa fa-list-ul"></i>&emsp;P.O.F.
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pof.documents.index') }}">
                                    • Documentos
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pof.positions.index') }}">
                                    • Cargos
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pof.careers.index') }}">
                                    • Asignaturas
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('institutions.index') }}">
                                    • Establecimientos
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="nav-item nav-dropdown">

                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fa fa-list-alt"></i>&emsp;Licencias
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('license_codes.index') }}">
                                    • Códigos
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('license_codes_types.index') }}">
                                    • Tipos
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('license_officer.index') }}">
                                    • Funcionarios
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('position_type_hours.index') }}">
                            <i class="nav-icon fa fa-file-archive"></i> Nomenclador de cargos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('institutional_hours.index') }}">
                            <i class="nav-icon fa fa-file-archive"></i> Horas institucionales
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('documents.index') }}">
                            <i class="nav-icon fa fa-file-archive"></i> Documentos
                        </a>
                    </li>

                    @role('superuser')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="nav-icon fa fa-user-shield"></i> Usuarios
                        </a>
                    </li>
                    @endrole

                    @endrole
                </ul>
            </li>

            <li class="nav-item">
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" href="#" onclick="$(this).parent('form').submit()">
                        <i class="fa fa-arrow-left"></i>&emsp;{{ __('Salir') }}
                    </a>
                </form>
            </li>

        </ul>

    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>

</div>
