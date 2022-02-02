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
  <title>Update Emergency Number- Admin</title>
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
                  <h4 class="card-title">Update Emergency Number</h4>
                  <form class="form-sample" id="" enctype="multipart/form-data" method="post">
                    <?php
                      if(isset($_POST["btnsubmit"]))
                      {
                        $id=my_simple_crypt($_GET["updateid"],'d');
                        $result=mysqli_query($conn,"update tbl_em_number set em_title='".$_POST["txtetitle"]."',em_number='".$_POST["txtenumber"]."',isactive='".$_POST["isactive"]."' where em_id='".$id."'") or die (mysqli_error($conn));
                      
                        if($result==true)
                        {
                          echo "<script>window.location='viewemergencynumber.php';</script>";
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
                      $result=mysqli_query($conn,"select * from tbl_em_number where em_id='".$id."'");
                      while($item=mysqli_fetch_assoc($result))
                      { 
                    ?>
                    <p class="card-description">
                     
                    </p>
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Title</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["em_title"];?>" placeholder="Emergency Title"class="form-control" name="txtetitle"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Emergency Number</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["em_number"];?>" placeholder="Emergency Number" name="txtenumber" class="form-control" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">IsActive</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios1" value="Yes" <?php if($item["isactive"]=="Yes") { ?> checked <?php } ?>>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios2" value="No" <?php if($item["isactive"]=="No") { ?> checked <?php } ?>>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <hr>
                      <button class="btn btn-light float-right" type="button" onclick="window.location='viewemergencynumber.php';">Cancel</button>
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
  <?php include 'notificationscript.php';?>
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