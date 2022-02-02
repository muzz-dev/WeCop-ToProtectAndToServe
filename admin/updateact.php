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
  <title>Update Act - Admin</title>
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
                  <h4 class="card-title">Update Act</h4>
                  
                      <?php
                  if (isset($_POST['btnsubmit']))
                  {
                  	$id=my_simple_crypt($_GET["updateid"],'d');
                    $result = mysqli_query($conn,"update tbl_act set cat_id='".$_POST['txtcatid']."',act_number='".$_POST['txtactnumber']."',act_title='".$_POST['txtacttitle']."',actdescription='".$_POST['txtdesc']."',isactive='".$_POST["isactive"]."' where act_id='".$id."'");                  
                    if ($result==true) 
                    {
                      echo "<script>window.location='viewact.php';</script>";
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
                    $result=mysqli_query($conn,"select * from tbl_act where act_id='".$id."'") or die(mysqli_error($conn));
                    while($item=mysqli_fetch_assoc($result))
                    {
                  ?>
                     <form class="forms-sample" method="post" id="UpdateAct" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category Type</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtcatid" id="txtcatid">
                              <option value="">----Select----</option>
                              <!--  <option value="">Pending</option>
                               <option value="">In Process</option>
                               <option value="">Complete</option> -->
                          <?php
                          $result=mysqli_query($conn,"select * from tbl_category");
                             while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                          <option <?php if($item["cat_id"]==$row["cat_id"]){ ?> selected <?php } ?> value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_type"]; ?></option>
                          <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Act Number</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Act Number" name="txtactnumber" class="form-control" value="<?php echo $item["act_number"] ?>" />
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Act Title</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Act Title" name="txtacttitle" class="form-control" value="<?php echo $item["act_title"] ?>" />
                          </div>
                        </div>
                      </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">IsActive</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios1" value="Yes"<?php if($item["isactive"]=="Yes") { ?> checked <?php } ?>>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                               <input type="radio" class="form-check-input" name="isactive" id="membershipRadios2" value="No" <?php if($item["isactive"]=="No") { ?> checked <?php } ?> >
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Act Description</label>
                          <div class="col-sm-9">
                             <textarea rows="7" name="txtdesc" cols="15" placeholder="Act Description" class="form-control"><?php echo $item["actdescription"]; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                      <hr>
                      <button type="button" onclick="window.location='viewact.php';" class="btn btn-light float-right">Cancel</button>
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
   $('#UpdateAct').validate({
      rules:
      {
        txtcatid:
        {
          required:true
        },
        txtactnumber:
        {
          required:true
        },
        txtacttitle:
        {
          required:true
        },
        txtdesc:
        {
          required:true
        }
      },
      messages:
      {
        txtcatid:
        {
          required:"Please Select Category"
        },
        txtactnumber:
        {
          required:"Please Enter Act Number"
        },
        txtacttitle:
        {
          required:"Please Enter Act Title"
        },
        txtdesc:
        {
          required:"Please Enter Description"
        }
      }
    });

  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
