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
  <title>Update Wanted Person - Admin</title>
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
                  <h4 class="card-title">Update Wanted Person</h4>
                  <form class="forms-sample" method="post" id="CityForm" enctype="multipart/form-data">
                      <?php
                      if (isset($_POST['btnsubmit']))
                      {
                        $id=my_simple_crypt($_GET["updateid"],'d');
                        if(empty($_FILES["wimage"]["name"]))
                        {
                          $newname=$_POST["oldname"];
                        }
                        else
                        {
                           $ext=pathinfo($_FILES["wimage"]["name"],PATHINFO_EXTENSION);
                           $newname=time().rand(1111,9999).time().".".$ext;
                           move_uploaded_file($_FILES["wimage"]["tmp_name"],"uploads/wantedperson/".$newname);
                        }

                        $result = mysqli_query($conn,"update tbl_wanted set wname='".$_POST['txtwname']."',wphoto='".$newname."',isactive='".$_POST["isactive"]."',about='".$_POST["txtabout"]."' where wid='".$id."'");


                        if ($result==true) 
                        {
                          echo "<script>window.location='viewwantedperson.php';</script>";
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
                        $result1=mysqli_query($conn,"select * from tbl_wanted where wid='".$id."'");
                        while($item=mysqli_fetch_assoc($result1))
                        {
                    ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Wanted Person Name</label>
                      <input type="text" class="form-control" id="" value="<?php echo $item["wname"]; ?>" placeholder="Wanted Person Name" name="txtwname">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Wanted Person Image</label>
                      <input type="file"  name="wimage" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" value="<?php echo $item["wphoto"]; ?>" name="oldname">
                      </div>
                    </div>
                    
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Is Active</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios1" value="Yes" <?php if($item["isactive"]=="Yes")  { ?>checked <?php } ?> >
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios2" value="No" <?php if($item["isactive"]=="No")  { ?>checked <?php } ?>>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">About</label>
                          <div class="col-sm-10">
                            <textarea rows="7" name="txtabout" cols="15" placeholder="About Wanted Person" class="form-control"><?php echo $item["about"]; ?></textarea>
                          </div>
                        </div>
                    <button type="submit" class="btn btn-primary mr-2" name="btnsubmit">Submit</button>
                    <button type="button" onclick="window.location='viewwantedperson.php';" class="btn btn-light">Cancel</button>
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
  <!-- <script>
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

  </script> -->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
