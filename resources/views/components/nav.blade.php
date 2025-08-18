<div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">

    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span>
            </a>
        </div>
    </div>

    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-md-auto">

        <!-- Style Switcher -->
        <li class="nav-item dropdown me-2 me-xl-0">
            <a class="nav-link dropdown-toggle hide-arrow" id="nav-theme" href="javascript:void(0);" data-bs-toggle="dropdown">
                <i class="icon-base bx bx-sun icon-md theme-icon-active"></i>
                <span class="d-none ms-2" id="nav-theme-text">Toggle theme</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text">
                <li>
                    <button type="button" class="dropdown-item align-items-center active" data-bs-theme-value="light" aria-pressed="false">
                        <span><i class="icon-base bx bx-sun icon-md me-3" data-icon="sun"></i>Sáng</span>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item align-items-center" data-bs-theme-value="dark" aria-pressed="true">
                        <span><i class="icon-base bx bx-moon icon-md me-3" data-icon="moon"></i>Tối</span>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item align-items-center" data-bs-theme-value="system" aria-pressed="false">
                        <span><i class="icon-base bx bx-desktop icon-md me-3" data-icon="desktop"></i>Hệ Thống</span>
                    </button>
                </li>
            </ul>
        </li>
        <!-- / Style Switcher-->


        <!-- Quick links  -->
        <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                <i class="icon-base bx bx-grid-alt icon-md"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end p-0">
                <div class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                        <h6 class="mb-0 me-auto">Shortcuts</h6>
                        <a href="javascript:void(0)" class="dropdown-shortcuts-add py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="icon-base bx bx-plus-circle text-heading"></i></a>
                    </div>
                </div>
                <div class="dropdown-shortcuts-list scrollable-container">
                    <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                <i class="icon-base bx bx-calendar icon-26px text-heading"></i>
                            </span>
                            <a href="app-calendar.html" class="stretched-link">Calendar</a>
                            <small>Appointments</small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                <i class="icon-base bx bx-food-menu icon-26px text-heading"></i>
                            </span>
                            <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                            <small>Manage Accounts</small>
                        </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                <i class="icon-base bx bx-user icon-26px text-heading"></i>
                            </span>
                            <a href="app-user-list.html" class="stretched-link">User App</a>
                            <small>Manage Users</small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                <i class="icon-base bx bx-check-shield icon-26px text-heading"></i>
                            </span>
                            <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                            <small>Permission</small>
                        </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                <i class="icon-base bx bx-pie-chart-alt-2 icon-26px text-heading"></i>
                            </span>
                            <a href="index.html" class="stretched-link">Dashboard</a>
                            <small>User Dashboard</small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                <i class="icon-base bx bx-cog icon-26px text-heading"></i>
                            </span>
                            <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                            <small>Account Settings</small>
                        </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                <i class="icon-base bx bx-help-circle icon-26px text-heading"></i>
                            </span>
                            <a href="pages-faq.html" class="stretched-link">FAQs</a>
                            <small>FAQs & Articles</small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                            <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                <i class="icon-base bx bx-window-open icon-26px text-heading"></i>
                            </span>
                            <a href="modal-examples.html" class="stretched-link">Modals</a>
                            <small>Useful Popups</small>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <!-- Quick links -->

        <!-- Notification -->
        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                <span class="position-relative">
                    <i class="icon-base bx bx-bell icon-md"></i>
                    <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-0">
                <li class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                        <h6 class="mb-0 me-auto">Notification</h6>
                        <div class="d-flex align-items-center h6 mb-0">
                            <span class="badge bg-label-primary me-2">8 New</span>
                            <a href="javascript:void(0)" class="dropdown-notifications-all p-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="icon-base bx bx-envelope-open text-heading"></i></a>
                        </div>
                    </div>
                </li>
                <li class="dropdown-notifications-list scrollable-container">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="../../assets/img/avatars/1.png" alt class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">Congratulation Lettie 🎉</h6>
                                    <small class="mb-1 d-block text-body">Won the monthly best seller gold badge</small>
                                    <small class="text-body-secondary">1h ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">Charles Franklin</h6>
                                    <small class="mb-1 d-block text-body">Accepted your connection</small>
                                    <small class="text-body-secondary">12hr ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="../../assets/img/avatars/2.png" alt class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">New Message ✉️</h6>
                                    <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                                    <small class="text-body-secondary">1h ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-success"><i class="icon-base bx bx-cart"></i></span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">Whoo! You have new order 🛒</h6>
                                    <small class="mb-1 d-block text-body">ACME Inc. made new order $1,154</small>
                                    <small class="text-body-secondary">1 day ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="../../assets/img/avatars/9.png" alt class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">Application has been approved 🚀</h6>
                                    <small class="mb-1 d-block text-body">Your ABC project application has been approved.</small>
                                    <small class="text-body-secondary">2 days ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-success"><i class="icon-base bx bx-pie-chart-alt"></i></span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">Monthly report is generated</h6>
                                    <small class="mb-1 d-block text-body">July monthly financial report is generated </small>
                                    <small class="text-body-secondary">3 days ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="../../assets/img/avatars/5.png" alt class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">Send connection request</h6>
                                    <small class="mb-1 d-block text-body">Peter sent you connection request</small>
                                    <small class="text-body-secondary">4 days ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="../../assets/img/avatars/6.png" alt class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">New message from Jane</h6>
                                    <small class="mb-1 d-block text-body">Your have new message from Jane</small>
                                    <small class="text-body-secondary">5 days ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-warning"><i class="icon-base bx bx-error"></i></span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="small mb-0">CPU is running high</h6>
                                    <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at 88.63%,</small>
                                    <small class="text-body-secondary">5 days ago</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="icon-base bx bx-x"></span></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="border-top">
                    <div class="d-grid p-4">
                        <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                            <small class="align-middle">View all notifications</small>
                        </a>
                    </div>
                </li>
            </ul>
        </li>
        <!--/ Notification -->
        <!-- User -->
        @include('components.user')
        <!--/ User -->

    </ul>
</div>