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
  <title>Update Sub Category - Admin</title>
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
                  <h4 class="card-title">Update Sub Category</h4>
                  <form class="forms-sample" method="post" id="subcategory" enctype="multipart/form-data">
                    <?php
                    if(isset($_POST["btnsubmit"]))
                    {
                      if(empty($_FILES["subcatimage"]["name"]))
                      {
                        $newname=$_POST["oldimg"];
                      }
                      else
                      {
                        $ext=pathinfo($_FILES["subcatimage"]["name"],PATHINFO_EXTENSION);
                        $newname= time().rand(1111,9999).time().".".$ext;
                        move_uploaded_file($_FILES["subcatimage"]["tmp_name"],"uploads/subcategory/".$newname);
                      }
                      $id=my_simple_crypt($_GET["updateid"],'d');
                      $result=mysqli_query($conn,"update tbl_subcategory set cat_id=".$_POST["txtcatname"].",subcat_name='".$_POST["txtsubcatname"]."',subcat_description='".$_POST["txtsubcatdesc"]."',subcat_image='".$newname."' where subcat_id='".$id."'");

                      if($result==true)
                      {
                        echo "<script>window.location='viewsubCategory.php';</script>";
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
                      $result=mysqli_query($conn,"select * from tbl_subcategory where subcat_id='".$id."'");
                      while($item=mysqli_fetch_assoc($result))
                      {
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
                            <option <?php if($item["cat_id"]==$row["cat_id"]){?> selected <?php } ?> value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"];?></option>
                          <?php
                          }
                          ?>
                          
                         
                        </select>
                    </div>

                    <div class="form-group">
                       <label for="exampleInputEmail1">Sub Category Name</label>
                      <input type="text" value="<?php echo $item["subcat_name"];?>" name="txtsubcatname" class="form-control"  placeholder="Category Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category Discription</label>
                      <textarea cols="15" rows="7" value="" name="txtsubcatdesc" class="form-control"  placeholder="Category Discription"><?php echo $item["subcat_description"];?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category Image</label>
                      <input type="file"  name="subcatimage" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" value="<?php echo $item["subcat_image"]; ?>" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" value="<?php echo $row["subcat_image"]; ?>" name="oldimg">
                      </div>
                      <!-- <img src="uploads/category/<?php echo $item["subcat_image"]; ?>"> -->
                      </div>
                    <button type="button" onclick="window.location='viewsubCategory.php'"class="btn btn-light float-right">Cancel</button>
                    <button type="submit" name="btnsubmit"  class="btn btn-primary mr-2 float-right">Submit</button>
                    
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

    $('#subcategory').validate({

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
