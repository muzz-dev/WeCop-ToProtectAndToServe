<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php'; ?>
<?php include'enc.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FIR Profile - Admin</title>
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
               <?php
               if(isset($_GET["id"]))
              {
                $id=my_simple_crypt($_GET["id"],'d');
                $result=mysqli_query($conn,"select f.*,s.subcat_name,p.policestation_name,u.pname from tbl_fir as f left join tbl_subcategory as s on f.subcat_id=s.subcat_id left join tbl_policestation as p on f.policestation_id=p.policestation_id left join tbl_policestation_subuser as u on f.p_userid=u.p_userid where fir_id='".$id."'") or die(mysqli_error($conn));
                // $result=mysqli_query($conn,"select f.*,s.pname,p.policestation_name from tbl_fir as f left join tbl_policestation_subuser as s on f.p_userid=s.p_userid left join tbl_policestation as p on s.policestation_id=p.policestation_id where fir_id='".$id."'");
                while($row=mysqli_fetch_assoc($result))
                {
              ?>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                    	<div class="d-flex justify-content-between">
                        <div>
                          <h3>FIR Detail</h3>
                        </div>
                      </div>
    

                   <div class="row">
                    <div class="col-9">

                      <div class="row">
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["subcat_name"]?></h6>
                                <p class="mb-0 text-muted">
                                  Sub Category                            
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["description"]?></h6>
                                <p class="mb-0 text-muted">
                                 Description                             
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["cname"]?></h6>
                                <p class="mb-0 text-muted">
                                   Name                            
                                </p>
                              </div>                               
                            </div> 
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["scrimedate"]?></h6>
                                <p class="mb-0 text-muted">
                                   Start Crime Date                          
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["contact"]?></h6>
                                <p class="mb-0 text-muted">
                                Contact                             
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["scrimetime"]?></h6>
                                <p class="mb-0 text-muted">
                                   Start Crime time                             
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["title"]?></h6>
                                <p class="mb-0 text-muted">
                                  Title                               
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["address"]?></h6>
                                <p class="mb-0 text-muted">
                                Address   
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["landmark"]?></h6>
                                <p class="mb-0 text-muted">
                                  Landmark                            
                                </p>
                              </div>    
                            </div> 
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["firdate"]?></h6>
                                <p class="mb-0 text-muted">
                                 FIR Date                              
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["policestation_name"]?></h6>
                                <p class="mb-0 text-muted">
                                   Police Station Name                             
                                </p>
                              </div>                               
                            </div> 
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["firtime"]?></h6>
                                <p class="mb-0 text-muted">
                                   FIR time                          
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                      </div>

                       <div class="row">
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["pname"]?></h6>
                                <p class="mb-0 text-muted">
                                 Incharge                              
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["ecrimetime"]?></h6>
                                <p class="mb-0 text-muted">
                                   End Crime time                             
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["status"]?></h6>
                                <p class="mb-0 text-muted">
                                   Status                                
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                          <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="mb-1"><?php echo $row["ecrimedate"]?></h6>
                                <p class="mb-0 text-muted">
                                End Crime Date  
                                </p>
                              </div>                              
                            </div> 
                          </div>
                        </div>
                        </div>
                      </div>

                      

                    </div>
                    <!-- image -->
                    <div class="col-3 text-right pb-4">
                      <div class="col-lg-4">
                        <div class="border-bottom text-center pb-4">
                        <img  src="uploads/fir/<?php echo $row["imageurl1"]; ?>"   width="200" height="200" alt="profile" class="rounded-square mb-3"/>
                      </div>
                       <div class="border-bottom text-center pb-4">
                        <img src="uploads/fir/<?php echo $row["imageurl2"]; ?>"  width="200" height="200" alt="profile" class="rounded-square mb-3"/>
                      </div>
                      </div>
                    </div>
                    <!-- image -->
                </div>
              </div>
            </div>
          </div>
                    <?php 
                  }
                }?>
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


