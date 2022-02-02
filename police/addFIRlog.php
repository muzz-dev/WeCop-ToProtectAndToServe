<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add FIR Log - Poilce Station</title>
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
                  <h4 class="card-title">Add FIR Log</h4>

                  <form class="forms-sample" id="AddFIRLog" method="post">
                    <?php
                   if(isset($_POST["btnsubmit"]))
                   {
                     $result=mysqli_query($conn,"insert into fir_log(fir_id,status,remark) values(".$_POST["txtfirid"].",'".$_POST["txtstatus"]."','".$_POST["txtremark"]."')");
                     if($result==true)
                      {
                        ?>
                        <div class="alert alert-success" role="alert">
                          Record is successfully Inserted.....
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
                    ?>
                    <div class="form-group">
                      <label for="exampleSelectGender">FIR</label>
                        <select class="form-control" id="" name="txtfirid">
                          <option value="">--Select--</option>
                          <?php
                          if($_SESSION["type"]=='police')
                          {
                            $result=mysqli_query($conn,"select * from tbl_fir where policestation_id='".$_SESSION["id"]."'");
                          }
                          elseif($_SESSION["type"]=='subpolice')
                          {
                            $result=mysqli_query($conn,"select * from tbl_fir where p_userid='".$_SESSION["id"]."'");
                          }
                          while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                          <option value="<?php echo $row["fir_id"]; ?>"><?php echo $row["cname"]; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Status</label>
                        <select class="form-control" id="" name="txtstatus">
                          <option value="">--Select--</option>
                          <option value="In Process">In Process</option>
                          <option value="Completed">Completed</option>
                         
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Remarks</label>
                      <textarea placeholder="Remarks" rows="7" cols="50" name="txtremark" class="form-control"></textarea>
                      
                    </div>
                   
                    <button type="submit" name="btnsubmit" class="btn btn-primary mr-2">Submit</button>
                    <button type="button" onclick="window.location='viewFIRlog.php'"class="btn btn-light">Cancel</button>
                  </form>
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
  <!-- End custom js for this page-->

<script>

  $('#AddFIRLog').validate({

      rules:
      {
        txtfirid:
        {
          required:true
        },
        txtstatus:
        {
          required:true
        },
        txtremark:
        {
          required:true
        }
      },
      messages:
      {
        txtfirid:
        {
          required:"Please Select FIR"
        },
        txtstatus:
        {
          required:"Please Select Status"
        },
        txtremark:
        {
          required:"Please Enter Remarks"
        }
      }
  });
</script>-
</body>
</html>
