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
              <h4 class="card-title">View Admin</h4>
              </div>
              <?php
              if($_SESSION["type"]=='admin')
              {
              ?>
                <div class="col-6">
                <button type="submit" name="btnstate" class="btn btn-primary mr-2 float-right" onclick="document.location.href='addadmin.php'">Add Admin</button>
              </div>
              <?php
              }
              ?>
             </div>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                     <?php
                    if(isset($_POST["deleteid"]))
                    {
                      $id=$_POST["deleteid"];
                      $result=mysqli_query($conn,"delete from tbl_admin_login where login_id='".$id."'");
                      //echo "<script>window.location='viewState.php';</script>";
                    }
                    ?>
                    <table id="order-listing" class="table">
                       <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <!-- <th>Password</th> -->
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Profile Photo</th>
                            <th>Email Id</th>
                            <th>User Type</th>
                            <th>IsBlock</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <?php
                      $count=1;
                      $result=mysqli_query($conn,"select * from tbl_admin_login");
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                      <tr>
                        <td><?php echo $count; $count++; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <!-- <td><?php echo $row["password"]; ?></td> -->
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["contact"]; ?></td>
                        <td>
                              <img src="uploads/admin/<?php echo $row["profilephoto"]; ?>" width="100" height="100" alt="">
                        </td>
                        <td><?php echo $row["emailid"]; ?></td>
                        <td><?php echo $row["usertype"]; ?></td>
                        <td><?php echo $row["isblock"]; ?></td>
                        <td>
                        <button type="button" onclick="showpopup(<?php echo $row["login_id"]; ?>);" class="btn btn-social-icon btn-outline-youtube"><i class="mdi mdi-delete"></i></button>
                        <button class="btn btn-social-icon btn-outline-facebook" onclick="document.location.href='updateadmin.php?updateid=<?php echo my_simple_crypt($row["login_id"],'e'); ?>'"><i class="mdi mdi-account-edit"></i></button>
                        </td>
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
  <?php include 'notificationscript.php';?>
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
