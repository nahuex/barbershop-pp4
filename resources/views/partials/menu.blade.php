<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gestionar_barbershop_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/barbershops*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gestionarBarbershop.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('barbershop_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.barbershops.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/barbershops") || request()->is("admin/barbershops/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.barbershop.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gestionar_servicio_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/servicios*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gestionarServicio.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('servicio_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.servicios.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/servicios") || request()->is("admin/servicios/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cut c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.servicio.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gestionar_empleado_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/barberos*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gestionarEmpleado.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('barbero_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.barberos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/barberos") || request()->is("admin/barberos/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-id-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.barbero.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gestionar_cliente_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clientes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gestionarCliente.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('cliente_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clientes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clientes") || request()->is("admin/clientes/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-address-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cliente.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gestionar_turno_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/turnos*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gestionarTurno.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('turno_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.turnos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/turnos") || request()->is("admin/turnos/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.turno.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gestionar_inventario_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/herramienta*") ? "c-show" : "" }} {{ request()->is("admin/insumos*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gestionarInventario.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('herramientum_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.herramienta.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/herramienta") || request()->is("admin/herramienta/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-wrench c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.herramientum.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('insumo_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.insumos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/insumos") || request()->is("admin/insumos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dolly c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.insumo.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>