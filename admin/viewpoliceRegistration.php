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
  <title>View Police Station - Admin</title>
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
        <?php include'settingpanel.php'; ?>
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
                  <h4 class="card-title">Police Station Details</h4>
                </div>
                <div class="col-sm">
                  <button type="submit" name="btnAddState" class="btn btn-primary mr-2 float-right" onclick="document.location.href='policeRegistration.php';">Add Police Station</button>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <?php
                    if(isset($_POST["deleteid"]))
                    {
                      $id=$_POST["deleteid"];
                      $result=mysqli_query($conn,"delete from tbl_policestation where policestation_id='".$id."'");
                    }
                    ?>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Police Station</th>
                            <th>Zone</th>
                            <th>Address</th>
                            <th>IsActive</th>
                            <!-- <th>Photo</th> -->
                            <th>Contact Number</th>
                            <th>Name</th>
                            <!-- <th>Contact</th>
                            <th>Email</th> -->
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $count=1;
                          if(isset($_GET["zid"]))
                          {
                             $result=mysqli_query($conn,"select p.*,z.zone_name from tbl_policestation as p left join tbl_zone as z on p.zone_id=z.zone_id where z.zone_id='".my_simple_crypt($_GET["zid"],'d')."'") or die(mysqli_error($conn));
                          }
                          else
                          {
                             $result=mysqli_query($conn,"select p.*,z.zone_name from tbl_policestation as p left join tbl_zone as z on p.zone_id=z.zone_id") or die(mysqli_error($conn));
            
                          }
                         while($row=mysqli_fetch_assoc($result))
                          {
                        ?>


                        <tr>
                            <td><?php echo $count; $count++; ?></td>
                            <td><?php echo $row["policestation_name"]; ?></td>
                            <td><?php echo $row["zone_name"]; ?></td>
                            <td><?php echo $row["addressline1"]; ?></td>
                            <td><?php echo $row["isactive"]; ?></td>
                            <!-- <td>
                              <a target="_blank" href="uploads/policestation/<?php echo $row["photo_url"]; ?>">
                              <img width="100px" height="100px" src="uploads/policestation/<?php echo $row["photo_url"]; ?>"/>
                            </td> -->
                            <td><?php echo $row["contactnumber"]; ?></td>
                            <td><?php echo $row["policename"]; ?></td>
                            <!-- <td><?php echo $row["contact"]; ?></td>
                            <td><?php echo $row["emailid"]; ?></td> -->
                            <td>
                              <button type="button" class="btn btn-social-icon btn-outline-youtube" onclick="showpopup(<?php echo $row["policestation_id"];?>)"><i class="mdi mdi-delete"></i></button>
                              <!-- <button class="btn btn-outline-danger" onclick="showpopup(<?php echo $row["policestation_id"];?>)">Delete</button> -->
                              <button type="button" class="btn btn-social-icon btn-outline-facebook" onclick="window.location='updatepoliceregistration.php?updateid=<?php echo my_simple_crypt($row["policestation_id"],'e'); ?>'" ><i class="mdi mdi-account-edit"></i></button>
                              <button type="button" class="btn btn-social-icon btn-outline-linkedin" onclick="window.location='policeprofile.php?id=<?php echo $row["policestation_id"]; ?>'"><i class="mdi mdi-eye"></i></button>
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
        <form action="viewpoliceRegistration.php" method="post" id="form1">
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
  <?php include 'notificationscript.php';?>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>
  <script>
        function showpopup(pid)
        {
          $('#deleteid').val(pid);

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
