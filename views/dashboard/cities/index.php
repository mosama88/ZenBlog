<?php
    require_once '../../../app/config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Osama News | المدن</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo URL . "public/dashboard/"; ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="<?php echo URL . "public/dashboard/"; ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet"
          href="<?php echo URL . "public/dashboard/"; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo URL . "public/dashboard/"; ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL . "public/dashboard/"; ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="<?php echo URL . "public/dashboard/"; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo URL . "public/dashboard/"; ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo URL . "public/dashboard/"; ?>plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="<?php echo URL . "public/dashboard/"; ?>dist/css/custom.css">
    
    <link rel="stylesheet"
          href="<?php echo URL . "public/dashboard/"; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    
    
    <!-- Navbar -->
    <?php include MAIN_PATH . 'views/dashboard/layouts/navbar.php' ?>
    <!-- /.navbar -->
    
    <!-- Main Sidebar Container -->
    <?php include MAIN_PATH . 'views/dashboard/layouts/sidebar.php' ?>
    
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">المدن</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo URL . "views/dashboard/index.php" ?>">لوحة
                                    التحكم</a></li>
                            <li class="breadcrumb-item active">جدول المدن</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        
        <!-- Main content -->
        
        
        <section class="content">
            <div class="row">
                <!-- </div>-->
                <div class="col-12">
                    
                    
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h5 class="">جدول المدن</h5>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal-primary">
                                        أضف مدينه جديده
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (isset($_SESSION['errors'])):
                                foreach ($_SESSION['errors'] as $errors):
                                    ?>
                                    
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errors; ?>
                                    </div>
                                <?php
                                endforeach;
                                unset($_SESSION['errors']);
                            endif; ?>
                            
                            <?php if (isset($_SESSION['success'])):
                                ?>
                                
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION['success']; ?>
                                </div>
                                <?php
                                unset($_SESSION['success']);
                            endif; ?>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>المسلسل</th>
                                    <th>أسم المدينه</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>
                                        <a type="button" href="<?php echo URL . "views/dashboard/cities/edit.php"; ?>"
                                           class="btn btn-small btn-info btn-sm text-white">تعديل</a>
                                        <a type="button" href="#"
                                           class="btn btn-small btn-danger btn-sm text-white">حذف</a>
                                    
                                    </td>
                                </tr>
                                </tbody>
                                
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        
        
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include MAIN_PATH . 'views/dashboard/layouts/footer.php' ?>
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!--Start Store Modal-->
<div class="modal fade" id="modal-primary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة مدينه جديدة</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card card-primary">
                            
                            
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="<?php echo URL . "handlers/cities/store-cities.php" ?>"
                                  role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputCategory">أسم المدينه</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               id="exampleInputCategory" placeholder="أدخل أسم المدينه">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                        
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-outline-primary">تأكيد البيانات</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            </form>
        
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--End Store Modal-->


<!-- jQuery -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script
        src="<?php echo URL . "public/dashboard/"; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?php echo URL . "public/dashboard/"; ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo URL . "public/dashboard/"; ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo URL . "public/dashboard/"; ?>dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo URL . "public/dashboard/"; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>


</body>

</html>