<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'demo.php'; ?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add News - Admin</title>
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
                  <h4 class="card-title">Add News</h4>
                   <?php
                  if (isset($_POST['btnsubmit']))
                  {

                     $ext = pathinfo($_FILES["newsphoto"]["name"],PATHINFO_EXTENSION);
                      $newname = time().rand(1111,9999).time().".".$ext;
                      move_uploaded_file($_FILES["newsphoto"]["tmp_name"],"uploads/policestation/".$newname);

                      $startdate = date('Y-m-d',strtotime($_POST["dtstart"]));
                      $enddate = date('Y-m-d',strtotime($_POST["dtend"]));

                    $result = mysqli_query($conn,"insert into tbl_news (title,newsdescription,newsimage,startdate,enddate,isactive) values('".$_POST['txttitle']."','".$_POST['txtnewsdicription']."','".$newname."','".$startdate."','".$enddate."','".$_POST["isactive"]."')")or die(mysqli_error($conn));

                    if ($result==true) 
                    {
                      $res=mysqli_query($conn,"select * from tbl_user where token!=''");
                          while($row=mysqli_fetch_assoc($res))
                          {
                            // echo $row["token"];
                            sendnotification("Breaking News!",$_POST["txttitle"],$row["token"]);
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
                   
                 <form class="forms-sample" method="post" id="AddNews" enctype="multipart/form-data">

                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-9">
                             <input type="text" class="form-control" id="" placeholder="Title" name="txttitle">
                          </div>
                        </div>
                      </div>
                  
                        <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">News Image</label>
                      <input type="file" name="newsphoto" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Date</label>
                          <div class="col-sm-9">
                             <input type="date" class="form-control" id=""  name="dtstart">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Date</label>
                          <div class="col-sm-9">
                             <input type="Date" class="form-control" id=""  name="dtend">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">News Description</label>
                          <div class="col-sm-9">
                             <textarea rows="7" name="txtnewsdicription" cols="15" placeholder="News Description" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">IsActive</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios1" value="Yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios2" value="No">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    
                     <button type="button" onclick="window.location='viewnews.php';" class="btn btn-light float-right">Cancel</button>
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
    $('#AddNews').validate({
      rules:
      {
        txttitle:
        {
          required:true
        },
        txtnewsdicription:
        {
          required:true
        },
        dtstart:
        {
          required:true
        },
        dtend:
        {
          required:true
        },
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
        },
        dtstart:
        {
          required:"Select Start Date"
        },
        dtend:
        {
          required:"Select End Date"
        },

      }
    });

  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
