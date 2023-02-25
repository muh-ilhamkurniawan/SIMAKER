<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>SIMAKER</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form action="ceklogin.php" method="post" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center mb-3">
            <img src="assets/images/kai.svg" alt="">
          </a>
          <h1 class="h2">SIMAKER</h1>
          <h1 class="h6 mb-4">Sistem Informasi Manajemen Keterlambatan Kereta</h1>
          <h1 class="h6 mb-3">Masuk</h1>
          <div class="form-group">
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" name="username"class="form-control form-control-lg" placeholder="Username" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            <input type="password"  id="password" name="password" class="form-control form-control-lg" placeholder="Password" required="">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" onclick="myFunction()"> Tampilkan Password
                <script>
                  function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Masuk</button>
          <p class="mt-5 mb-3 text-muted">© 2023</p>
        </form>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
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
  </body>
</html>
</body>
</html>