<?php
include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include'enc.php'; ?>

<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Change Password</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
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
                <img src="" alt="">
              </div>

              <?php
                  if(isset($_POST["btnchangepassword"]))
                  {
                    $id=my_simple_crypt($_GET["id"],'d');
                      $res=mysqli_query($conn,"update tbl_admin_login set password='".$_POST["txtconfirmpassword"]."' where login_id='".$id."'");
                      if($res)
                      {
                        echo "<script>window.location='../index.php';</script>";
                      }
                      else
                      {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          Error!! Please check again....
                        </div>
                        <?php
                      }
                  }

               ?>
              <form class="pt-3" method="post" id="changepassword">
                <div class="form-group">
                  <label for="exampleInputEmail">New Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="txtchangepassword" class="form-control form-control-lg border-left-0" id="txtchangepassword" placeholder="New Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Confirm Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="txtconfirmpassword" class="form-control form-control-lg border-left-0" id="txtconfirmpassword" placeholder="Confirm Password">
                  </div>
                </div>
                
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="btnchangepassword" href="">Change Password</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <img src="../wecop.png" alt="Logo">            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script>
    $("#changepassword").validate({
      rules: {
        
          txtconfirmpassword:
          {
              equalTo: "#txtchangepassword"
          }
      },
      messages: {
          txtconfirmpassword:
          {
              equalTo:"Enter Confirm Password Same as Password"
          }
      }
    });
  </script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
</html>

