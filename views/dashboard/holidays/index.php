<?php
    require_once '../../../app/config.php';
    
    $conn = mysqli_connect(hostname, username, password, database);
    $sql = "SELECT * FROM holidays ORDER BY id DESC ";
    $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Osama News | الأجازات الرسمية</title>
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
                        <h1 class="m-0 text-dark">الأجازات الرسمية</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo URL . "views/dashboard/index.php" ?>">لوحة
                                    التحكم</a></li>
                            <li class="breadcrumb-item active">جدول الأجازات الرسمية</li>
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
                                    <h5 class="">جدول الأجازات الرسمية</h5>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal-primary">
                                        أضف الأجازه الرسمية جديده
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
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
                            
                            
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>المسلسل</th>
                                    <th>الأجازه الرسمية</th>
                                    <th>من</th>
                                    <th>الى</th>
                                    <th>عدد الأيام</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)):
                                        $i++
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['from'] ?></td>
                                            <td><?= $row['to'] ?></td>
                                            <td><?= $row['num_of_days'] ?></td>
                                            <td>
                                                <a type="button"
                                                   href="<?php echo URL . "views/dashboard/holidays/edit.php?id=" . $row['id']; ?>"
                                                   class="btn btn-small btn-info btn-sm text-white">تعديل</a>
                                                <a type="button" onclick="return confirm('هل انت متأكد من عملية الحذف')"
                                                   ;
                                                   href="<?php echo URL . "handlers/holidays/delete-holidays.php?id=" . $row['id']; ?>"
                                                   class="btn btn-small btn-danger btn-sm text-white">حذف</a>
                                            
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
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
                <h4 class="modal-title">أضافة الأجازه الرسمية جديدة</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card card-primary">
                            
                            
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="<?php echo URL . "handlers/holidays/store-holidays.php" ?>"
                                  role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputCategory">أسم الأجازه الرسمية</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               id="exampleInputCategory" placeholder="أدخل أسم الأجازه الرسمية">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputCategory">من يوم</label>
                                        <input type="date" name="from" id="from" class="form-control"
                                               id="exampleInputCategory"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputCategory">إلى يوم</label>
                                        <input type="date" name="to" id="to" class="form-control"
                                               id="exampleInputCategory"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputCategory">عدد الأيام</label>
                                        <input type="number" name="num_of_days" id="num_of_days" class="form-control"
                                               id="exampleInputCategory"/>
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

<script>
    $("#modal-primary").modal({
        backdrop: 'static',
        keyboard: false,
        show: false,
    });
</script>
<script>
    $(document).ready(function () {
        // تشغيل الحساب عند تغيير أحد المدخلات
        $("#from, #to").on("change", function () {
            let fromDate = moment($("#from").val());
            let toDate = moment($("#to").val());

            // التحقق من صحة كلا التاريخين
            if (fromDate.isValid() && toDate.isValid()) {
                let totalNumOfDays = toDate.diff(fromDate, 'days') + 1;
                $("#num_of_days").val(totalNumOfDays);
            } else {
                $("#num_of_days").val(""); // إفراغ الحقل إذا كانت التواريخ غير صالحة
            }
        });
    });
    // moment(): يحول قيمة التاريخ إلى كائن moment لسهولة الحساب.
    // diff(): تقوم بحساب الفرق بين toDate و fromDate بالأيام. إضافة +1 يضمن احتساب اليوم نفسه.
    //     التأكد من صحة التواريخ: باستخدام isValid() للتأكد من أن التواريخ مدخلة بشكل صحيح.
    // تشير 'days' إلى وحدة الفرق التي ترغب في حسابها. عند تمرير 'days' كمعامل، يقوم moment.js بحساب الفرق بين تاريخين بوحدة الأيام.
    // 1 + لحساب نفس اليوم
    //The line toDate.diff(fromDate, 'days') calculates the difference in days between two dates using the moment.js library. Let’s break it down in detail:
    //Unit Flexibility: By changing 'days' to 'months', 'years', etc., you can calculate the difference in various units (e.g., months or years).
</script>


</body>

</html>