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
  <title>Add Tips - Admin</title>
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
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Tips</h4>
                  <form class="forms-sample" method="post" id="AddTips" enctype="multipart/form-data">
                     <?php
                  if (isset($_POST['btnsubmit']))
                  {
                    $ext1=pathinfo($_FILES["tphoto1"]["name"],PATHINFO_EXTENSION);
                    $newname1=time().rand(1111,9999).time().".".$ext1;
                    move_uploaded_file($_FILES["tphoto1"]["tmp_name"],"uploads/tips/".$newname1);
                    
                    $ext2=pathinfo($_FILES["tphoto2"]["name"],PATHINFO_EXTENSION);
                    $newname2=time().rand(1111,9999).time().".".$ext2;
                    move_uploaded_file($_FILES["tphoto2"]["tmp_name"],"uploads/tips/".$newname2);

                    $ext3=pathinfo($_FILES["tphoto3"]["name"],PATHINFO_EXTENSION);
                    $newname3=time().rand(1111,9999).time().".".$ext3;
                    move_uploaded_file($_FILES["tphoto3"]["tmp_name"],"uploads/tips/".$newname3);
                    
                    $result = mysqli_query($conn,"insert into tbl_tips(ttitle,tdescription,timage1,timage2,timage3,isdisplay) values('".$_POST['txttitle']."','".$_POST['txttdescription']."','".$newname1."','".$newname2."','".$newname3."','".$_POST['isdisplay']."')") or die(mysqli_error($conn));

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
                  <!--  <div class="form-group">
                      <label for="exampleSelectGender">Category Name</label>
                        <select class="form-control" id="exampleSelectStateID" name="txtpolicestationid">
                          <option value="">--Select--</option>
                          <?php
                          $result=mysqli_query($conn,"select * from tbl_category");
                          while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                          <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>
                          <?php } ?>
                        </select>
                    </div>--->
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Title" name="txttitle" class="form-control" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Title Description</label>
                          <div class="col-sm-9">
                             <textarea rows="7" name="txttdescription" cols="15" placeholder="Title" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                  
                        <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Title Image - 1</label>
                      <input type="file" name="tphoto1" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Title Image - 2</label>
                      <input type="file" name="tphoto2" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      </div>
                      </div>

                       <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Title Image - 3</label>
                      <input type="file" name="tphoto3" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      </div>
                      </div>
               

                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">IsDisplay</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isdisplay" id="membershipRadios1" value="Yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isdisplay" id="membershipRadios2" value="No">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      
                       <hr>
                    
                    <button type="button" onclick="window.location='viewtips.php';" class="btn btn-light float-right">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-2 float-right" name="btnsubmit">Submit</button>
                    
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
  <?php include 'notificationscript.php';?>
  <!-- End custom js for this page-->
  <script>
    $('#AddTips').validate({
      rules:
      {
        txttitle:
        {
          required:true
        },
        txttdescription:
        {
          required:true
        }
      },
      messages:
      {
        txttitle:
        {
          required:"Please Enter Tips Title"
        },
        txttdescription:
        {
          required:"Please Enter Tips Description"
        }
      }
    });

  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
