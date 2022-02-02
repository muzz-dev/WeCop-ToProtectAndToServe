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
  <title>View Admin - Admin</title>
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
              <h4 class="card-title">FIR Assign</h4>
              </div>
             </div>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                     <?php
                     if(isset($_GET["policeid"]))
                     {
                         $policeid=$_GET["policeid"];
                         $result=mysqli_query($conn,"update tbl_fir set p_userid='".$policeid."',status='In Process' where fir_id='".$_GET["firid"]."'");
                         //insret into log
                         echo "<script>window.location='viewFIR.php';</script>";
                
                     }
                    ?>
                    <table id="order-listing" class="table">
                       <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Email Id</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <?php
                      $count=1;
                      $result=mysqli_query($conn,"select * from tbl_policestation_subuser where policestation_id='".$_SESSION["id"]."' and isblock='No'");
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                      <tr>
                        <td><?php echo $count; $count++; ?></td>
                        <td><?php echo $row["pname"]; ?></td>
                        <td><?php echo $row["gender"]; ?></td>
                        <td><?php echo $row["contact"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                        <button type="submit" name="btnassign" class="btn btn-success" onclick="window.location='?policeid=<?php echo $row["p_userid"]; ?>&firid=<?php echo $_GET["firid"]; ?>'">Assign
                        </button>
                      </tr>
                      <?php
                      }
                      ?>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <form method="post" action="viewadmin.php" id="form1">
          <input type="hidden"  name="deleteid" id="deleteid"/>
        </form>
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
  <script>
        function showpopup(nid)
        {
          $('#deleteid').val(nid);

          swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3f51b5',
              cancelButtonColor: '#ff4081',
              confirmButtonText: 'Great ',
              buttons: {
                cancel: {
                  text: "Cancel",
                  value: null,
                  visible: true,
                  className: "btn btn-danger",
                  closeModal: true,
                },
                confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "btn btn-primary",
                  closeModal: true
                }
              }
            }).then(function(isConfirm) {
              if(isConfirm==true)
              {
                $("#form1").submit();
              }
            });
        }
  </script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:51 GMT -->
</html>
