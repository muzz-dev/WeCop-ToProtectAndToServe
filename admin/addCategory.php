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
  <title>Add Category - Admin</title>
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
                  <h4 class="card-title"> Add Category</h4>

                  <form class="forms-sample" id="AddCategory" method="post" enctype="multipart/form-data">
                    <?php
                    if(isset($_POST["btnsubmit"]))
                    {
                      $ext=pathinfo($_FILES["catimage"]["name"],PATHINFO_EXTENSION);
                      $newname= time().rand(1111,9999).time().".".$ext;
                      move_uploaded_file($_FILES["catimage"]["tmp_name"],"uploads/category/".$newname);
                      $result=mysqli_query($conn,"insert into tbl_category(cat_name,cat_type,cat_description,cat_image) values('".$_POST["txtcatname"]."','".$_POST["txtcategorytype"]."','".$_POST["txtcatdesc"]."','".$newname."')")or die(mysqli_error($conn));

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
                       <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" name="txtcatname" class="form-control" id="txtcatname" placeholder="Category Name">
                      <p class="error" id="duperror"></p>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectcityid">Category Type</label>
                        <select class="form-control" id="" name="txtcategorytype">
                          <option value="">--Select--</option>
                          <option value="Act">Act</option>
                          <option value="Crime">Crime</option>
                          <option value="Tips">Tips</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Description</label>
                      <textarea col="15" rows="7" name="txtcatdesc" class="form-control"  placeholder="Category Discription"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Image</label>
                      <input type="file"  name="catimage" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      </div>
                      <hr>
                      <button type="button" onclick="window.location='viewCategory.php'"class="btn btn-light float-right">Cancel</button>
                      <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary mr-2 float-right">Submit</button>
                    
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
  <?php include 'notificationscript.php';?>
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
  $('#txtcatname').blur(function() {
      //alert("sdf");
       $.ajax({
          url: "categoryvalidation.php",
          type: 'POST',
          data: {"categoryname":$(this).val()},
          success: function(result){
                     if(result=="yes")
                     {  
                      $("#btnsubmit").prop('disabled', true);
                      $("#duperror").html("Category Already Exist!");
                        //alert("Already Exist");
                     }
                     else
                     {
                      $("#btnsubmit").prop('disabled', false);
                      $("#duperror").html("");
                     }
                   }
          });
    });
    $('#AddCategory').validate({

      rules:
      {
        txtcatname:
        {
          required:true
        },
        txtcategorytype:
        {
          required:true
        },
        txtcatdesc:
        {
          required:true
        }
      },
      messages:
      {
        txtcatname:
        {
         required:"Please Enter Category Name"        
        },
        txtcategorytype:
        {
          required:"Please Select Category Type"
        },
        txtcatdesc:
        {
          required:"Please Enter Category Description"
        }
      }
  });
</script>-
</body>
</html>
