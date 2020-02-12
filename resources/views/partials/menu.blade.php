<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-calendar">

                        </i>
                        <p>
                            <span>{{ trans('global.systemCalendar') }}</span>
                        </p>
                    </a>
                </li>
                @can('client_report_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.reports.index") }}" class="nav-link {{ request()->is('admin/client-reports') || request()->is('admin/client-reports/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-chart-line">

                            </i>
                            <p>
                                <span>{{ trans('cruds.clientReport.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('appointment_access')
                <li class="nav-item">
                    <a href="{{ route("admin.appointments.index") }}" class="nav-link {{ request()->is('admin/appointments') || request()->is('admin/appointments/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-chart-line">

                        </i>
                        <p>
                            <span>{{ trans('cruds.appointment.title') }}</span>
                        </p>
                    </a>
                </li>
            @endcan

                @can('mother_access')

                <li class="nav-item">
                    <a href="{{ route("admin.mothers.index") }}" class="nav-link {{ request()->is('admin/mothers') || request()->is('admin/mothers/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-female">

                        </i>
                        <p>
                            <span>{{ trans('cruds.mother.title') }}</span>
                        </p>
                    </a>
                </li>
                @endcan

                @can('infant_access')
                <li class="nav-item">
                    <a href="{{ route("admin.infants.index") }}" class="nav-link {{ request()->is('admin/infants') || request()->is('admin/infants/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-child">

                        </i>
                        <p>
                            <span>{{ trans('cruds.infant.title') }}</span>
                        </p>
                    </a>
                </li>
                @endcan
                @can('facility_access')
                <li class="nav-item">
                    <a href="{{ route("admin.facilities.index") }}" class="nav-link {{ request()->is('admin/facilities') || request()->is('admin/facilities/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-hospital">


                        </i>
                        <p>
                            <span>{{ trans('cruds.facility.title') }}</span>
                        </p>
                    </a>
                </li>
                @endcan
                @can('health_worker_access')
                <li class="nav-item">
                    <a href="{{ route("admin.health-workers.index") }}" class="nav-link {{ request()->is('admin/healthworker') || request()->is('admin/healthworker/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user-md">

                        </i>
                        <p>
                            <span>{{ trans('cruds.healthWorker.title') }}</span>
                        </p>
                    </a>
                </li>
                @endcan

                @can('client_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user-plus">

                            </i>
                            <p>
                                <span>{{ trans('cruds.client.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan



                @can('transaction_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-credit-card">

                            </i>
                            <p>
                                <span>{{ trans('cruds.transaction.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('client_management_setting_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/currencies*') ? 'menu-open' : '' }} {{ request()->is('admin/transaction-types*') ? 'menu-open' : '' }} {{ request()->is('admin/income-sources*') ? 'menu-open' : '' }} {{ request()->is('admin/client-statuses*') ? 'menu-open' : '' }} {{ request()->is('admin/project-statuses*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cog">

                            </i>
                            <p>
                                <span>{{ trans('cruds.clientManagementSetting.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('currency_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.visit-type.index") }}" class="nav-link {{ request()->is('admin/visit-type') || request()->is('admin/visit-type/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-money-bill">

                                        </i>
                                        <p>
                                            <span>Visit Types</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('subcounty_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.subcounties.index") }}" class="nav-link {{ request()->is('admin/visit-type') || request()->is('admin/visit-type/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-money-bill">

                                        </i>
                                        <p>
                                            <span>Subcounties</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('currency_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.currencies.index") }}" class="nav-link {{ request()->is('admin/currencies') || request()->is('admin/currencies/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-money-bill">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.currency.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transaction_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transaction-types.index") }}" class="nav-link {{ request()->is('admin/transaction-types') || request()->is('admin/transaction-types/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-money-check">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.transactionType.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_source_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-sources.index") }}" class="nav-link {{ request()->is('admin/income-sources') || request()->is('admin/income-sources/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-database">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.incomeSource.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('client_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.client-statuses.index") }}" class="nav-link {{ request()->is('admin/client-statuses') || request()->is('admin/client-statuses/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-server">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.clientStatus.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.project-statuses.index") }}" class="nav-link {{ request()->is('admin/project-statuses') || request()->is('admin/project-statuses/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-server">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.projectStatus.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.auditLog.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
