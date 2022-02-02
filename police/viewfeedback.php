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


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:50 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title>Feedback - Poilce Station</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
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
      <?php include 'settingpanel.php'; ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'navbar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
             <div class="row">
              <div class="col-6">
              <h4 class="card-title">View Feedbacks</h4>
              </div>
              <div class="col-6">
                <!-- <button type="submit" name="btnstate" class="btn btn-primary mr-2 float-right" onclick="document.location.href='addfeedback.php'">Add Feedback</button> -->
              </div>
             </div>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                       <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Feedback Text</th>
                            <th>Feedback Date_Time</th> 
                            
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $count=1;
                          $result=mysqli_query($conn,"select * from tbl_feedback") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>
                      <tr>
                        <td><?php echo $count;$count++; ?></td>
                        <td><?php echo $row["fname"]; ?></td>
                        
                        <td><?php echo $row["femail"]; ?></td>
                        <td><?php echo $row["feedback_text"]; ?></td>
                        <td><?php echo $row["feed_datetime"]; ?></td>
                      </tr>
                      <?php
                      }
                      ?>                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include'footer.php';?>
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
  <script src="js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:51 GMT -->
</html>
