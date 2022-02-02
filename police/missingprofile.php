<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Missing Profile - Admin</title>
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
    <?php include 'header.php';?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php include 'settingpanel.php';?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'navbar.php';?>
      <!-- partial -->
     <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="border-bottom text-left pb-4">
                        <img src="./image/face23.jpg" alt="profile" class="img-lg rounded-square mb-3"/>
                        <div class="d-flex justify-content-between">
                        <div>
                          <h3>Missing Person Name</h3>
                           <h6 class="mb-1">Female</h6>
                        </div>
                      </div>
                      </div>
                    <div class="row">
                    <div class="col-6">
                      <div id="dragula-left" class="py-2">
                        <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1">27</h6>
                                <p class="mb-0 text-muted">
                                  Age                             
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1">Height-5'3</h6>
                                <p class="mb-0 text-muted">
                                  More Detail                            
                                </p>
                              </div>                               
                            </div> 
                          </div>
                        </div>
                        <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1">Palanpur Patia</h6>
                                <p class="mb-0 text-muted">
                                  Last Address 1                             
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1">Surat</h6>
                                <p class="mb-0 text-muted">
                                  Last Address 2                               
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div id="dragula-right" class="py-2">
                        <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1">Palanpur Patia-569303</h6>
                                <p class="mb-0 text-muted">
                                  Landmark-Pincode                             
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1">V.R.Mall</h6>
                                <p class="mb-0 text-muted">
                                  Last Location Type                          
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1">21-03-2020</h6>
                                <p class="mb-0 text-muted">
                                  Missing Date                             
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1">2:34pm</h6>
                                <p class="mb-0 text-muted">
                                  Missing Time                             
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="template-demo">
                    <table class="table mb-12">
                      <thead>
                        <tr>
                          <th class="pl-12"><h4><b>Contact Details</b></h4></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="pl-12">Contact Person Name</td>
                          <td class="pr-0 text-right"><div class="badge badge-primary badge-pill">Priyanshi</div></td>
                        </tr>
                        <tr>
                          <td class="pl-12">Phone Number</td>
                          <td class="pr-0 text-right"><div class="badge badge-info badge-pill">9876554321</div></td>
                        </tr>
                        <tr>
                          <td class="pl-12">City</td>
                          <td class="pr-0 text-right"><div class="badge badge-danger badge-pill">Surat</div></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
                    </div>
                   </div>
                  </div>
                </div>
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

  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:57 GMT -->
</html>


