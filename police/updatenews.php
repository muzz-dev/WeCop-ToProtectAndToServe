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
  <title>Update News - Police Station</title>
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
                  <h4 class="card-title">Update News</h4>
                   <?php
                  if (isset($_POST['btnupdate']))
                  {

                    $id=my_simple_crypt($_GET["updateid"],'d');
                    if(empty($_FILES["newsphoto"]["name"]))
                    {
                      $newname=$_POST["oldname"];
                    }
                    else
                    {
                      $ext = pathinfo($_FILES["newsphoto"]["name"],PATHINFO_EXTENSION);
                      $newname = time().rand(1111,9999).time().".".$ext;
                      move_uploaded_file($_FILES["newsphoto"]["tmp_name"],"uploads/news/".$newname);
                    }
                    $result = mysqli_query($conn,"update tbl_news set title='".$_POST['txttitle']."',newsdescription='".$_POST['txtnewsdicription']."',newsimage='".$newname."',isactive='".$_POST["isactive"]."' where news_id='".$id."'")or die(mysqli_error($conn));

                    if ($result==true) 
                    {
                      echo "<script>window.location='viewnews.php';</script>";
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
                    $result=mysqli_query($conn,"select * from tbl_news where news_id='".$id."'");
                    while($item=mysqli_fetch_assoc($result))
                    {

                  ?>
                   
                  <form class="forms-sample" method="post" id="newsform" enctype="multipart/form-data">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="" placeholder="Title" name="txttitle" value="<?php echo $item["title"];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">News Description</label>
                      <input type="text" class="form-control" id="" placeholder="News Description" name="txtnewsdicription" value="<?php echo $item["newsdescription"];?>">
                    </div>

                   
                      <div class="form-group">
                      <label class=" col-form-label">News Image</label>
                      <input type="file" name="newsphoto" class="file-upload-default">
                      <div class="input-group ">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" name="" type="button">Upload</button>
                        </span>
                        <input type="hidden" name="oldname" value="<?php echo $item["newsimage"]; ?>">
                      </div>
                      <a target="_blank" href="uploads/news/<?php echo $item["newsimage"]; ?>">
                              <img width="100px" height="100px" src="uploads/news/<?php echo $item["newsimage"]; ?>"/></a>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">start Date</label>
                      <input type="date" class="form-control" id=""  name="dtstart">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">start Time</label>
                      <input type="time" class="form-control" id=""  name="tmstart">
                    </div>

                     <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">IsActive</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input <?php if($item["isactive"]=="Yes")  { ?>checked <?php } ?> type="radio" class="form-check-input" name="isactive" id="membershipRadios1" value="Yes" >
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios2" value="No"  <?php if($item["isactive"]=="No")  { ?>checked <?php } ?>>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                    
                    <hr>
                    
                     <button type="button" onclick="window.location='viewnews.php';" class="btn btn-light float-right">Cancel</button>
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
  <!-- End custom js for this page-->
  <script>
    $('#newsform').validate({
      rules:
      {
        txttitle:
        {
          required:true
        },
        txtnewsdicription:
        {
          required:true
        }
       /* dtstart:
        {
          required:true
        },
        tmstart:
        {
          required:true
        },
        txtnewsdatetime:
        {
          required:true
        }*/
      },
      messages:
      {
        txttitle:
        {
          required:"Enter Title"
        },
        txtnewsdicription:
        {
          required:"Enter News Discription"
        }
       /* dtstart:
        {
          required:"Select Date"
        },
        tmstart:
        {
          required:"Select Time"
        },
        txtnewsdatetime:
        {
          required:"Select Date Time"
        }*/

      }
    });

  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
