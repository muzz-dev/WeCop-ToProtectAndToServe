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
<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:37 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Preserve Home</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/icheck/skins/all.html">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
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
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <?php
                if(isset($_GET["id"]))
                {
                  $id=my_simple_crypt($_GET["id"],'d');
                  $result=mysqli_query($conn,"select h.*,u.uname,u.contact,u.email from tbl_home as h left join tbl_user as u on h.userid=u.userid where home_id='".$id."'")or die (mysqli_error($conn));
                  while($row=mysqli_fetch_assoc($result))
                  {
                ?>
                <div class="card-body">
                  <h4 class="card-title">Preserve Home</h4>
                  <div class="row">
                    <div class="col-4">
                      <div class="border-bottom text-center pb-4">
                          <span>House Image</span>
                           <img  src="uploads/home/<?php echo $row["homephotourl"]; ?>"   width="300" height="300" alt="profile" class="rounded-square mb-3"/>
                      </div>
                    </div>
                        
                        <div class="col-4">
                         <div class="border-bottom text-center pb-4">
                        <span>House Details</span></div>
                         <div class="row">
                        <div class="col-12">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-4">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-2"><?php echo $row["homeaddressline1"]." - ".$row["homeaddressline2"] ?></h6>
                                <p class="mb-0 text-muted">
                                 Home Address                           
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                       </div>

                       <div class="row">
                        <div class="col-12">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-4">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-2"><?php echo $row["homelandmark"] ?> - <?php echo $row["homepincode"]; ?></h6>
                                <p class="mb-0 text-muted">
                                 Landmark - Pincode                        
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                       </div>

                       <div class="row">
                        <div class="col-12">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-4">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-2">
                                  <?php
                                    if($row["isapprove"]=='P')
                                      { echo "Pending"; }
                                    elseif($row["isapprove"]=='Y')
                                      { echo "Approved"; }
                                    elseif($row["isapprove"]=='N')
                                      { echo "Decline"; }
                                  ?>
                                </h6>
                                <p class="mb-0 text-muted">
                                Status                       
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                       </div>

                       <div class="row">
                        <div class="col-12">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-4">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-2"><?php echo $row["start_date"]; ?></h6>
                                <p class="mb-0 text-muted">
                                Start Date                      
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                       </div>
                        <div class="row">
                        <div class="col-12">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-4">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-2"><?php echo $row["end_date"]; ?></h6>
                                <p class="mb-0 text-muted">
                                End Date                      
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>


                      <div class="col-4">
                        <div class="border-bottom text-center pb-4">
                        <span>User Detail</span></div>
                        <div class="row">
                        <div class="col-12">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-4">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-2"><?php echo $row["uname"];?></h6>
                                <p class="mb-0 text-muted">
                                 House Holder's Name                          
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                       </div>

                       <div class="row">
                        <div class="col-12">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-4">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-2"><?php echo $row["contact"]; ?></h6>
                                <p class="mb-0 text-muted">
                                House Holder's Phone Number                       
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                       </div>

                       <div class="row">
                        <div class="col-12">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-4">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-2"><?php echo $row["email"]; ?></h6>
                                <p class="mb-0 text-muted">
                               House Holder's E-mail                      
                                </p>
                              </div>    
                            </div> 
                          </div>
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
       <?php include 'footer.php'; ?>
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
  <script src="js/additional-methods.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/iCheck.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
