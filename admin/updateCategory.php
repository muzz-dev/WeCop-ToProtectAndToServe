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
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Category - Admin</title>
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

                  <form class="forms-sample" id="UpdateCategory" method="post" enctype="multipart/form-data">
                    <?php
                    if(isset($_POST["btnsubmit"]))
                    {
                      if(empty($FILES["categoryimage"]["name"]))
                      {
                        $newname=$_POST["oldimg"];
                      }
                      else
                      {
                      $ext=pathinfo($_FILES["categoryimage"]["name"],PATHINFO_EXTENSION);
                      $newname=time().rand(1111,9999).time().".".$ext;
                      move_uploaded_file($_FILES["categoryimage"]["tmp_name"],"uploads/categoryimage/".$newname);
                      }


                      $id=my_simple_crypt($_GET["updateid"],'d');
                      $result=mysqli_query($conn,"update tbl_category set cat_name='".$_POST["txtcategoryname"]."',cat_type='".$_POST["txtcategorytype"]."',cat_description='".$_POST["txtcategorydiscription"]."',cat_image='".$newname."' where cat_id='".$id."'");
                      if($result==true)
                      {
                       
                       echo "<script>window.location='viewCategory.php';</script>"; 
                       
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
                      $result=mysqli_query($conn,"select * from tbl_category where cat_id='".$id."'") or die(mysqli_error($conn));
                      while($item=mysqli_fetch_assoc($result))
                      {
                    ?>

                    <div class="form-group">
                       <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" value="<?php echo $item["cat_name"];?>" name="txtcategoryname" class="form-control"  placeholder="Category Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectcityid">Category Type</label>
                        <select class="form-control" name="txtcategorytype" id="txtcategorytype">
                          <option value="">--Select--</option>
                          <option <?php if($item["cat_type"]=="Act") { ?> selected <?php } ?> value="Act">Act</option>
                          <option <?php if($item["cat_type"]=="Crime") { ?> selected <?php } ?> value="Crime">Crime</option>
                          <option <?php if($item["cat_type"]=="Tips") { ?> selected <?php } ?> value="Tips">Tips</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Discription</label>
                      <textarea  name="txtcategorydiscription" rows="7" cols="15" id="txtcatdesc" class="form-control"  placeholder="Category Discription"><?php echo $item["cat_description"];?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Image</label>
                      <input type="file"  name="categoryimage" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" value="<?php echo $item["cat_image"]; ?>" name="oldimg">
                      </div>
                      </div>
                      <hr>
                      <button type="button" onclick="document.location.href='viewCategory.php'"class="btn btn-light float-right">Cancel</button>
                    <button type="submit" name="btnsubmit" class="btn btn-primary mr-2 float-right">Submit</button>
                    
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

    $('#UpdateCategory').validate({

      rules:
      {
        txtcategoryname:
        {
          required:true
        },
        txtcategorytype:
        {
          required:true
        },
        txtcategorydiscription:
        {
          required:true
        }
      },
      messages:
      {
        txtcategoryname:
        {
         required:"Please Enter Category Name"        
        },
        txtcategorytype:
        {
          required:"Please Select Category Type"
        },
        txtcategorydiscription:
        {
          required:"Please Enter Category Description"
        }
      }
  });
</script>
</body>
</html>
