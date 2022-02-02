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
  <title>FIR - Poilce Station</title>
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
              <h4 class="card-title">View FIR</h4>
              </div>
              <div class="col-6">
                <button type="submit" name="btnstate" class="btn btn-primary mr-2 float-right" onclick="document.location.href='addFIR.php'">Add FIR</button>
              </div>
             </div>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <?php
                    if(isset($_POST["deleteid"]))
                    {
                      $id=$_POST["deleteid"];
                      $result=mysqli_query($conn,"delete from tbl_fir where fir_id='".$id."'");
                      //echo "<script>window.location='viewState.php';</script>";
                    }
                    ?>
                    <table id="order-listing" class="table">
                       <thead>
                        <tr>
                            <th>#</th>
                            <th>Sub Category</th>
                            <th>Name</th>
                            <th>FIR Date</th>
                            <th>Police Station Name</th>
                            <th>Status</th>
                            <th>Act</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $count=1;
                      if($_SESSION["type"]=='police')
                      {
                        $result=mysqli_query($conn,"select f.*,s.subcat_name,p.policestation_name from tbl_fir as f left join tbl_subcategory as s on f.subcat_id=s.subcat_id left join tbl_policestation as p on f.policestation_id=p.policestation_id where p.policestation_id='".$_SESSION["id"]."'") or die(mysqli_error($conn));
                      }
                      elseif($_SESSION["type"]=='subpolice')
                      {
                        $result=mysqli_query($conn,"select f.*,s.subcat_name,p.policestation_name from tbl_fir as f left join tbl_subcategory as s on f.subcat_id=s.subcat_id left join tbl_policestation as p on f.policestation_id=p.policestation_id where p_userid='".$_SESSION["id"]."'") or die(mysqli_error($conn));
                      }
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                      <tr>
                        <td><?php echo $count;$count++; ?></td>
                        <td><?php echo $row["subcat_name"]; ?></td>
                        <td><?php echo $row["cname"]; ?></td>
                        <td><?php echo $row["firdate"]; ?></td>
                        <td><?php echo $row["policestation_name"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td>-</td>
                        <td>
                          <button class="btn btn-social-icon btn-outline-youtube" onclick="showpopup(<?php echo $row["fir_id"]; ?>);"><i class="mdi mdi-delete"></i></button>
                          <button class="btn btn-social-icon btn-outline-facebook" onclick="document.location.href='updateFIR.php?updateid=<?php echo my_simple_crypt($row["fir_id"],'e'); ?>';"><i class="mdi mdi-account-edit"></i></button>
                          <button type="button" class="btn btn-social-icon btn-outline-linkedin" onclick="window.location='FIRprofile.php?id=<?php echo my_simple_crypt($row["fir_id"],'e'); ?>'"><i class="mdi mdi-eye"></i></button>
                            <?php if($row["status"]=="Pending")
                            { ?>
                          <button type="button" class="btn btn-social-icon btn-outline-linkedin" onclick="window.location='FIRassign.php?firid=<?php echo $row["fir_id"]; ?>'"><i class="mdi mdi-check"></i></button>

                        <?php } ?>
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
        <form method="post" action="viewFIR.php" id="form1">
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
  <!-- End custom js for this page-->
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
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:51 GMT -->
</html>
