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

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update City - Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/flag-icon.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/simple-line-icons.css">
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
    <?php include 'header.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php include'settingpanel.php'; ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'navbar.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card container center_div">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add City</h4>
                  <form class="forms-sample" method="post" id="CityForm">
                  <?php
                  if (isset($_POST['btnsubmit']))
                  {
                    $id=my_simple_crypt($_GET["updateid"],'d');
                    $result = mysqli_query($conn,"update tbl_city set city_name='".$_POST["txtcityname"]."',city_code='".$_POST["txtcitycode"]."',state_id='".$_POST["txtstateid"]."' where city_id='".$id."'");

                    if ($result==true) 
                    {
                      echo "<script>window.location='viewCity.php'</script>";
                    }
                    else
                    {
                      ?>
                      <div class="alert alert-danger" role="alert">
                        ERROR !!!
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
                    $result=mysqli_query($conn,"select * from tbl_city where city_id='".$id."'");
                    while($item=mysqli_fetch_assoc($result))
                    {
                      
                  ?>
                    <div class="form-group">
                      <label for="exampleSelectGender">State Name</label>
                        <select class="form-control" id="exampleSelectStateID" name="txtstateid">
                          <option value="">--Select--</option>
                          <?php
                          $result=mysqli_query($conn,"select * from tbl_state");
                          while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                          <option <?php if($item["state_id"]==$row["state_id"]) { ?> selected <?php } ?> value="<?php echo $row["state_id"]; ?>"><?php echo $row["state_name"]; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">City Name</label>
                      <input type="text" class="form-control" value="<?php echo $item["city_name"]; ?>" placeholder="City Name" name="txtcityname">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">City Code</label>
                      <input type="text" class="form-control" id="" value="<?php echo $item["city_code"]; ?>" placeholder="City Code" name="txtcitycode">
                    </div>
                    <hr>
                    <button type="button" onclick="window.location='viewCity.php';" class="btn btn-light float-right">Cancel</button>
                    <button type="submit" class="btn btn-primary float-right mr-2"  name="btnsubmit">Update</button>
                    
                  </form>
                <?php }} ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include 'footer.php'; ?>
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
    $('#CityForm').validate({
      rules:
      {
        txtstateid:
        {
          required:true
        },
        txtcityname:
        {
          required:true
        },
        txtcitycode:
        {
          required:true
        }
      },
      messages:
      {
        txtstateid:
        {
          required:"Please Select State"
        },
        txtcityname:
        {
          required:"Please Enter City Name"
        },
        txtcitycode:
        {
          required:"Please Enter City Code"
        }
      }
    });

  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
