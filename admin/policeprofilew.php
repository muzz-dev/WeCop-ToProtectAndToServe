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
  <title>Police Profile - Admin</title>
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
      <?php
      if(isset($_GET["id"]))
      {
        $id=$_GET["id"];
        $result=mysqli_query($conn,"select * from tbl_policestation where policestation_id='".$id."'");
        while($row=mysqli_fetch_assoc($result))
        {
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="border-bottom text-center pb-4">
                        <img src="uploads/policestation/<?php echo $row["photo_url"]; ?>" alt="" profile="" class="img-lg rounded-circle mb-3"/>  
                      </div>
                      
                      
                   <div class="card-body text-center"><h3></h3>
									<div class="border-top pt-3">
										<div class="row">
											<div class="col-6">
												<p class="clearfix">
												<span class="float-center">
                            						<h3><?php echo $row["policename"]; ?></h3>
                          						</span>
                          						<span class="float-center text-muted">
                           							Police Name
                          						</span>
                        						</p>
											</div>
											<div class="col-6">
												<p class="clearfix">
												<span class="float-center">
                            						<h3><?php echo $row["username"]; ?></h3>
                          						</span>
                          						<span class="float-center text-muted">
                            						Username
                          						</span>
                        						</p>
											</div>	
										</div>
									</div>
									<div class="border-top pt-3">
										<div class="row">
											<div class="col-6">
												<p class="clearfix">
												<span class="float-center">
                            						<h3><?php echo $row["contact"];?></h3>
                          						</span>
                          						<span class="float-center text-muted">
                            						Contact
                          						</span>
                        						</p>
											</div>
											<div class="col-6">
												<p class="clearfix">
												<span class="float-center">
						                            <h3><?php echo $row["gender"];?></h3>
						                        </span>
                          						<span class="float-center text-muted">
						                            Gender
						                         </span>
                        						</p>
											</div>
										</div>
									</div>
									<div class="border-top pt-3">
										<div class="row">
											<div class="col-6">
												<p class="clearfix">
												<span class="float-center">
						                            <a href="#">
						                             <h4><?php echo $row["emailid"];?>
						                            </a></h4>
						                        </span>
												<span class="float-center text-muted">
						                            E-Mail
						                        </span>
                        						</p>
											</div>
											<div class="col-6">
												<p class="clearfix">
												<span class="float-center">
                            					<h3><?php echo $row["isactive"];?></h3>
                          						</span>
                          						<span class="float-center text-muted">
                            						Active
                          						</span>
                        						</p>
											</div>
										</div>
									</div>
					</div>

					<div class="card-body">
                  <div class="template-demo">
                    <table class="table mb-0">
                      
                      <tbody>
                        <tr>
                          <td class="pl-0">
                          	<span class="float-center text-muted">
                           		Police Name
                          	</span>
                          </td>
                          <td class="pr-0 text-right">
                          	<div class="badge badge-primary">
                          	<span class="float-center">
                            	<?php echo $row["policename"]; ?>
                          	</span>
                          	</div>
                          </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                          	<span class="float-center text-muted">
                           		Username
                          	</span>
                          </td>
                          <td class="pr-0 text-right">
                          	<div class="badge badge-info">
                          	<span class="float-center">
                            	<?php echo $row["username"]; ?>
                          	</span>
                          	</div>
                      	  </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                          	<span class="float-center text-muted">
                            	Contact
                          	</span>
                          </td>
                          <td class="pr-0 text-right">
                          	<div class="badge badge-danger">
                          	<span class="float-center">
                            	<?php echo $row["contact"];?>
                          	</span>
                          	</div>
                      	  </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                          	<span class="float-center text-muted">
						        Gender
						    </span>
                          </td>
                          <td class="pr-0 text-right">
                          	<div class="badge badge-success">
                          	<span class="float-center">
						        <?php echo $row["gender"];?>
						    </span>
                          	</div>
                          </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                          	<span class="float-center text-muted">
						        E-Mail
						    </span>
						  </td>
                          <td class="pr-0 text-right">
                          	<div class="badge badge-warning">
                          	<span class="float-center">
						       <a href="#">
						       <?php echo $row["emailid"];?>
						       </a>
						    </span>
                            </div>
                      	  </td>
                        </tr>
                         <tr>
                          <td class="pl-0">
                          	<span class="float-center text-muted">
                           		Active
                         	</span>
                          </td>
                          <td class="pr-0 text-right">
                          	<div class="badge badge-primary">
                          	<span class="float-center">
                            	<?php echo $row["isactive"];?>
                          	</span>
                          	</div>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>


                     <!--  <button class="btn btn-primary btn-block">Preview</button> -->
                    </div>
                    <div class="col-lg-8">
                      <div class="d-flex justify-content-between">
                        <div>
                          <h3>                            
                          <?php echo $row["policestation_name"];?>                            
                          </h3>
                          <div class="d-flex align-items-center">
                            <h5 class="mb-0 mr-2 text-muted"><?php echo $row["addressline1"];?> - <?php echo $row["addressline2"];?>, <?php echo $row["pincode"];?></h5>
                          </div>
                        </div>
                      </div>

                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Details</h4>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Police Name</th>
                          <th>Contact</th>
                          <th>Gender</th>
                          <th>Email</th>
                          <th>IsBlock</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                                  <?php
                                  $count=1;
                                  $id=$_GET["id"];
                                  $result1=mysqli_query($conn,"select * from tbl_policestation_subuser where policestation_id='".$id."'")or die(mysqli_error($conn));
                                  while($item=mysqli_fetch_assoc($result1))
                                  {
                                  ?>
                                  <tr>
                                    <td>
                                      <?php echo $count;$count++; ?>
                                    </td>
                                    <td>
                                      <?php echo $item["pname"]; ?>
                                    </td>
                                    
                                    <td>
                                      <?php echo $item["contact"]; ?>
                                    </td>
                                    <td>
                                      <?php echo $item["gender"]; ?>
                                    </td>
                                    <td>
                                      <?php echo $item["email"]; ?>
                                    </td>
                                    <td>
                                      <label
                                      <?php if($item["isblock"]=="No"){ ?>
                                      class="badge badge-success"<?php } if($item["isblock"]=="Yes"){ ?>class="badge badge-danger"<?php }?>
                                      >
                                      <?php echo $item["isblock"]; ?>
                                      </label>
                                    </td>
                                    <td>
                                      <button type="button" class="btn btn-social-icon btn-outline-linkedin"><i class="mdi mdi-eye" onclick="window.location='viewfirdetails.php?id=<?php echo $row["policestation_id"]; ?>'"></i></button>
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
                </div>
              </div>
            </div>
            <?php
              }
            }
            ?>
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


