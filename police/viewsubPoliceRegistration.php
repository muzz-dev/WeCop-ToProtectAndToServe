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


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:50 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Police Sub Users - Poilce Station</title>
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
  <link rel="shotrcut icon" href="../../../../images/favicon.png" />
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
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-sm">
                  <h4 class="card-title">Police Station User Details</h4>
                </div>
                <div class="col-sm">
                  <button type="submit" name="btnAddState" class="btn btn-primary mr-2 float-right" onclick="document.location.href='subpoliceRegistration.php';">Add Sub Police Station</button>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <?php
                    if (isset($_POST["deleteid"])) {
                      $id=$_POST["deleteid"];
                      //echo $id;
                      $result=mysqli_query($conn,"delete from tbl_policestation_subuser where p_userid='".$id."'");
                    }


                    ?>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Police Station</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>IsBlock</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $count=1;
                          $result=mysqli_query($conn,"select s.*,p.policestation_name from tbl_policestation_subuser as s left join tbl_policestation as p on s.policestation_id=p.policestation_id where s.policestation_id='".$_SESSION["id"]."'") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>


                        <tr>
                            <td><?php echo $count; $count++; ?></td>
                            <td><?php echo $row["policestation_name"]; ?></td>
                            <td><?php echo $row["pname"]; ?></td>
                            <td>
                              <a target="_blank" href="uploads/policeprofile/<?php echo $row["profilephoto"]; ?>">
                              <img width="100px" height="100px" src="uploads/policeprofile/<?php echo $row["profilephoto"]; ?>"/>
                            </td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["contact"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["isblock"]; ?></td>
                            <td>
                              <button class="btn btn-social-icon btn-outline-youtube" onclick="showpopup(<?php echo $row["p_userid"]; ?>);"><i class="mdi mdi-delete"></i></button>
                              <button class="btn btn-social-icon btn-outline-facebook" onclick="window.location='updatepolicesubregistration.php?updateid=<?php echo my_simple_crypt($row["p_userid"],'e'); ?>'"><i class="mdi mdi-account-edit"></i></button>
                            </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form action="viewsubPoliceRegistration.php" method="post" id="form1">
          <input type="hidden" name="deleteid" id="deleteid">
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
        function showpopup(spid)
        {
          $('#deleteid').val(spid);

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
</html>