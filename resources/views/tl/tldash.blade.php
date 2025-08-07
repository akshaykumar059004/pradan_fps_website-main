<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>PRADAN - Professional Assistance for Development Action</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo me-5" href="{{route('vol')}}"><img src="{{ asset('assets/images/icons/Pradan-logo-title.png')}}" class="me-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('vol')}}"><img src="{{asset('assets/images/icons/Pradan-logo-icon.png')}}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="https://png.pngtree.com/png-vector/20191110/ourmid/pngtree-avatar-icon-profile-icon-member-login-vector-isolated-png-image_1978396.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-user text-primary"></i> Profile </a>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                <i class="ti-power-off text-primary"></i> Logout </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- Navbar End -->
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('ldash')}}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <!-- Forms Collapsible Menu -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#formsMenu" aria-expanded="false"
                            aria-controls="formsMenu">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Forms</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="formsMenu">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('tform1') }}">Land Form</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('tform2') }}">Pond Form</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('tform3') }}">Plant Form</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Coordinator Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tl') }}">
                            <i class="mdi mdi-check"></i>&nbsp;
                            <span class="menu-title ms-3">Approvals</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tl1') }}">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Applications</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tlexcel') }}">
                            <i class="fas fa-file-export menu-icon"></i>
                            <span class="menu-title">Export Records</span>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome {{ session('name') }} </h3>
                                    <h6 class="font-weight-normal mb-0">&nbsp;Team Leader</h6>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            <button class="btn btn-sm btn-light bg-white" type="button"
                                                id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                                <i class="mdi mdi-calendar"></i> Today ({{ \Carbon\Carbon::now()->format('d M Y') }}) </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card card-light-blue p-3">
                                <div class="row g-1"> <!-- Tight spacing with Bootstrap's gap utility -->

                                    <!-- Profile Picture Card (6 columns) -->
                                    <div class="col-md-4 d-flex align-items-center">
                                        <div class="card shadow card-tale text-center rounded-circle">
                                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                                <img src="https://png.pngtree.com/png-vector/20191110/ourmid/pngtree-avatar-icon-profile-icon-member-login-vector-isolated-png-image_1978396.jpg" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 140px; height: 140px; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- User Info Card (6 columns) -->
                                    <div class="col-md-8">
                                        <div class="card shadow card-light-danger h-100 w-100">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark">User Details</h5>
                                                <p><strong>Name:</strong> {{ session('name') }}</p>
                                                <p><strong>User ID:</strong> {{ session('user_id') }}</p>
                                                <p><strong>Date of Joining:</strong> {{session('payload')}}</p>
                                                <p><strong>Email:</strong> {{ session('email') }}</p>
                                                <p><strong>Phone:</strong> Fetch from DB</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">Applications Arrived</p>
                                            <p class="fs-30 mb-2 ">{{$totalSubmitted}}</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Applications Approved</p>
                                            <p class="fs-30 mb-2">{{$approved}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Requested For Change</p>
                                            <p class="fs-30 mb-2">{{$changeupdate}}</p>
                                            <p>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">Application Completed</p>
                                            <p class="fs-30 mb-2">{{$completed}}</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User Management Section -->
<div class="row mt-4">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">
                        <i class="mdi mdi-account-group me-2"></i>
                        User Management
                    </h4>
                    <a class="btn btn-warning d-flex align-items-center" href="{{ route('tl_mem') }}">
                        <i class="fas fa-users-cog me-2"></i>
                        <span>Manage Members</span>
                    </a>
                </div>
                
                <div class="row">
                    <!-- Volunteers Count -->
                    <div class="col-md-3 mb-3 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="mdi mdi-account-heart icon-lg"></i>
                                </div>
                                <p class="mb-2 font-weight-medium">Volunteers</p>
                                <p class="fs-30 mb-2">{{ $volunteerCount ?? 0 }}</p>
                                <p class="text-muted mb-0">Active Members</p>
                            </div>
                        </div>
                    </div>

                    <!-- Coordinators Count -->
                    <div class="col-md-3 mb-3 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="mdi mdi-account-star icon-lg"></i>
                                </div>
                                <p class="mb-2 font-weight-medium">Coordinators</p>
                                <p class="fs-30 mb-2">{{ $coordinatorCount ?? 0 }}</p>
                                <p class="text-muted mb-0">Active Members</p>
                            </div>
                        </div>
                    </div>

                    <!-- Finance Managers Count -->
                    <div class="col-md-3 mb-3 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="mdi mdi-account-cash icon-lg"></i>
                                </div>
                                <p class="mb-2 font-weight-medium">Finance Managers</p>
                                <p class="fs-30 mb-2">{{ $financeManagerCount ?? 0 }}</p>
                                <p class="text-muted mb-0">Active Members</p>
                            </div>
                        </div>
                    </div>

                    <!-- Verifiers Count -->
                    <div class="col-md-3 mb-3 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <i class="mdi mdi-account-check icon-lg"></i>
                                </div>
                                <p class="mb-2 font-weight-medium">Verifiers</p>
                                <p class="fs-30 mb-2">{{ $verifierCount ?? 0 }}</p>
                                <p class="text-muted mb-0">Active Members</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Row
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card bg-light">
                            <div class="card-body py-3">
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <span class="text-muted">Total Members</span>
                                        <h5 class="mb-0 mt-1">{{ ($volunteerCount ?? 0) + ($coordinatorCount ?? 0) + ($financeManagerCount ?? 0) + ($verifierCount ?? 0) }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="text-muted">Active Today</span>
                                        <h5 class="mb-0 mt-1 text-success">{{ $activeTodayCount ?? 0 }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="text-muted">New This Month</span>
                                        <h5 class="mb-0 mt-1 text-info">{{ $newThisMonthCount ?? 0 }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="text-muted">Pending Approval</span>
                                        <h5 class="mb-0 mt-1 text-warning">{{ $pendingApprovalCount ?? 0 }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
                        <!-- <div>
                            <a class="btn btn-warning d-flex align-items-center w-25" href="{{ route('tl_mem') }}">
                                <i class="fas fa-users-cog me-2"></i>
                                <span class="menu-title">Manage Members</span>
                            </a>
                        </div> -->
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025. Developed and Maintained By <b>TIH & Developers Unit</b>.
                            All rights reserved.</span>

                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Contact Us <a href="https://www.linkedin.com/company/professional-assistance-for-development-action/"><i
                                    class="ti-linkedin ms-2"></a></i></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

</body>

</html>