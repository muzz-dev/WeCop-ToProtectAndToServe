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
  <title>Add Sub Category - Admin</title>
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
                  <h4 class="card-title"> Add Sub Category</h4>
                  <form class="forms-sample" method="post" id="AddSubCategory" enctype="multipart/form-data">
                    <?php
                    if(isset($_POST["btnsubmit"]))
                    {
                      $ext=pathinfo($_FILES["subcatimage"]["name"],PATHINFO_EXTENSION);
                      $newname= time().rand(1111,9999).time().".".$ext;
                      move_uploaded_file($_FILES["subcatimage"]["tmp_name"],"uploads/subcategory/".$newname);
                      $result=mysqli_query($conn,"insert into tbl_subcategory(cat_id,subcat_name,subcat_description,subcat_image) values(".$_POST["txtcatname"].",'".$_POST["txtsubcatname"]."','".$_POST["txtsubcatdesc"]."','".$newname."')");
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
                      <label for="exampleSelectGender">Category Name</label>
                        <select class="form-control" name="txtcatname" name="">
                          <option value="">--Select--</option>
                          <?php
                          $result=mysqli_query($conn,"select * from tbl_category");
                          while($row=mysqli_fetch_assoc($result))
                          {
                            ?>
                            <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"];?></option>
                          <?php
                          }
                          ?>
                          
                         
                        </select>
                    </div>

                    <div class="form-group">
                       <label for="exampleInputEmail1">Sub Category Name</label>
                      <input type="text" name="txtsubcatname" class="form-control"  placeholder="Category Name" id="txtsubcatname">
                      <p class="error" id="duperror"></p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category Discription</label>
                      <textarea cols="15" rows="7" name="txtsubcatdesc" class="form-control"  placeholder="Category Discription"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category Image</label>
                      <input type="file"  name="subcatimage" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      </div>
                      <hr>
                      <button type="button" onclick="window.location='viewsubCategory.php'"class="btn btn-light float-right">Cancel</button>
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
  <?php include 'notificationscript.php';?>
  <!-- End custom js for this page-->
  <script>
    $('#txtsubcatname').blur(function() {
      //alert("sdf");
       $.ajax({
          url: "subcategoryvalidation.php",
          type: 'POST',
          data: {"subcategoryname":$(this).val()},
          success: function(result){
                     if(result=="yes")
                     {  
                      $("#btnsubmit").prop('disabled', true);
                      $("#duperror").html("SubCategory Already Exist!");
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
  </script>

<script>

    $('#AddSubCategory').validate({

      rules:
      {
        txtcatname:
        {
          required:true
        },
        txtsubcatname:
        {
          required:true
        },
        txtsubcatdesc:
        {
          required:true
        }
      },
      messages:
      {
        txtcatname:
        {
          required:"Please Select Category"
        },
        txtsubcatname:
        {
          required:"Please Enter Sub Category"
        },
        txtsubcatdesc:
        {
          required:"Please Enter Sub Category Description"
        }
      }
  });
</script>
</body>
</html>
