<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'connection.php';?>
<?php include'enc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View FIR Details - Admin</title>
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
    <?php include'header.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php include'settingpanel.php'; ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include'navbar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <?php
              if(isset($_GET["id"]))
              {
                $id=my_simple_crypt($_GET["id"],'d');
                $result=mysqli_query($conn,"select f.*,s.pname,p.policestation_name from tbl_fir as f left join tbl_policestation_subuser as s on f.p_userid=s.p_userid left join tbl_policestation as p on s.policestation_id=p.policestation_id where fir_id='".$id."'");
                while($row=mysqli_fetch_assoc($result))
                {
              ?>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <!-- <div class="border-bottom text-center pb-4">
                        <img src="../../../../images/faces/face12.jpg" alt="profile" class="img-lg rounded-circle mb-3"/>
                        <p>Bureau Oberhaeuser is a design bureau focused on Information- and Interface Design. </p>
                        <div class="d-flex justify-content-between">
                          <button class="btn btn-success">Hire Me</button>
                          <button class="btn btn-success">Follow</button>
                        </div>
                      </div>
                      <div class="border-bottom py-4">
                        <p>Skills</p>
                        <div>
                          <label class="badge badge-outline-dark">Chalk</label>
                          <label class="badge badge-outline-dark">Hand lettering</label>
                          <label class="badge badge-outline-dark">Information Design</label>
                          <label class="badge badge-outline-dark">Graphic Design</label>
                          <label class="badge badge-outline-dark">Web Design</label>  
                        </div>                                                               
                      </div> -->
                      <div class="border-bottom py-4">
                        <div class="d-flex mb-3">
                          <div class="progress progress-md flex-grow">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="progress progress-md flex-grow">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="py-4">
                        <p class="clearfix">
                          <span class="float-left">
                            Complain Person Name
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["cname"]; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Complain Person Contact
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["contact"]; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Mail
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["email"]; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Start Crime Date/Time
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["scrimedate"]; ?>-<?php echo $row["scrimetime"]; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            End Crime Date/Time
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["ecrimedate"]; ?>-<?php echo $row["ecrimetime"]; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            FIR Date/Time
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["firdate"]; ?>-<?php echo $row["firtime"]; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Address
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["address"]; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Landmark
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["landmark"]; ?> - <?php echo $row["pincode"]; ?>
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Status
                          </span>
                          <span class="float-right text-muted">
                            <?php echo $row["status"]; ?>
                          </span>
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="d-flex justify-content-between">
                        <div>
                          <h3>Police Station : <?php echo $row["policestation_name"]; ?></h3>
                          <div class="d-flex align-items-center">
                            <h5 class="mb-0 mr-2 text-muted">Police Name : <?php echo $row["pname"]; ?></h5>
                          </div>
                        </div>
                      </div>
                      <div class="profile-feed">
                            <img width="250px" height="250px" src="uploads/fir/<?php echo $row["imageurl1"]; ?>" alt="" class="rounded mw-100"/>                            
                           
                            <img width="250px" height="250px" src="uploads/fir/<?php echo $row["imageurl2"]; ?>" alt="" class="rounded mw-100"/>                                                        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
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
  <script src="js/profile-demo.js"></script>
  <?php include 'notificationscript.php';?>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:57 GMT -->
</html>
