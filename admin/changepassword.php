<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:37 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Change Password - Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/icheck/skins/all.html">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/favicon.png" />
</head>

<body class="sidebar-mini">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include "header.php";
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php include'settingpanel.php'; ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include "navbar.php";
      ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card container center_div">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Change Password</h4>

                  <?php
                  if(isset($_POST["btnsubmit"]))
                  {
                    $result=mysqli_query($conn,"select * from tbl_admin_login where login_id='".$_SESSION["id"]."' and password='".$_POST["txtopassword"]."'");
                    if(mysqli_num_rows($result)<=0)
                    {
                      ?>
                        <div class="alert alert-danger" role="alert">
                          Password Do not match ....
                        </div>
                        <?php
                    }
                    else
                    {
                      $sql=mysqli_query($conn,"update tbl_admin_login set password='".$_POST["txtnpassword"]."' where login_id='".$_SESSION["id"]."'");
                      if($sql)
                      {
                        ?>
                        <div class="alert alert-success" role="alert">
                          Password Successfully Change.....
                        </div>
                        <?php
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
                  }
                  ?>
                  
                  <form class="forms-sample" method="post" id="changepassword">
                   
                    <div class="form-group">
                      <label for="exampleInputUsername1">Old Password </label>
                      <input type="password" class="form-control" name="txtopassword" id="txtopassword" placeholder="Old Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">New Password </label>
                      <input type="password" class="form-control" name="txtnpassword" id="txtnpassword" placeholder="New Password">
                    </div>
                   <div class="form-group">
                      <label for="exampleInputUsername1">Confirm Password </label>
                      <input type="Password" class="form-control" name="txtcpassword" id="txtcpassword" placeholder="Confirm Password">
                    </div>
                    
                    <button type="submit" name="btnsubmit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       <?php include "footer.php";
       ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/vendor.bundle.addons.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/iCheck.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <?php include 'notificationscript.php';?>
  <!-- End custom js for this page-->
  <script>
     $("#changepassword").validate({
      rules: {
        
          txtcpassword:
          {
              equalTo: "#txtnpassword"
          }
      },
      messages: {
          txtcpassword:
          {
              equalTo:"Enter Confirm Password Same as Password"
          }
      }
    });
  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
