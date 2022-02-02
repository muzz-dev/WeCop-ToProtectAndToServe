<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
   echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php
if($_SESSION["type"]=='subpolice')
{
  echo "<script>window.location='error.php';</script>";
}
?>
<?php include 'connection.php';?>
<?php include 'enc.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:50 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title>Preserve Home - Poilce Station</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <h4 class="card-title">View Preserve Home</h4>
              </div>
             </div>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <?php
                    if(isset($_POST["approveid"]))
                    {
                      $id=$_POST["approveid"];
                      $result=mysqli_query($conn,"update tbl_home set isapprove='Y' where home_id='".$id."'");
                      //echo "<script>window.location='viewState.php';</script>";
                    }
                    if(isset($_POST["decline"]))
                    {
                      $id=$_POST["decline"];
                      $result=mysqli_query($conn,"update tbl_home set isapprove='N' where home_id='".$id."'");
                      //echo "<script>window.location='viewState.php';</script>";
                    }
                    ?>
                    <table id="order-listing" class="table">
                       <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $count=1;
                        $result=mysqli_query($conn,"select * from tbl_home as h left join tbl_policestation as p on h.policestation_id=p.policestation_id left join tbl_user as u on h.userid=u.userid where p.policestation_id='".$_SESSION["id"]."'") or die(mysqli_error($conn));
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                      <tr>
                        <td><?php echo $count;$count++; ?></td>
                        <td><?php echo $row["uname"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td><?php echo $row["end_date"]; ?></td>
                        <td><?php echo $row["homeaddressline1"]."-".$row["homeaddressline2"]."-".$row["homelandmark"]; ?></td>
                        <td><?php
                        if($row["isapprove"]=='P')
                          { echo "Pending"; }
                        elseif($row["isapprove"]=='Y')
                          { echo "Approved"; }
                        elseif($row["isapprove"]=='N')
                          { echo "Decline"; }
                        ?></td>
                        <td>
                          <?php if($row["isapprove"]=="P")
                          {
                          ?>
                            <button type="button" class="btn btn-social-icon btn-outline-linkedin" onclick="showpopup(<?php echo $row["home_id"]; ?>);"><i class="mdi mdi-check"></i></button>
                            <button type="button" class="btn btn-social-icon btn-outline-youtube" onclick="showpopup1(<?php echo $row["home_id"]; ?>);"><i class="fa fa-close"></i></button>

                        <?php } ?>
                        <button type="button" class="btn btn-social-icon btn-outline-linkedin" onclick="window.location='preservehomedetail.php?id=<?php echo my_simple_crypt($row["home_id"],'e'); ?>'"><i class="mdi mdi-home-circle" ></i></button>
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
        <form method="post" action="preservehome.php" id="form1">
          <input type="hidden"  name="approveid" id="approveid"/>
        </form>
        <form method="post" action="preservehome.php" id="form2">
          <input type="hidden"  name="decline" id="decline"/>
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
        function showpopup(spid)
        {
          $('#approveid').val(spid);

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
        function showpopup1(spid)
        {
          $('#decline').val(spid);

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
                $("#form2").submit();
              }
            });
        }
  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:51 GMT -->
</html>
