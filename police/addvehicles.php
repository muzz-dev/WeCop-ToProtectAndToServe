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

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Vehicles - Poilce Station</title>
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
                  <h4 class="card-title">Add Vehicles</h4>
                  <form class="forms-sample" method="post" id="AddVehicles" enctype="multipart/form-data">
                      <?php
                  if (isset($_POST['btnsubmit']))
                  {
                    $ext1=pathinfo($_FILES["vphoto1"]["name"],PATHINFO_EXTENSION);
                    $newname1=time().rand(1111,9999).time().".".$ext1;
                    move_uploaded_file($_FILES["vphoto1"]["tmp_name"],"uploads/vehicles/".$newname1);
                    $ext2=pathinfo($_FILES["vphoto2"]["name"],PATHINFO_EXTENSION);
                    $newname2=time().rand(1111,9999).time().".".$ext2;
                    move_uploaded_file($_FILES["vphoto2"]["tmp_name"],"uploads/vehicles/".$newname2);
                    $result = mysqli_query($conn,"insert into tbl_vehicles (policestation_id,vnumber,chassisnumber,vphoto1,vphoto2) values('".$_POST['txtpolicestationid']."','".$_POST['txtvnumber']."','".$_POST["txtcnumber"]."','".$newname1."','".$newname2."')");

                    if ($result==true) 
                    {
                      ?>
                      <div class="alert alert-success" role="alert">
                        Successfully Insert !!!
                      </div>
                      <?php
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

                  ?>
                    <div class="form-group">
                      <label for="exampleSelectGender">Police Station Name</label>
                        <select class="form-control" id="exampleSelectStateID" name="txtpolicestationid">
                          <option value="">--Select--</option>
                          <?php
                          $result=mysqli_query($conn,"select * from tbl_policestation");
                          while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                          <option value="<?php echo $row["policestation_id"]; ?>"><?php echo $row["policestation_name"]; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Vehicle Number</label>
                      <input type="text" class="form-control" id="" placeholder="Vehicle Number" name="txtvnumber">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Chassis Number</label>
                      <input type="text" class="form-control" id="" placeholder="Chassis Number" name="txtcnumber">
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Vehicle Image - 1</label>
                      <input type="file"  name="vphoto1" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                     </div>
                     <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Vehicle Image - 2</label>
                      <input type="file"  name="vphoto2" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                     </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="btnsubmit">Submit</button>
                    <button type="button" onclick="window.location='viewvehicles.php';" class="btn btn-light">Cancel</button>
                  </form>
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
  <!-- End custom js for this page-->
  <script>
    $('#AddVehicles').validate({
      rules:
      {
        txtpolicestationid:
        {
          required:true
        },
        txtvnumber:
        {
          required:true
        },
        txtcnumber:
        {
          required:true,
          maxlength:17,
          minlength:17
        }
      },
      messages:
      {
        txtpolicestationid:
        {
          required:"Please Select Police Station"
        },
        txtvnumber:
        {
          required:"Please Enter Vehicle Number"
        },
        txtcnumber:
        {
          required:"Please Enter Chassis Number"
        }
      }
    });

  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
