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
  <title>Update Admin - Poilce Station</title>
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
                  <h4 class="card-title">Update Admin</h4>
                  <form class="form-sample" id="policeform" enctype="multipart/form-data" method="post">
                    <?php
                      if(isset($_POST["btnsubmit"]))
                      {
                        if(empty($_FILES["photo"]["name"]))
                        {
                          $newname1=$_POST["oldname"];
                        }
                        else
                        {
                          $ext = pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
                          $newname1 = time().rand(1111,9999).time().".".$ext;
                          move_uploaded_file($_FILES["photo"]["tmp_name"],"uploads/admin/".$newname1);
                        }
                        $id=my_simple_crypt($_GET["updateid"],'d');
                        $result=mysqli_query($conn,"update tbl_admin_login set username='".$_POST["txtuname"]."',password='".$_POST["txtpassword"]."',name='".$_POST["txtname"]."',contact='".$_POST["txtcontact"]."',profilephoto='".$newname1."',emailid='".$_POST["txtemailid"]."',isblock='".$_POST["isblock"]."' where login_id='".$id."'") or die (mysqli_error($conn));
                      
                        if($result==true)
                        {
                          echo "<script>window.location='viewadmin.php';</script>";
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
                        $result=mysqli_query($conn,"select * from tbl_admin_login where login_id='".$id."'")or die (mysqli_error($conn));
                        while($item=mysqli_fetch_assoc($result))
                        {
                    ?>
                    <p class="card-description">
                     
                    </p>
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Name</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="User Name" class="form-control" name="txtuname" value="<?php echo $item["username"]; ?>" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" placeholder="Password"class="form-control" name="txtpassword" value="<?php echo $item["password"]; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Name" class="form-control" name="txtname" value="<?php echo $item["name"]; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Contact Number"class="form-control" name="txtcontact" value="<?php echo $item["contact"]; ?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Profile Photo</label>
                      <input type="file" name="photo" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" value="<?php echo $item["profilephoto"]; ?>">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" name="" type="button">Upload</button>
                        </span>
                        <input type="hidden" name="oldname" value="<?php echo $item["profilephoto"]; ?>">
                      </div>
                    </div>
                    </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" placeholder="Email" class="form-control" name="txtemailid" value="<?php echo $item["emailid"]; ?>"/>
                          </div>
                        </div>
                      </div>

                      <!-- <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Type </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtutype">
                              <option value="">----Select----</option>
                              <option value="Super">SUPER</option>
                              <option value="SubAdmin">SUB ADMIN</option>
                            </select>
                          </div>
                        </div>
                      </div> -->

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">IsBlock</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isblock" id="membershipRadios1" value="Yes" <?php if($item["isblock"]=="Yes") { ?> checked <?php } ?>>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isblock" id="membershipRadios2" value="No" <?php if($item["isblock"]=="No") { ?> checked <?php } ?>>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <hr>
                      <button class="btn btn-light float-right" type="button"onclick="window.location='viewadmin.php';">Cancel</button>
                      <button type="submit" class="btn btn-primary mr-2 float-right" name="btnsubmit">Submit</button>
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
  <!-- End custom js for this page-->

<!-- <script>
    $('#policeform').validate({

      rules:
      {
        txtpolicestation:
        {
          required:true
        },
        txtzoneid:
        {
          required:true
        },
        txtpincode:
        {
           required:true,
           number:true,
           minlength:6,
           maxlength:6
        },
        txtemailid:
        {
          required:true,
          email:true,
        },
        txtaddress:
        {
          required:true
        },
        txtlandmark:
        {
          required:true
        },
        // txtlatitude:
        // {
        //   required:true
        // },
        // txtlongitude:
        // {
        //   required:true
        // },
        txtcontactnumber:
        {
          required:true,
          number:true,
          minlength:10,
          maxlength:10
        },
        txtusername:
        {
          required:true
        },
        txtpassword:
        {
          required:true
        },
        txtname:
        {
          required:true
        },
        txtcontact:
        {
          required:true,
          number:true,
          minlength:10,
          maxlength:10
        },
        txtemail:
        {
          required:true,
          email:true
        }
      },
      messages:
      {
        txtpolicestation:
        {
          required:"Please Enter Police Station Name"
        },
        txtzoneid:
        {
          required:"Please Select Zone Name"
        },
        txtpincode:
        {
           required:"Please Enter Pincode",
           number:"Please Enter Only Numbers",
           minlength:"Min 6 Numbers Allowed",
           maxlength:"Max 6 Numbers Allowed"
        },
        txtaddressline1:
        {
          required:"Please Enter AddressLine1"
        },
        txtlandmark:
        {
          required:"Please Enter LandMark"
        },
        // txtlatitude:
        // {
        //   required:"Please Enter Latitude"
        // },
        // txtlongitude:
        // {
        //   required:"Please Enter Longitude"
        // },
        txtcontactnumber:
        {
          required:"Please Enter Contact Number",
          number:"Please Enter Only Number",
          minlength:"Min 10 Numbers Allowed",
          maxlength:"Max 10 Numbers Allowed"
        },
        txtusername:
        {
          required:"Please Enter Username"
        },
        txtpassword:
        {
          required:"Please Enter Password"
        },
        txtname:
        {
          required:"Please Enter Name"
        },
        txtcontact:
        {
          required:"Please Enter Contact Number",
          number:"Please Enter Only Number",
          minlength:"Min 10 Numbers Allowed",
          maxlength:"Max 10 Numbers Allowed"
        },
        txtemailid:
        {
          required:"Please Enter EMail",
          email:"Enter Proper Email"
        }
      }
    });
  </script> -->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
