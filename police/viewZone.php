<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include'connection.php';?>
<?php include 'enc.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Zone - Police Station</title>
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
                  <h4 class="card-title">View Zone</h4>
                </div>
                <!-- <div class="col-sm">
                  <button type="submit" name="btnAddZone" class="btn btn-primary mr-2 float-right" onclick="document.location.href='addZone.php';">Add Zone</button>
                </div> -->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <?php
                    if (isset($_POST["deleteid"])) {
                      $id=$_POST["deleteid"];
                      //echo $id;
                      $result=mysqli_query($conn,"delete from tbl_zone where zone_id='".$id."'");
                    }


                    ?>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Zone Name</th>
                            <th>Zone Code</th>
                            <th>City Name</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                      </thead>
                       <tbody>

                        <?php
                          $count=1;
                          $result=mysqli_query($conn,"select z.*,c.city_name,s.state_name from tbl_zone as z left join tbl_city as c on c.city_id=z.city_id left join tbl_state as s on s.state_id=c.state_id") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>


                        <tr>
                            <td><?php echo $count; $count++; ?></td>
                            <td><?php echo $row["zone_name"]; ?></td>
                            <td><?php echo $row["zone_code"]; ?></td>
                            <td><?php echo $row["city_name"]; ?> - <?php echo $row["state_name"]; ?></td>
                            <!-- <td>
                              <button onclick="showpopup(<?php echo $row["zone_id"]; ?>);" class="btn btn-social-icon btn-outline-youtube"><i class="mdi mdi-delete"></i></button>
                              <button class="btn btn-social-icon btn-outline-facebook" onclick="document.location.href='updatezone.php?updateid=<?php echo my_simple_crypt($row["zone_id"],'e'); ?>';"><i class="mdi mdi-account-edit"></i></button>
                              <button type="button" class="btn btn-social-icon btn-outline-linkedin" onclick="window.location='viewpoliceRegistration.php?zid=<?php echo my_simple_crypt($row["zone_id"],'e'); ?>'"><i class="mdi mdi-eye"></i></button>
                            </td> -->
                            
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
        <form method="post" action="viewZone.php" id="form1">
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
        function showpopup(zid)
        {
          $('#deleteid').val(zid);

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
