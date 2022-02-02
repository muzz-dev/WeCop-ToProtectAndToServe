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
  <title>Update Tips - Admin</title>
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
            <div class="col-md-6 grid-margin stretch-card container center_div">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Tips</h4>
                  <form class="forms-sample" method="post" id="CityForm" enctype="multipart/form-data">
                     <?php
                  if (isset($_POST['btnupdate']))
                  {
                    $id=my_simple_crypt($_GET["updateid"],'d');
                    if(empty($_FILES["tphoto1"]["name"]))
                    {
                      $newname1=$_POST["oldname1"];
                    }
                    else
                    {
                      $ext1=pathinfo($_FILES["tphoto1"]["name"],PATHINFO_EXTENSION);
                      $newname1=time().rand(1111,9999).time().".".$ext1;
                      move_uploaded_file($_FILES["tphoto1"]["tmp_name"],"uploads/tips/".$newname1); 
                    }
                    
                    if(empty($_FILES["tphoto2"]["name"]))
                    {
                      $newname2=$_POST["oldname2"];
                    }
                    else
                    {
                      $ext2=pathinfo($_FILES["tphoto2"]["name"],PATHINFO_EXTENSION);
                      $newname2=time().rand(1111,9999).time().".".$ext2;
                      move_uploaded_file($_FILES["tphoto2"]["tmp_name"],"uploads/tips/".$newname2);
                    }
                    
                    if(empty($_FILES["tphoto3"]["name"]))
                    {
                      $newname3=$_POST["oldname3"];
                    }
                    else
                    {
                      $ext3=pathinfo($_FILES["tphoto3"]["name"],PATHINFO_EXTENSION);
                      $newname3=time().rand(1111,9999).time().".".$ext3;
                      move_uploaded_file($_FILES["tphoto3"]["tmp_name"],"uploads/tips/".$newname3);
                    }
                    
                    $result = mysqli_query($conn,"update tbl_tips set ttitle='".$_POST['txttitle']."',tdescription='".$_POST['txttdescription']."',timage1='".$newname1."',timage2='".$newname2."',timage3='".$newname3."',isdisplay='".$_POST['isdisplay']."' where tip_id='".$id."'") or die(mysqli_error($conn));

                    if ($result==true) 
                    {
                      echo "<script>window.location='viewtips.php';</script>";
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
                    // echo $id;
                    $result=mysqli_query($conn,"select * from tbl_tips where tip_id='".$id."'");
                    while($item=mysqli_fetch_assoc($result))
                    {


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
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tips Title</label>
                      <input type="text" class="form-control" id="" placeholder="Tips Title" name="txttitle" value="<?php echo $item['ttitle'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title Description </label>
                      <input type="text" class="form-control" id="" placeholder="Title Description" name="txttdescription" value="<?php echo $item["ttitle"];?>">
                    </div>
                    
                      <div class="form-group">
                      <label for="exampleInputEmail1">Title Image - 1</label>
                      <input type="file"  name="tphoto1" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" name="oldname1" value="<?php echo $item["timage1"];?>">
                      </div>
                            <a target="_blank" href="uploads/tips/<?php echo $item["timage1"]; ?>">
                              <img width="100px" height="100px" src="uploads/tips/<?php echo $item["timage1"]; ?>"/> </a>
                     </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Title Image - 2</label>
                      <input type="file"  name="tphoto2" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" name="oldname2" value="<?php echo $item["timage2"];?>">
                      </div>
                      <a target="_blank" href="uploads/tips/<?php echo $item["timage2"]; ?>">
                              <img width="100px" height="100px" src="uploads/tips/<?php echo $item["timage2"]; ?>"/></a>
                     </div>
                    
                    <div class="form-group ">
                      <label for="exampleInputEmail1">Title Image - 3</label>
                      <input type="file"  name="tphoto3" class="file-upload-default">
                      <div class="input-group">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" name="oldname3" value="<?php echo $item["timage3"];?>">
                      </div>
                      <a target="_blank" href="uploads/tips/<?php echo $item["timage3"]; ?>">
                              <img width="100px" height="100px" src="uploads/tips/<?php echo $item["timage3"]; ?>"/> </a>
                     </div>
                     
                     <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">IsDisplay</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input  <?php if($item["isdisplay"]=="Yes")  { ?>checked <?php } ?> type="radio" class="form-check-input" name="isdisplay" id="membershipRadios1" value="Yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isdisplay" id="membershipRadios2" value="No"  <?php if($item["isdisplay"]=="No")  { ?>checked <?php } ?>>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                    
                    <button type="button" onclick="window.location='viewtips.php';" class="btn btn-light float-right">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-2 float-right" name="btnupdate">Submit</button>
                    
                  </form>
                   <?php 
                 }
               } ?>
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
  <!-- <script>
    $('#CityForm').validate({
      rules:
      {
        txtstateid:
        {
          required:true
        },
        txtcityname:
        {
          required:true
        },
        txtcitycode:
        {
          required:true
        }
      },
      messages:
      {
        txtstateid:
        {
          required:"Please Select State"
        },
        txtcityname:
        {
          required:"Please Enter City Name"
        },
        txtcitycode:
        {
          required:"Please Enter City Code"
        }
      }
    });

  </script> -->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
