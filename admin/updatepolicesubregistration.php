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
<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:37 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Update Sub Police Registration- Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/icheck/skins/all.html">
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
     <?php include 'settingpanel.php'; ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'navbar.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Sub Police Registration</h4>
                  <form class="form-sample" method="post" id="subpoliceform" enctype="multipart/form-data">
                    <?php
                    if(isset($_POST["btnsubmit"]))
                    {
                      if(empty($FILES["policeprofile"]["name"]))
                      {
                        $newname=$_POST["oldimg"];
                      }
                      else
                      {
                      $ext = pathinfo($_FILES["policeprofile"]["name"],PATHINFO_EXTENSION);
                      $newname = time().rand(1111,9999).time().".".$ext;
                      move_uploaded_file($_FILES["policeprofile"]["tmp_name"],"uploads/policeprofile/".$newname);
                      }

                      $id=my_simple_crypt($_GET["updateid"],'d');
                      $result=mysqli_query($conn,"update tbl_policestation_subuser set policestation_id=".$_POST["txtpolicestationid"].",pname='".$_POST["txtname"]."',contact='".$_POST["txtcontact"]."',email='".$_POST["txtemail"]."',profilephoto='".$newname."',gender='".$_POST["gender"]."',username='".$_POST["txtusername"]."',password='".$_POST["txtpassword"]."',isblock='".$_POST["isactive"]."' where p_userid='".$id."'") or die(mysqli_error($conn));
                     if($result==true)
                      {
                       
                       echo "<script>window.location='viewsubPoliceRegistration.php';</script>"; 
                       
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
                      $result=mysqli_query($conn,"select * from tbl_policestation_subuser where p_userid='".$id."'");
                      while($item=mysqli_fetch_assoc($result))
                      {
                    ?>
                  	
                    <p class="card-description">
                     
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PoliceStation ID </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtpolicestationid">
                              <option value="">--Select--</option>
                              <?php
                            $result=mysqli_query($conn,"select * from tbl_policestation");
                            while($row=mysqli_fetch_assoc($result))
                            {
                              ?>
                              <option <?php if($item["policestation_id"]==$row["policestation_id"]) {?>selected <?php }?> value="<?php echo $row["policestation_id"]?>"><?php echo $row["policestation_name"]; ?></option>
                              <?php
                            }
                          ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"> Police Name</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["pname"];?>" placeholder="Police name"class="form-control" name="txtname"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["contact"];?>" placeholder="Contact number" class="form-control" name="txtcontact" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" value="<?php echo $item["email"];?>" placeholder="Email" class="form-control" name="txtemail"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Profile Photo</label>
                      <input type="file" name="policeprofile" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      <input type="hidden" value="<?php echo $item["profilephoto"]; ?>" name="oldimg">
                       <a target="_blank" href="uploads/policeprofile/<?php echo $item["profilephoto"]; ?>">
                              <img width="100px" height="100px" src="uploads/policeprofile/<?php echo $item["profilephoto"]; ?>"/></a>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="Male" checked>
                                Male
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="membershipRadios2" value="Female">
                                Female
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Name</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["username"];?>" placeholder="User Name"class="form-control" name="txtusername"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" value="<?php echo $item["password"];?>" placeholder="Password"class="form-control" name="txtpassword"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">IsBlock</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios1" value="Yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios2" value="No">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-light float-right" type="button" onclick="window.location='viewsubPoliceRegistration.php';">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-2 float-right" name="btnsubmit">Submit</button>
                  </form>

                <?php } } ?>

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
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/iCheck.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <?php include 'notificationscript.php';?>
  <!-- End custom js for this page-->

<script>

    $('#subpoliceform').validate({

      rules:
      {
        txtpolicestationid:
        {
          required:true
        },
        txtname:
        {
          required:true
        },
        txtcontact:
        {
          required:true
        },
        txtemail:
        {
           required:true,
           email:true
        },
        gender:
        {
          required:true
        },
        txtusername:
        {
          required:true
        },
        txtpassword:
        {
          required:true
        }
      },
      messages:
      {
        txtpolicestationid:
        {
          required:"Select PoliceStation"
        },
        txtname:
        {
          required:"Please Enter Police Station Name"
        },
        txtcontact:
        {
           required:"Please Enter Contact Number",
          number:"Please Enter Only Number",
          minlength:"Min 10 Numbers Allowed",
          maxlength:"Max 10 Numbers Allowed"
        },
        txtemail:
        {
           required:"Please Enter Email"
        },
        gender:
        {
          required:"Please Enter Gender"
        },
        txtusername:
        {
          required:"Please Enter username"
        },
        txtpassword:
        {
          required:"Please Enter Password"
        }
      }
    });
  </script>

</body> 


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
