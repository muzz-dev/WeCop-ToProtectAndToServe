<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'connection.php'; ?>
<?php include 'enc.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:37 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update State - Admin</title>
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
                  <h4 class="card-title">Add State</h4>
                  
                  <form class="forms-sample" method="post" id="StateForm">
                    <?php
                    if(isset($_POST["btnsubmit"]))
                    {
                      $id=my_simple_crypt($_GET["updateid"],'d');
                      $result=mysqli_query($conn,"update tbl_state  set state_name='".$_POST["txtstatename"]."',state_code='".$_POST["txtstatecode"]."' where state_id='".$id."'")or die(mysql_error($conn));
                      if($result==true)
                      {
                       echo "<script>window.location='viewState.php';</script>";
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
                    if(isset($_GET["updateid"]))
                    {
                      $id=my_simple_crypt($_GET["updateid"],'d');
                      if(!$id)
                      {
                        echo "<script>window.location='error.php';</script>";
                      }
                      // echo $id;
                      $result=mysqli_query($conn,"select * from tbl_state where state_id='".$id."'");
                      while($item=mysqli_fetch_assoc($result))
                      { 
                    ?>
                    <div class="form-group">
                      <label for="exampleInputUsername1">State Name</label>
                      <input type="text" class="form-control" value="<?php echo $item["state_name"]; ?>" name="txtstatename" id="" placeholder="State name">
                    </div>
                   <div class="form-group">
                      <label for="exampleInputUsername1">State Code</label>
                      <input type="text" class="form-control" value="<?php echo $item["state_code"]; ?>" name="txtstatecode" id="" placeholder="State code">
                    </div>
                    <hr>
                    <button class="btn btn-light float-right" type="button" onclick="window.location='viewState.php';">Cancel</button>
                  
                    <button type="submit" name="btnsubmit" class="btn btn-primary float-right mr-2">Submit</button>
                    </form>
                <?php
                  }
                }
                ?>
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
    $('#StateForm').validate({
      rules:
      {
        txtstatename:
        {
          required:true
        },
        txtstatecode:
        {
          required:true
        }
      },
      messages:
      {
        txtstatename:
        {
          required:"Please Enter State Name"
        },
        txtstatecode:
        {
          required:"Please Enter State Code"
        }
      }
    });
  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
