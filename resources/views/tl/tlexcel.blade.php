<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PRADAN - Professional Assistance for Development Action</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">




    <style>
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .step3-container {
            display: flex;
            flex-direction: column;
            gap: 15px;

            /* Added spacing */
        }

        #land_table tbody tr {
            height: 80px;
            /* Adjust as needed */
            vertical-align: middle;
        }

        #land_table td,
        #land_table th {
            padding: 1rem !important;
            font-size: 15px;
        }

        #land_table .btn {
            padding: 10px 20px !important;
            font-size: 16px !important;
            /* border-radius: 0.25rem !important; */
        }

        #pond_table tbody tr {
            height: 80px;
            /* Adjust as needed */
            vertical-align: middle;
        }

        #pond_table td,
        #pond_table th {
            padding: 1rem !important;
            font-size: 15px;
        }

        #pond_table .btn {
            padding: 10px 20px !important;
            font-size: 16px !important;
            /* border-radius: 0.25rem !important; */
        }

        #plant_table tbody tr {
            height: 80px;
            /* Adjust as needed */
            vertical-align: middle;
        }

        #plant_table td,
        #plant_table th {
            padding: 1rem !important;
            font-size: 15px;
        }

        #plant_table .btn {
            padding: 10px 20px !important;
            font-size: 16px !important;
            /* border-radius: 0.25rem !important; */
        }

        .dataTables_wrapper .dataTables_filter input {
            margin-left: 0.5rem;
            padding: 5px 10px;
        }

        /* General Table Styling */
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #ccc;
            padding: 8px 12px;
            border-radius: 0.25rem;
            outline: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #4b49ac;
            box-shadow: 0 0 0 0.1rem rgba(75, 73, 172, 0.25);
        }

        /* Pagination Buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 6px 12px;
            margin: 0 2px;
            border-radius: 0.25rem;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            font-size: 14px;
            color: #333;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #4b49ac;
            color: #fff !important;
            border-color: #4b49ac;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #134E13;
            color: white !important;
            border-color: #fff;
        }

        /* Table Info Text */
        .dataTables_wrapper .dataTables_info {
            font-size: 14px;
            margin-top: 10px;
        }

        /* Search Label */
        .dataTables_wrapper .dataTables_filter label {
            font-weight: 600;
            font-size: 14px;
        }

        /* Hide the default 'Search:' label text */
        .dataTables_wrapper .dataTables_filter label {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 0.5rem;
            font-size: 0;
            /* Hides text but keeps layout */
        }

        /* Search input styling */
        .dataTables_wrapper .dataTables_filter input {
            margin-top: 5px;
            margin-right: 3px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 8px 12px 8px 35px;
            /* left space for icon */
            border-radius: 25px;
            outline: none;
            font-size: 14px;
            transition: all 0.2s;
            width: 250px;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='gray' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.242.656a5 5 0 1 1 0-10 5 5 0 0 1 0 10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: 10px center;
            background-size: 16px 16px;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #134E13;
            box-shadow: 0 0 0 2px rgba(75, 73, 172, 0.1);
            outline: none;
        }

        /* Responsive Wrapping Fix */
        @media (max-width: 768px) {

            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_paginate {
                text-align: center;
                float: none !important;
            }
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo me-5" href="{{route('vol')}}"><img src="{{ asset('assets/images/icons/Pradan-logo-title.png')}}" class="me-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('vol')}}"><img src="{{asset('assets/images/icons/Pradan-logo-icon.png')}}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

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
                            <i class="mdi mdi-check me-3"></i>
                            <span class="menu-title">Approvals</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('tl1') }}">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Applications</span>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tlexcel') }}">
                            <i class="fas fa-file-export menu-icon"></i>
                            <span class="menu-title">Export Records</span>
                        </a>
                    </li>

                </ul>
                <button class="navbar-toggler minimize-btn" type="button" data-toggle="minimize">
                    <span class="fa-solid fa-right-to-bracket"></span>
                </button>
            </nav>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <ul class="nav nav-tabs mb-3"
                                    style="border-radius: 10px 10px 10px 10px; overflow: hidden;" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#landform" role="tab"
                                            aria-selected="true">
                                            <i class="fas fa-seedling"></i><b>&nbsp;Land Records</b>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#pondform" role="tab"
                                            aria-selected="false">
                                            <i class="fas fa-water"></i><b>&nbsp;Pond Records</b>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#plantform" role="tab"
                                            aria-selected="false">
                                            <i class="fas fa-tree"></i><b>&nbsp;Plantation Records</b>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content tabcontent-border">


                                    <div class="tab-pane p-20 active" id="landform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Land Records</h4>
                                                <div class="table-responsive">
                                                    <!-- Date Range Filter Form -->
                                                    <form id="date-filter-form" style="padding: 15px; border: 1px solid #ddd; border-radius: 10px; background: #f8f9fa; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
                                                        <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 10px;">
                                                            <!-- From Date -->
                                                            <div style="flex: 1;">
                                                                <label for="from_date" style="font-weight: bold;">From Date:</label>
                                                                <input type="date" id="from_date" name="from_date" required
                                                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 8px; outline: none;">
                                                            </div>

                                                            <!-- To Date -->
                                                            <div style="flex: 1;">
                                                                <label for="to_date" style="font-weight: bold;">To Date:</label>
                                                                <input type="date" id="to_date" name="to_date" required
                                                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 8px; outline: none;">
                                                            </div>

                                                            <!-- Buttons (Now with Margin-Top) -->
                                                            <div style="display: flex; gap: 10px; margin-top: 20px;">
                                                                <!-- Filter Button -->
                                                                <button type="submit" style="padding: 8px 15px; border: none; border-radius: 8px; background: #007bff; color: white; font-weight: bold; cursor: pointer;">
                                                                    Filter
                                                                </button>

                                                                <!-- Download Button -->
                                                                <button id="download" style="padding: 8px 15px; border: none; border-radius: 8px; background: #28a745; color: white; font-weight: bold; cursor: pointer;">
                                                                    Download as Excel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="pondform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Pond Records</h4>
                                                <div class="table-responsive">
                                                    <!-- Date Range Filter Form -->
                                                    <form id="date-filter-form" style="padding: 15px; border: 1px solid #ddd; border-radius: 10px; background: #f8f9fa; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
                                                        <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 10px;">
                                                            <!-- From Date -->
                                                            <div style="flex: 1;">
                                                                <label for="from_date" style="font-weight: bold;">From Date:</label>
                                                                <input type="date" id="from_date" name="from_date" required
                                                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 8px; outline: none;">
                                                            </div>

                                                            <!-- To Date -->
                                                            <div style="flex: 1;">
                                                                <label for="to_date" style="font-weight: bold;">To Date:</label>
                                                                <input type="date" id="to_date" name="to_date" required
                                                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 8px; outline: none;">
                                                            </div>

                                                            <!-- Buttons (Now with Margin-Top) -->
                                                            <div style="display: flex; gap: 10px; margin-top: 20px;">
                                                                <!-- Filter Button -->
                                                                <button type="submit" style="padding: 8px 15px; border: none; border-radius: 8px; background: #007bff; color: white; font-weight: bold; cursor: pointer;">
                                                                    Filter
                                                                </button>

                                                                <!-- Download Button -->
                                                                <button id="download" style="padding: 8px 15px; border: none; border-radius: 8px; background: #28a745; color: white; font-weight: bold; cursor: pointer;">
                                                                    Download as Excel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="plantform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Plantation Records</h4>
                                                <div class="table-responsive">
                                                    <!-- Date Range Filter Form -->
                                                    <form id="date-filter-form" style="padding: 15px; border: 1px solid #ddd; border-radius: 10px; background: #f8f9fa; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
                                                        <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 10px;">
                                                            <!-- From Date -->
                                                            <div style="flex: 1;">
                                                                <label for="from_date" style="font-weight: bold;">From Date:</label>
                                                                <input type="date" id="from_date" name="from_date" required
                                                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 8px; outline: none;">
                                                            </div>

                                                            <!-- To Date -->
                                                            <div style="flex: 1;">
                                                                <label for="to_date" style="font-weight: bold;">To Date:</label>
                                                                <input type="date" id="to_date" name="to_date" required
                                                                    style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 8px; outline: none;">
                                                            </div>

                                                            <!-- Buttons (Now with Margin-Top) -->
                                                            <div style="display: flex; gap: 10px; margin-top: 20px;">
                                                                <!-- Filter Button -->
                                                                <button type="submit" style="padding: 8px 15px; border: none; border-radius: 8px; background: #007bff; color: white; font-weight: bold; cursor: pointer;">
                                                                    Filter
                                                                </button>

                                                                <!-- Download Button -->
                                                                <button id="download" style="padding: 8px 15px; border: none; border-radius: 8px; background: #28a745; color: white; font-weight: bold; cursor: pointer;">
                                                                    Download as Excel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025.
                                Developed and Maintained By <b>TIH & Developers Unit</b>.
                                All rights reserved.</span>

                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Contact Us <a
                                    href="https://www.linkedin.com/company/professional-assistance-for-development-action/"><i
                                        class="ti-linkedin ms-2"></a></i></span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- Modalsss -->

    <!--  Farmer Detail Modal -->
    <div class="modal fade" id="farmerdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color:#134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Farmer Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Row 1 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Name:</strong> <span id="f_name"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Father/Spouse:</strong> <span id="f_spouse"></span>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Mobile:</strong> <span id="f_mobile"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Gender:</strong> <span id="f_gender"></span>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Id_Card:</strong> <span id="f_card"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Members:</strong> <span id="f_member"></span>
                        </div>
                    </div>

                    <!-- Row 4 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Id_Number:</strong> <span id="f_number"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Hamlet:</strong> <span id="f_hamlet"></span>
                        </div>
                    </div>

                    <!-- Row 5 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Panchayat:</strong> <span id="f_panchayat"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Block:</strong> <span id="f_block"></span>
                        </div>
                    </div>

                    <!-- Row 6 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of Household:</strong> <span id="f_household_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Special Category:</strong> <span id="f_special_category"></span>
                        </div>
                    </div>

                    <!-- Row 7 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Caste:</strong> <span id="f_caste"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Occupation:</strong> <span id="f_occupation"></span>
                        </div>
                    </div>

                    <!-- Row 8 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of House:</strong> <span id="f_house_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Drinking Water Source:</strong> <span id="f_drinking_water"></span>
                        </div>
                    </div>

                    <!-- Row 9 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Potability:</strong> <span id="f_potability"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Domestic Water Source:</strong> <span id="f_domestic_water"></span>
                        </div>
                    </div>

                    <!-- Row 10 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Toilet Availability:</strong> <span id="f_toilet_availability"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Toilet Condition:</strong> <span id="f_toilet_condition"></span>
                        </div>
                    </div>

                    <!-- Row 11 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>House Owner:</strong> <span id="f_house_owner"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Household Education:</strong> <span id="f_household_education"></span>
                        </div>
                    </div>

                    <!-- Row 12 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Latitude:</strong> <span id="f_latitude"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Longitude:</strong> <span id="f_longitude"></span>
                        </div>
                    </div>

                    <!-- Row 13 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>MCode:</strong> <span id="f_mcode"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editable Farmer Detail Modal -->
    <div class="modal fade" id="edit_farmerdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color:#134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Farmer Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Repeatable Row Template -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <label><strong>Farmer Name:</strong></label>
                            <input type="text" class="form-control" id="input_f_name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Father/Spouse:</strong></label>
                            <input type="text" class="form-control" id="input_f_spouse">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <label><strong>Mobile:</strong></label>
                            <input type="text" class="form-control" id="input_f_mobile">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Gender:</strong></label>
                            <input type="text" class="form-control" id="input_f_gender">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Id Card Type:</strong></label>
                            <input type="text" class="form-control" id="input_f_card">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Household Members:</strong></label>
                            <input type="text" class="form-control" id="input_f_member">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Id Number:</strong></label>
                            <input type="text" class="form-control" id="input_f_number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Hamlet:</strong></label>
                            <input type="text" class="form-control" id="input_f_hamlet">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Panchayat:</strong></label>
                            <input type="text" class="form-control" id="input_f_panchayat">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Block:</strong></label>
                            <input type="text" class="form-control" id="input_f_block">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Type of Household:</strong></label>
                            <input type="text" class="form-control" id="input_f_household_type">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Special Category:</strong></label>
                            <input type="text" class="form-control" id="input_f_special_category">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Caste:</strong></label>
                            <input type="text" class="form-control" id="input_f_caste">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Occupation:</strong></label>
                            <input type="text" class="form-control" id="input_f_occupation">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Type of House:</strong></label>
                            <input type="text" class="form-control" id="input_f_house_type">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Drinking Water Source:</strong></label>
                            <input type="text" class="form-control" id="input_f_drinking_water">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Potability:</strong></label>
                            <input type="text" class="form-control" id="input_f_potability">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Domestic Water Source:</strong></label>
                            <input type="text" class="form-control" id="input_f_domestic_water">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Toilet Availability:</strong></label>
                            <input type="text" class="form-control" id="input_f_toilet_availability">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Toilet Condition:</strong></label>
                            <input type="text" class="form-control" id="input_f_toilet_condition">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>House Owner:</strong></label>
                            <input type="text" class="form-control" id="input_f_house_owner">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Household Education:</strong></label>
                            <input type="text" class="form-control" id="input_f_household_education">
                        </div>
                    </div>

                    <div class="row border p-2 mb-3">
                        <div class="col-md-6 mb-3">
                            <label><strong>Latitude:</strong></label>
                            <input type="text" class="form-control" id="input_f_latitude">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label><strong>Longitude:</strong></label>
                            <input type="text" class="form-control" id="input_f_longitude">
                        </div>
                    </div>



                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Land Detail Modal -->
    <div class="modal fade" id="farmerdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color:#134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Farmer Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Row 1 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Name:</strong> <span id="f_name"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Father/Spouse:</strong> <span id="f_spouse"></span>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Mobile:</strong> <span id="f_mobile"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Gender:</strong> <span id="f_gender"></span>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Id_Card:</strong> <span id="f_card"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Members:</strong> <span id="f_member"></span>
                        </div>
                    </div>

                    <!-- Row 4 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Id_Number:</strong> <span id="f_number"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Hamlet:</strong> <span id="f_hamlet"></span>
                        </div>
                    </div>

                    <!-- Row 5 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Panchayat:</strong> <span id="f_panchayat"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Block:</strong> <span id="f_block"></span>
                        </div>
                    </div>

                    <!-- Row 6 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of Household:</strong> <span id="f_household_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Special Category:</strong> <span id="f_special_category"></span>
                        </div>
                    </div>

                    <!-- Row 7 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Caste:</strong> <span id="f_caste"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Occupation:</strong> <span id="f_occupation"></span>
                        </div>
                    </div>

                    <!-- Row 8 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of House:</strong> <span id="f_house_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Drinking Water Source:</strong> <span id="f_drinking_water"></span>
                        </div>
                    </div>

                    <!-- Row 9 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Potability:</strong> <span id="f_potability"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Domestic Water Source:</strong> <span id="f_domestic_water"></span>
                        </div>
                    </div>

                    <!-- Row 10 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Toilet Availability:</strong> <span id="f_toilet_availability"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Toilet Condition:</strong> <span id="f_toilet_condition"></span>
                        </div>
                    </div>

                    <!-- Row 11 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>House Owner:</strong> <span id="f_house_owner"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Household Education:</strong> <span id="f_household_education"></span>
                        </div>
                    </div>

                    <!-- Row 12 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Latitude:</strong> <span id="f_latitude"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Longitude:</strong> <span id="f_longitude"></span>
                        </div>
                    </div>

                    <!-- Row 13 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>MCode:</strong> <span id="f_mcode"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Land Form Modal -->
    <div class="modal fade" id="editlanddet_modal" tabindex="-1" aria-labelledby="editLandModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 8px;">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="editLandModalLabel">Edit Land Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #fff;"></button>
                </div>
                <form id="editlandEditForm">
                    @csrf
                    <div class="modal-body">
                        <input type="textx" name="land_id" id="ed_land_id">

                        <div class="row g-3">
                            <div class="col-md-6"><label>Ownership</label><input type="text" class="form-control" name="ownership" id="ownership"></div>
                            <div class="col-md-6"><label>Well Irrigation</label><input type="text" class="form-control" name="well_irrigation" id="well_irrigation"></div>
                            <div class="col-md-6"><label>Area Irrigated</label><input type="text" class="form-control" name="area_irrigated" id="area_irrigated"></div>
                            <div class="col-md-6"><label>Irrigated Lands</label><input type="text" class="form-control" name="irrigated_lands" id="irrigated_lands"></div>
                            <div class="col-md-6"><label>Patta</label><input type="text" class="form-control" name="patta" id="patta"></div>
                            <div class="col-md-6"><label>Total Area</label><input type="text" class="form-control" name="total_area" id="total_area"></div>
                            <div class="col-md-6"><label>Revenue</label><input type="text" class="form-control" name="revenue" id="revenue"></div>
                            <div class="col-md-6"><label>Crop Season</label><input type="text" class="form-control" name="crop_season" id="crop_season"></div>
                            <div class="col-md-6"><label>Livestocks</label><input type="text" class="form-control" name="livestocks" id="livestocks"></div>
                            <div class="col-md-6"><label>SF Number</label><input type="text" class="form-control" name="sf_number" id="sf_number"></div>
                            <div class="col-md-6"><label>Soil Type</label><input type="text" class="form-control" name="soil_type" id="soil_type"></div>
                            <div class="col-md-6"><label>Land Benefit</label><input type="text" class="form-control" name="land_to_benefit" id="land_to_benefit"></div>
                            <div class="col-md-6"><label>Field Inspection</label><input type="text" class="form-control" name="field_insp" id="field_insp"></div>
                            <div class="col-md-6"><label>Site Approved</label><input type="text" class="form-control" name="site_app" id="site_app"></div>
                            <div class="col-md-6"><label>Date of Inspection</label><input type="date" class="form-control" name="date_of_ins" id="date_of_ins"></div>
                            <div class="col-md-6"><label>Date of Approval</label><input type="date" class="form-control" name="date_of_app" id="date_of_app"></div>
                            <div class="col-md-6"><label>Type of Work</label><input type="text" class="form-control" name="type_of_work" id="type_of_work"></div>
                            <div class="col-md-6"><label>Area Benefited</label><input type="text" class="form-control" name="area_benefited" id="area_benefited"></div>
                            <div class="col-md-6"><label>Other Works</label><input type="text" class="form-control" name="any_other_works" id="any_other_works"></div>
                            <div class="col-md-6"><label>Pradan Contribution</label><input type="text" class="form-control" name="p_contribution" id="p_contribution"></div>
                            <div class="col-md-6"><label>Farmer Contribution</label><input type="text" class="form-control" name="f_contribution" id="f_contribution"></div>
                            <div class="col-md-6"><label>Total Estimate Amount</label><input type="text" class="form-control" name="total_est" id="total_est"></div>
                            <div class="col-md-6"><label>Area PF</label><input type="text" class="form-control" name="area_benefited_postfunding" id="area_benefited_postfunding"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Plantation Detail Modal -->
    <div class="modal fade" id="plantdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color:#134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Plantation Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Grouped Row Blocks -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Ownership:</strong> <span id="plant_ownership"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Well Irrigation:</strong> <span id="plant_well_irrigation"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Area Irrigated:</strong> <span id="plant_area_irrigated"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Irrigated Lands:</strong> <span id="plant_irrigated_lands"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Patta No:</strong> <span id="plant_patta"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Total Area:</strong> <span id="plant_total_area"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Revenue Village:</strong> <span id="plant_revenue"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Crop Season:</strong> <span id="plant_crop_season"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Livestock:</strong> <span id="plant_livestock"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Plantation Type:</strong> <span id="plant_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>SF No:</strong> <span id="plant_sf_no"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Soil Type:</strong> <span id="plant_soil_type"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Land to Benefit:</strong> <span id="plant_land_benefit"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Field Inspection:</strong> <span id="plant_field_inspection"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Site Approval:</strong> <span id="plant_site_approval"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date of Inspection:</strong> <span id="plant_date_of_inspection"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Date of Approval:</strong> <span id="plant_date_of_approval"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Type of Work:</strong> <span id="plant_type_of_work"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Area Benefit:</strong> <span id="plant_area_benefit"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Other Works:</strong> <span id="plant_other_works"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Pradan Contribution:</strong> <span id="plant_pradan_contribution"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Contribution:</strong> <span id="plant_farmer_contribution"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Total Amount:</strong> <span id="plant_total_amount"></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pond Detail Modal -->
    <div class="modal fade" id="ponddet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Pond Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Rows for Pond Details -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Land Owner:</strong> <span id="p_owner"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Patta No:</strong> <span id="p_patta"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Total Area:</strong> <span id="p_tarea"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Irrigated Lands:</strong> <span id="p_irrigated_lands"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Revenue:</strong> <span id="p_revenue"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Livestock:</strong> <span id="p_livestock"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Crop Season:</strong> <span id="p_crop_season"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Well Irrigation:</strong> <span id="p_well_irrigation"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>SF No:</strong> <span id="p_sf"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Soil Type:</strong> <span id="p_soil"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Land to Serve:</strong> <span id="p_land"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Field Inspection:</strong> <span id="p_field"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Site Approval:</strong> <span id="p_site"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Type of Work:</strong> <span id="p_type_of_work"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Date of Inspection:</strong> <span id="p_doi"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date of Approval:</strong> <span id="p_doa"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Length:</strong> <span id="p_len"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Depth:</strong> <span id="p_dep"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Breadth:</strong> <span id="p_breadth"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Volume:</strong> <span id="p_vol"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Pradan Contribution:</strong> <span id="p_pcont"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Contribution:</strong> <span id="p_fcont"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Total:</strong> <span id="total_est"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editable Pond Detail Modal - New Version -->
    <div class="modal fade" id="editponddet_modal_2" tabindex="-1" aria-labelledby="editPondLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <form id="pondEditForm2">
                @csrf

                <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                    <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #134E13;">
                        <h5 class="modal-title text-white" id="editPondLabel">Edit Pond Details</h5>
                        <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="p2_pond_id" name="pond_id">

                        <!-- Form Fields (All IDs prefixed with p2_) -->
                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Land Owner:</strong></label>
                                <input type="text" class="form-control" id="p2_owner" name="p_owner">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Patta No:</strong></label>
                                <input type="text" class="form-control" id="p2_patta" name="p_patta">
                            </div>
                        </div>

                        <!-- Repeat for remaining fields using p2_ prefix -->
                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Total Area:</strong></label>
                                <input type="text" class="form-control" id="p2_tarea" name="p_tarea">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Irrigated Lands:</strong></label>
                                <input type="text" class="form-control" id="p2_irrigated_lands" name="p_irrigated_lands">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Revenue:</strong></label>
                                <input type="text" class="form-control" id="p2_revenue" name="p_revenue">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Livestock:</strong></label>
                                <input type="text" class="form-control" id="p2_livestock" name="p_livestock">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Crop Season:</strong></label>
                                <input type="text" class="form-control" id="p2_crop_season" name="p_crop_season">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Well Irrigation:</strong></label>
                                <input type="text" class="form-control" id="p2_well_irrigation" name="p_well_irrigation">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>SF No:</strong></label>
                                <input type="text" class="form-control" id="p2_sf" name="p_sf">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Soil Type:</strong></label>
                                <input type="text" class="form-control" id="p2_soil" name="p_soil">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Land to Serve:</strong></label>
                                <input type="text" class="form-control" id="p2_land" name="p_land">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Field Inspection:</strong></label>
                                <input type="text" class="form-control" id="p2_field" name="p_field">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Site Approval:</strong></label>
                                <input type="text" class="form-control" id="p2_site" name="p_site">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Type of Work:</strong></label>
                                <input type="text" class="form-control" id="p2_type_of_work" name="p_type_of_work">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Date of Inspection:</strong></label>
                                <input type="date" class="form-control" id="p2_doi" name="p_doi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Date of Approval:</strong></label>
                                <input type="date" class="form-control" id="p2_doa" name="p_doa">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Length:</strong></label>
                                <input type="text" class="form-control" id="p2_len" name="p_len">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Depth:</strong></label>
                                <input type="text" class="form-control" id="p2_dep" name="p_dep">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Breadth:</strong></label>
                                <input type="text" class="form-control" id="p2_breadth" name="p_breadth">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Volume:</strong></label>
                                <input type="text" class="form-control" id="p2_vol" name="p_vol">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Pradan Contribution:</strong></label>
                                <input type="text" class="form-control" id="p2_pcont" name="p_pcont">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Farmer Contribution:</strong></label>
                                <input type="text" class="form-control" id="p2_fcont" name="p_fcont">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Total:</strong></label>
                                <input type="text" class="form-control" id="p2_total" name="total_est">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bank Detail Modal -->
    <div class="modal fade" id="bankdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="background-color: #134E13; border-bottom: 2px solid #dee2e6;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Bank Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Holder Name:</strong> <span id="b_hname"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Account Number:</strong> <span id="b_no"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Bank Name:</strong> <span id="b_name"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Branch:</strong> <span id="b_branch"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>IFSC Code:</strong> <span id="b_ifsc"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Detail Edit Modal -->
    <div class="modal fade" id="edit_bankdet_modal" tabindex="-1" aria-labelledby="bankDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="background-color: #134E13; border-bottom: 2px solid #dee2e6;">
                    <h5 class="modal-title text-white" id="bankDetailModalLabel">Edit Bank Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editbankDetailForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" id="edit_form_id" name="form_id">

                            <label for="edit_holder_name" class="form-label"><strong>Holder Name:</strong></label>
                            <input type="text" class="form-control" id="edit_holder_name" name="holder_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_account_number" class="form-label"><strong>Account Number:</strong></label>
                            <input type="text" class="form-control" id="edit_account_number" name="account_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_bank_name" class="form-label"><strong>Bank Name:</strong></label>
                            <input type="text" class="form-control" id="edit_bank_name" name="bank_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_branch" class="form-label"><strong>Branch:</strong></label>
                            <input type="text" class="form-control" id="edit_branch" name="branch" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_ifsc" class="form-label"><strong>IFSC Code:</strong></label>
                            <input type="text" class="form-control" id="edit_ifsc" name="ifsc_code" required>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Editable Plant Detail Modal -->
    <div class="modal fade" id="editplantdet_modal" tabindex="-1" aria-labelledby="editPlantLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <form id="plantEditForm">
                <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                    <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #3c763d;">
                        <h5 class="modal-title text-white" id="editPlantLabel">Edit Plantation Details</h5>
                        <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="pl_plant_id" name="plant_id">

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Ownership:</strong></label>
                                <input type="text" class="form-control" id="pl_ownership" name="pl_ownership">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Well Irrigation:</strong></label>
                                <input type="text" class="form-control" id="pl_well_irrigation" name="pl_well_irrigation">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Area Irrigated:</strong></label>
                                <input type="text" class="form-control" id="pl_area_irrigated" name="pl_area_irrigated">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Irrigated Lands:</strong></label>
                                <input type="text" class="form-control" id="pl_irrigated_lands" name="pl_irrigated_lands">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Patta No:</strong></label>
                                <input type="text" class="form-control" id="pl_patta" name="pl_patta">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Total Area:</strong></label>
                                <input type="text" class="form-control" id="pl_total_area" name="pl_total_area">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Revenue Village:</strong></label>
                                <input type="text" class="form-control" id="pl_revenue" name="pl_revenue">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Crop Season:</strong></label>
                                <input type="text" class="form-control" id="pl_crop_season" name="pl_crop_season">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Livestock:</strong></label>
                                <input type="text" class="form-control" id="pl_livestock" name="pl_livestock">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Plantation Type:</strong></label>
                                <input type="text" class="form-control" id="pl_type" name="pl_type">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>SF No:</strong></label>
                                <input type="text" class="form-control" id="pl_sf_no" name="pl_sf_no">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Soil Type:</strong></label>
                                <input type="text" class="form-control" id="pl_soil_type" name="pl_soil_type">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Land to Benefit:</strong></label>
                                <input type="text" class="form-control" id="pl_land_benefit" name="pl_land_benefit">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Field Inspection:</strong></label>
                                <input type="text" class="form-control" id="pl_field_inspection" name="pl_field_inspection">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Site Approval:</strong></label>
                                <input type="text" class="form-control" id="pl_site_approval" name="pl_site_approval">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Date of Inspection:</strong></label>
                                <input type="date" class="form-control" id="pl_date_of_inspection" name="pl_date_of_inspection">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Date of Approval:</strong></label>
                                <input type="date" class="form-control" id="pl_date_of_approval" name="pl_date_of_approval">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Type of Work:</strong></label>
                                <input type="text" class="form-control" id="pl_type_of_work" name="pl_type_of_work">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Area Benefit:</strong></label>
                                <input type="text" class="form-control" id="pl_area_benefit" name="pl_area_benefit">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Other Works:</strong></label>
                                <input type="text" class="form-control" id="pl_other_works" name="pl_other_works">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6 mb-3">
                                <label><strong>Pradan Contribution:</strong></label>
                                <input type="text" class="form-control" id="pl_pradan_contribution" name="pl_pradan_contribution">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Farmer Contribution:</strong></label>
                                <input type="text" class="form-control" id="pl_farmer_contribution" name="pl_farmer_contribution">
                            </div>
                        </div>

                        <div class="row border p-2 mb-3">
                            <div class="col-md-6">
                                <label><strong>Total Amount:</strong></label>
                                <input type="text" class="form-control" id="pl_total_amount" name="pl_total_amount">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Remarks Modal -->
    <div class="modal fade" id="rem_modal" tabindex="-1" aria-labelledby="remarksModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="remarksModalLabel">Request Change - Remarks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="remarks_form">
                    @csrf
                    <div class="modal-body">
                        <!-- Hidden input for form ID -->
                        <input type="hidden" id="rem_form_id" name="form_id">

                        <!-- Remarks input -->
                        <label for="remarks" class="form-label">Please specify what changes are required:</label>
                        <textarea class="form-control" name="remarks" id="remarks" rows="4"
                            placeholder="Enter detailed remarks..." required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit Remarks</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="view_rem_modal" tabindex="-1" aria-labelledby="remarksLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remarks from TL/Coordinator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="view_remark_text" class="text-dark"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Submitted Documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center" id="document-buttons">
                    <!-- Buttons will be added here dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- File Viewer Modal -->
    <div class="modal fade" id="fileViewerModal" tabindex="-1" aria-labelledby="fileViewerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Document Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <iframe id="docPreview" src="" width="80%" height="400px" style="border: none;"></iframe>
                    <br>
                    <a id="docDownload" class="btn btn-success mt-3" href="#" download target="_blank">Download</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Funding Land -->
    <div class="modal fade" id="pf_land_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="pf_land_form">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Post Funding Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" id="pf_land_id" name="pf_land_id">
                        <div class="mb-3">
                            <label for="area_land" class="form-label">Area Benefiited</label>
                            <input type="number" class="form-control" id="area_land" name="area_land" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="pf_pond_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="pf_pond_form">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Post Funding Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" id="pf_pond_id" name="pf_pond_id">

                        <div class="mb-3">
                            <label for="length" class="form-label">Length (m)</label>
                            <input type="number" step="any" class="form-control" id="length" name="length" required>
                        </div>

                        <div class="mb-3">
                            <label for="breadth" class="form-label">Breadth (m)</label>
                            <input type="number" step="any" class="form-control" id="breadth" name="breadth" required>
                        </div>

                        <div class="mb-3">
                            <label for="depth" class="form-label">Depth (m)</label>
                            <input type="number" step="any" class="form-control" id="depth" name="depth" required>
                        </div>

                        <div class="mb-3">
                            <label for="volume" class="form-label">Volume (m³)</label>
                            <input type="number" class="form-control" id="volume" name="volume" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="area_benefited" class="form-label">Area Benefited (sq.m)</label>
                            <input type="text" class="form-control" id="area_benefited" name="area_benefited" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="pf_plant_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="pf_plant_form">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Post Funding Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" id="pf_plant_id" name="pf_plant_id">

                        <div class="mb-3">
                            <label for="nos" class="form-label">No. of Plants</label>
                            <input type="number" class="form-control" id="nos" name="nos" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price per Plant</label>
                            <input type="number" step="any" class="form-control" id="price" name="price" required>
                        </div>

                        <div class="mb-3">
                            <label for="other_expenses" class="form-label">Other Expenses</label>
                            <input type="number" step="any" class="form-control" id="other_expenses" name="other_expenses" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_nos" class="form-label">Total Plants</label>
                            <input type="number" class="form-control" id="total_nos" name="total_nos" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Price</label>
                            <input type="number" step="any" class="form-control" id="total_price" name="total_price" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>

    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>



    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script> -->

</body>

</html>