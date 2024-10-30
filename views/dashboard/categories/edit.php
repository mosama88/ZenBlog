<?php
    require_once '../../../app/config.php';
    
    
    if (isset($_GET['id'])) {
        $conn = mysqli_connect(hostname, username, password, database);
        if (!$conn) {
            $_SESSION['errors'] = "connect error " . mysqli_connect_error($conn);
        }
        
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM `categories`  WHERE `id` = '$id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            $_SESSION['errors'] = "data not exists !";
            header("location:../views/dashboard/categories/index.php");
            die;
        }
    }
    



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Osama News | تعديل الفئة</title>
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
                        <h1 class="m-0 text-dark">تعديل الفئة</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                        href="<?php echo URL . "views/dashboard/categories/index.php" ?>">جدول
                                    الفئات</a></li>
                            <li class="breadcrumb-item active"> تعديل الفئة</li>
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
                    <?php
                        if (!empty($_SESSION['errors']) && isset($_SESSION['errors'])):
                            foreach ($_SESSION['errors'] as $error):
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            
                            <?php
                            endforeach;
                            unset($_SESSION['errors']);
                        endif;
                    ?>
                    <?php if (!empty($_SESSION['success']) && isset($_SESSION['success'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_SESSION['success']; ?>
                        </div>
                        <?php
                        
                        unset($_SESSION['success']);
                    endif;
                    ?>
                    
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h5 class=""> تعديل الفئة</h5>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                            
                            <form method="POST"
                                  action="<?php echo URL . 'handlers/categories/edit-categories.php?id=' . $_GET['id']; ?>"
                                  role="form">
                                
                                
                                <div class="form-group col-6 mb-3">
                                    <label for="exampleInputCategory">أسم الفئة</label>
                                        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"
                                               class="form-control" placeholder="أدخل أسم الفئة">
                                      
                                
                                
                                </div>
                                <div class="row text-center">
                                    <div class=" col-12">
                                        <button type="submit" class="btn btn-outline-primary">تعديل البيانات</button>
                                    </div>
                                </div>
                        </div>
                    
                    </div>
                </div>
                </form>
            
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

</body>

</html>