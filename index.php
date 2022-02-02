<?php
session_start();
if(isset($_SESSION["islogin"]))
{
  if($_SESSION["type"]=='police')
  {
    echo "<script>window.location='./police/dashboard.php';</script>";
  }
  else
  {
    echo "<script>window.location='./admin/dashboard.php';</script>";
  }
}
?>
<?php include './admin/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>WeCop - Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./admin/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./admin/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./admin/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/favicon.png" />
</head>

<body class="sidebar-mini">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <!-- <img  src="wecop.png" alt="logo"> -->
              </div>
              <?php
              if(isset($_POST["btnlogin"]))
              {
                $result=mysqli_query($conn,"select * from tbl_admin_login where username='".$_POST["txtusername"]."' and password='".$_POST["txtpassword"]."'");
                if (mysqli_num_rows($result)>0)
                {
                  while ($row=mysqli_fetch_assoc($result))
                  {
                    $_SESSION["name"]=$row["name"];
                    $_SESSION["id"]=$row["login_id"];
                    $_SESSION["profilephoto"]=$row["profilephoto"];
                    if($row["usertype"]=='SUPER')
                    {
                      $_SESSION["type"]="admin";
                    }
                    else{
                      $_SESSION["type"]="subadmin";
                    }
                  }
                  $_SESSION["islogin"]="yes";
                  echo "<script>window.location='./admin/dashboard.php';</script>";
                }
                else
                {
                    $result=mysqli_query($conn,"select * from tbl_policestation where username='".$_POST["txtusername"]."' and password='".$_POST["txtpassword"]."'");
                  if (mysqli_num_rows($result)>0)
                  {
                     while ($row=mysqli_fetch_assoc($result))
                    {
                      $_SESSION["name"]=$row["policestation_name"];
                      $_SESSION["id"]=$row["policestation_id"];
                      $_SESSION["profilephoto"]=$row["photo_url"];
                      $_SESSION["type"]="police";
                    }
                    $_SESSION["islogin"]="yes";
                    echo "<script>window.location='./police/dashboard.php';</script>";
                  }
                  else
                  {
                     $result=mysqli_query($conn,"select * from tbl_policestation_subuser where username='".$_POST["txtusername"]."' and password='".$_POST["txtpassword"]."'");
                    if (mysqli_num_rows($result)>0)
                    {
                       while ($row=mysqli_fetch_assoc($result))
                        {
                          $_SESSION["name"]=$row["pname"];
                          $_SESSION["id"]=$row["p_userid"];
                          $_SESSION["profilephoto"]=$row["profilephoto"];
                          $_SESSION["type"]="subpolice";
                        }
                        $_SESSION["islogin"]="yes";
                        echo "<script>window.location='./police/dashboard.php';</script>";
                    }
                    else
                    {
                      ?>
                        <div class="alert alert-danger" role="alert">
                        Invalid Username or Password !!!
                        </div>
                      <?php
                    }
                  }
                }
              }
              ?>
              <form class="pt-3" method="post" autocomplete="off">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="txtusername" class="form-control form-control-lg border-left-0" id="" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="txtpassword" class="form-control form-control-lg border-left-0" id="" placeholder="Password">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <!-- <input type="checkbox" class="form-check-input"> -->
                      <!-- Keep me signed in -->
                    </label>
                  </div>
                  <a href="admin/forgotpassword.php" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="btnlogin" href="">LOGIN</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <img src="wecop.png" alt="Logo">            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./admin/js/vendor.bundle.base.js"></script>
  <script src="./admin/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./admin/js/off-canvas.js"></script>
  <script src="./admin/js/hoverable-collapse.js"></script>
  <script src="./admin/js/template.js"></script>
  <script src="./admin/js/settings.js"></script>
  <script src="./admin/js/todolist.js"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
</html>

