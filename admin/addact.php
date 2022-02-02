<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}

include 'demo.php';
?>
<?php include 'checksession.php'; ?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Act - Admin</title>
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
                  <h4 class="card-title">Add Act</h4>
                  
                      <?php
                  if (isset($_POST['btnsubmit']))
                  {
                    $result = mysqli_query($conn,"insert into tbl_act (subcat_id,act_number,act_title,actdescription,isactive)values('".$_POST['txtcatid']."','".$_POST['txtactnumber']."','".$_POST['txtacttitle']."','".$_POST['txtdesc']."','".$_POST["isactive"]."')");                  
                    if ($result==true) 
                    {

                      $res=mysqli_query($conn,"select * from tbl_user where token!=''");
                      echo mysqli_num_rows($res);
                      while($row=mysqli_fetch_assoc($res))
                      {
                        echo $row["token"];
                        sendnotification("New Act Added!",$_POST["txtacttitle"],$row["token"]);
                      }

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
                   <form class="forms-sample" method="post" id="AddAct" enctype="multipart/form-data">
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
                          $result=mysqli_query($conn,"select * from tbl_subcategory");
                            while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                          <option value="<?php echo $row["subcat_id"]; ?>"><?php echo $row["subcat_name"]; ?></option>
                          <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Act Number</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Act Number" name="txtactnumber" class="form-control" />
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Act Title</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Act Title" name="txtacttitle" class="form-control" />
                          </div>
                        </div>
                      </div>
                      
                   <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">IsActive</label>
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
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Act Description</label>
                          <div class="col-sm-9">
                             <textarea rows="7" name="txtdesc" cols="15" placeholder="Act Description" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>  
                    <hr>
                     <button type="button" onclick="window.location='viewact.php';" class="btn btn-light float-right">Cancel</button>
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
    $('#AddAct').validate({
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
