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
  <title>Missing Person - Poilce Station</title>
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
              <h4 class="card-title">View Missing Person</h4>
              </div>
              <div class="col-6">
                <button type="submit" name="btnstate" class="btn btn-primary mr-2 float-right" onclick="document.location.href='addmissingperson.php'">Add Missing Person</button>
              </div>
             </div>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <?php
                    if(isset($_POST["deleteid"]))
                    {
                      $did=$_POST["deleteid"];
                      $result=mysqli_query($conn,"delete from tbl_missing_person where pid='".$did."'");
                    }
                    ?>
                    <table id="order-listing" class="table">
                       <thead>
                        <tr>
                            <th>#</th>
                            <th>Missing Person</th>
                            <th>Photo</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <!-- <th>Landmark</th>
                            <th>Pincode</th> -->
                            <th>Last Location</th>
                            <th>Contact Name</th>
                            <th>Contact Number</th>
                            <!-- <th>More Details</th> -->
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $count=1;
                          $result=mysqli_query($conn,"select * from tbl_policestation as p left join tbl_zone as z on p.zone_id=z.zone_id left join tbl_city as c on z.city_id=c.city_id left join tbl_missing_person as m on c.city_id=m.city_id where policestation_id='".$_SESSION["id"]."'") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>
                      <tr>
                        <td><?php echo $count;$count++; ?></td>
                        <td><?php echo $row["mname"]; ?></td>
                        <td>
                          <img src="uploads/missing/<?php echo $row["mphoto"]; ?>" alt="">
                        </td>
                        <td><?php echo $row["gender"]; ?></td>
                        <td><?php echo $row["age"]; ?></td>
                        <!-- <td><?php echo $row["landmark"]; ?></td>
                        <td><?php echo $row["pincode"]; ?></td> -->
                        <td><?php echo $row["lastaddress1"]; ?></td>
                        <!-- <td><?php echo $row["moredetails"]; ?></td> -->
                        <td><?php echo $row["contactname"]; ?></td>
                        <td><?php echo $row["contactmobilenumber"]; ?></td>
                        <td>
                          <button class="btn btn-social-icon btn-outline-youtube" onclick="showpopup(<?php echo $row["pid"]; ?>);"><i class="mdi mdi-delete"></i></button>
                          <button class="btn btn-social-icon btn-outline-facebook" onclick="document.location.href='updatemissingperson.php?updateid=<?php echo my_simple_crypt($row["pid"],'e'); ?>'"><i class="mdi mdi-account-edit"></i></button>
                          <button type="button" class="btn btn-social-icon btn-outline-linkedin" onclick="window.location='missingprofileex.php?id=<?php echo my_simple_crypt($row["pid"],'e'); ?>'"><i class="mdi mdi-eye"></i></button>
                        </td>
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
        <form action="viewmissingperson.php" method="post" id="form1" accept-charset="utf-8">
          <input type="hidden" id="deleteid" name="deleteid">
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
  <!-- End custom js for this page-->
  <script>
        function showpopup(stid)
        {
          $('#deleteid').val(stid);

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
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:51 GMT -->
</html>
