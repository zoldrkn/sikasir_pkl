<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/') }}image/logo/LOGO PT. PEK apk.png" type="image/svg">
    <title> @yield('title') </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Admin LTE CSS Theme Style-->
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
    <!-- Daterangepicker plugin -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Datetables -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- JavaScript diletakkan di header untuk dapat menggunakan jquery validation -->
    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('/') }}plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('/') }}plugins/jquery-validation/additional-methods.min.js"></script>

    <!-- CSS Custom untuk required dengan tanda * -->
    <style>
        .required:after {
            content: " *";
            color: #ff0000;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!--Nama Pengguna dan Modal-->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">
                        <span class="d-none d-md-inline font-weight-bold mr-2"></i>User</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="" class="btn btn-default">
                                <i class="fas fa-user-gear"></i>
                                My Profile
                            </a>
                            <a href="/logout" class="btn btn-danger float-right">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>               
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="" class="brand-link border-bottom-0 text-white"
                style="background-color: #05427A;">
                <img src="{{ asset('/') }}image/logo/LOGO PT. PEK apk.png" alt="Logo"
                    class="brand-image img-circle">
                <span class="brand-text font-weight-semibold"><b>SIKASIR</b></span>
            </a>

            <div class="sidebar">
                <hr>
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">Dashboard</li>
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">
                                <i class="nav-icon fas fa-grip"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('/coba') }}" class="nav-link">
                                <i class="nav-icon fas fa-grip"></i>
                                <p>Coba CRUD</p>
                            </a>
                        </li> --}}
                        <li class="nav-header">Setoran</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-money-bill"></i>
                                <p>
                                    Setoran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/setoran_penjualan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setoran Penjualan/Bln</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/setoran_bank') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setoran Bank </p>
                                    </a>
                                </li>
                            
                            </ul>
                        </li>
                        <li class="nav-header">Kas Kecil</li>
                        <li class="nav-item">
                            <a href="{{ url('/saldo') }}" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>Saldo Kas Kecil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/kaskecil') }}" class="nav-link">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p>Transaksi Kas Kecil</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('/kasmasuk') }}" class="nav-link">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p>Kas Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/kaskeluar') }}" class="nav-link">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p>Kas Keluar</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('/jurnal') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Jurnal Umum</p>
                            </a>
                        </li>
                      
                        
                        <li class="nav-header">Sistem</li>
                        <li class="nav-item">
                            <a href="{{ url('/karyawan') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>Data Karyawan</p>
                            </a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ url('/user') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>User</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a data-toggle="" href="/logout" class="nav-link text-red">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="m-0 text-uppercase font-weight-bold"></h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

      @yield('content')

    </div>
    <footer class="main-footer text-sm bg-dark">
        &copy; 2024 PKL TI POLITALA
        <div class="float-right d-none d-sm-inline">
            SIKASIL v1.0.0(alpha)
        </div>
    </footer>
    </div>
    <!-- End Div Wrapper -->
    
    
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('/') }}plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('/') }}plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('/') }}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- InputMask -->
    <script src="{{ asset('/') }}plugins/moment/moment.min.js"></script>
    <script src="{{ asset('/') }}plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- Jquery Mask -->
    <script src="{{ asset('/') }}plugins/jquery-mask/jquery.mask.min.js"></script>
    <!-- date range picker -->
    <script src="{{ asset('/') }}plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('/') }}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- datatables -->
    <script src="{{ asset('/') }}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('/') }}plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- select2 -->
    <script src="{{ asset('/') }}plugins/select2/js/select2.full.min.js"></script>

    <!-- Plugin Jquery validation -->
    <script src="{{ asset('/') }}plugins/jquery-validation/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
    var table = $('#example1').DataTable({
        "lengthChange": true,
        "autoWidth": true,
        "initComplete": function(settings, json) {
            $("#example1").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
        },
        "buttons": [{
            extend: 'colvis',
            className: 'btn bg-primary btn-outline-light',
            title: 'Col',
            text: null,
            exportOptions: {
                columns: ':visible'
            }
        }, {
            extend: 'excel',
            className: 'btn bg-primary btn-outline-light',
            text: '<i class="fa fa-file-excel"></i>',
            exportOptions: {
                columns: ':visible'
            }
        }, {
            extend: 'print',
            className: 'btn bg-primary btn-outline-light',
            text: '<i class="fa fa-print"></i>',
            exportOptions: {
                columns: ':visible'
            }
        }],
        "columnDefs": [{
            visible: false
        }]
    }).buttons().container().appendTo('#menuDataTable');
});
</script>

<!-- Script untuk ACTIVE Menu sidebar dinamis -->
<script>
$(function() {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function() {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({
            'display': 'block'
        })
        .addClass('menu-open').prev('a')
        .addClass('active');
});
</script>

<!-- Script untuk SELECT2 -->
<script>
$(document).ready(function() {
    $("#nim").select2({
        theme: 'bootstrap4'
    });
    $("#id_pengguna").select2({
        theme: 'bootstrap4'
    });
});

function edit_nim(id) {
    $("#nim" + id).select2({
        theme: 'bootstrap4'
    });
}

function edit_id(id) {
    $("#id_pengguna" + id).select2({
        theme: 'bootstrap4'
    });
}
</script>

<!-- Script untuk bsCustom File Input -->
<!-- Style Form input -->
<script>
$(function() {
    bsCustomFileInput.init();
});
</script>

<script type="text/javascript">
// input tanggal menggunakan plugin inputmask dan datetimepicker
$(document).ready(function() {
    // Mask tanggal
    $('.tgl').mask('00-00-0000', {
        placeholder: "dd-mm-yyyy"
    });

    //Date picker
    $('.tgl_picker').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: false
    });
})
$(document).ready(function() {
    // //Datemask dd/mm/yyyy
    // $('#datemask').inputmask('dd/mm/yyyy', {
    //     'placeholder': 'dd/mm/yyyy'
    // })
    // $('[data-mask]').inputmask()
})
// datepicker untuk tahun
$(document).ready(function() {
    $('.yearmask').mask('0000');
    $('.year').datetimepicker({
        viewMode: 'years',
        format: 'YYYY',
        useCurrent: false
    });
    $('.yearmask2').mask('0000');
    $('.year2').datetimepicker({
        viewMode: 'years',
        format: 'YYYY',
        useCurrent: false
    });
})

// input menggunakan plugin mask untuk IPK
$(document).ready(function() {
    // Format IPK.
    $('.ipk').mask('0.00');
})
// input menggunakan plugin mask untuk uang
$(document).ready(function() {
    // Format mata uang.
    $('.uang').mask('000.000.000', {
        reverse: true
    });
    /* unmask ketika from di submit untuk menyimpan
    data ke dalam database dengan tipe data integer */
    $("form").submit(function() {
        $('.uang').unmask();
    });
})
</script>
</body>

</html>