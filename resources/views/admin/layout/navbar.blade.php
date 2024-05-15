<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="index.html">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">Bapekom 6</span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                data-action="dark_mode_toggle">
                <i class="far fa-moon"></i>
            </button>
            <!-- END Dark Mode -->

            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}"
                        href="/administrator">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::currentRouteName() === 'admin.data.kategori' ? 'active' : '' }}"
                        href="/administrator/kategori">
                        <i class="nav-main-link-icon far fa-rectangle-list"></i>Kategori</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::currentRouteName() === 'admin.data.aset' || Route::currentRouteName() === 'admin.import.aset' || Route::currentRouteName() === 'admin.data.aset.kategori' ? 'active' : '' }}"
                        href="/administrator/aset">
                        <i class="nav-main-link-icon si si-layers"></i>
                        <span class="nav-main-link-name">Asset</span>
                    </a>
                </li>
                <li class="nav-main-item open">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="true" href="#">
                        <i class="nav-main-link-icon si si-badge"></i>
                        <span class="nav-main-link-name">Peminjaman</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="be_ui_grid.html">
                                <span class="nav-main-link-name">Tambah Peminjaman</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                          <a class="nav-main-link active" href="be_ui_grid.html">
                              <span class="nav-main-link-name">Status Peminjaman</span>
                          </a>
                      </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="be_pages_dashboard.html">
                        <i class="nav-main-link-icon fa fa-hand-holding"></i>
                        <span class="nav-main-link-name">Peminjaman</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="be_pages_dashboard.html">
                        <i class="nav-main-link-icon si si-notebook"></i>
                        <span class="nav-main-link-name">Laporan</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="be_pages_dashboard.html">
                        <i class="nav-main-link-icon si si-users"></i>
                        <span class="nav-main-link-name">Pengguna</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
