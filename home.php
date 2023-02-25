<?php
    include 'koneksi.php';
    session_start();
    if (isset($_SESSION['a_user'])) {
      $sqluser = "select username from admin where username='".$_SESSION['a_user']."'";
      $hasiluser = $conn->query($sqluser);
      if ($hasiluser->num_rows>=1) {
        # code...
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/avatars/kai.png" >
    <title>SIMAKER</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
    <?php
        include 'nav_side.php';
        include 'content.php';
    ?>
    <footer class="main-footer">
        <strong><marquee scrollamount="10">PT KERETA API INDONESIA (PERSERO) DAOP 5 PURWOKERTO</marquee></strong>
        
      </footer>
      <!--.wrapper -->
        <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- DataTables -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!--jquery-ui-->
    <script src="plugins/jQueryUI/jquery-ui.js"></script>
    <!--table2excell-->
    <script src="plugins/jquery.table2excel/jquery.table2excel.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script>
      $("#dataTable-1").DataTable({
        autoWidth: true,
        lengthMenu: [
          [10, 25, 50, -1],
          [10, 25, 50, "All"],
        ],
      });
    </script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
    <script>
      $( function() {
      $( "#tgl" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
      } );
    </script>
    <script>
      $( function() {
      $( "#tgl1" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
      } );
    </script>
    <script>
      $( function() {
      $( "#tgl2" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
      } );
    </script>
    <script>
      $(function() {
        $( "#no_katelat" ).autocomplete({
          source: 'search.php',
        });
    });
    </script>
        <script>
      $(function() {
        $( "#datang" ).autocomplete({
          source: 'search.php',
        });
    });
    </script>
  </body>
</html>
<?php
    }
    else{
      echo "<script>window.alert('Anda Harus Masuk Terlebih Dahulu');window.location=('login.php')</script>";
    }
  }
  else{
    echo "<script>window.alert('Anda Harus Masuk Terlebih Dahulu');window.location=('login.php')</script>";
  }
  ?>

  <?php $conn->close()?>