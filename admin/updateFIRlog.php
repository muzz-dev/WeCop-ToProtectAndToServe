<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'connection.php';?>
<?php include 'enc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update FIR Log - Admin</title>
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
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body class="sidebar-mini">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include 'header.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php include 'settingpanel.php';?>
     <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'navbar.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card container center_div">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update FIR Log</h4>

                  <form class="forms-sample" method="post">
                    <?php
                   if(isset($_POST["btnsubmit"]))
                   {
                     $id=my_simple_crypt($_GET["updateid"],'d');

                     $result=mysqli_query($conn,"update fir_log set fir_id=".$_POST["txtfirid"].",status='".$_POST["txtstatus"]."',remark='".$_POST["txtremark"]."' where log_id='".$id."'") or die (mysqli_error($conn));
                     if($result==true)
                      {
                        echo "<script>window.location='viewFIRlog.php';</script>";
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
                    $result=mysqli_query($conn,"select * from fir_log where log_id='".$id."'");
                    while($item=mysqli_fetch_assoc($result))
                    {
                    ?>
                    <div class="form-group">
                      <label for="exampleSelectGender">FIR</label>
                        <select class="form-control" id="" name="txtfirid">
                          <option value="">--Select--</option>
                          <?php
                          $result=mysqli_query($conn,"select * from tbl_fir");
                          while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                          <option <?php if($item["fir_id"]==$row["fir_id"]){?> selected <?php } ?> value="<?php echo $row["fir_id"]; ?>"><?php echo $row["cname"]; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Status</label>
                        <select class="form-control" id="" name="txtstatus">
                          <option value="">--Select--</option>
                          <option  <?php if($item["status"]=="Pending") { ?> selected <?php } ?> value="Pending">Pending</option>
                          <option <?php if($item["status"]=="In Process") { ?> selected <?php } ?> value="In Process">In Process</option>
                          <option <?php if($item["status"]=="Completed") { ?> selected <?php } ?> value="Completed">Completed</option>
                         
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Remarks</label>
                      <textarea placeholder="Remarks" rows="7" cols="50" name="txtremark" class="form-control"><?php echo $item["remark"];?></textarea>
                      
                    </div>
                   
                    <button type="submit" name="btnsubmit" class="btn btn-primary mr-2">Submit</button>
                    <button type="button" onclick="window.location='viewFIRlog.php'"class="btn btn-light">Cancel</button>
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
        </form>
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
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <?php include 'notificationscript.php';?>
  <!-- End custom js for this page-->

<!---<script>

    $('#cityform').validate({

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
          required:"Select the State Name"
        },
        txtcityname:
        {
          required:"Enter City Name"
        },
        
       txtcitycode:
        {
          required:"Enter City Code"
        } 
      }
  });
</script>--->
</body>
</html>
