<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:37 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Police Registration - Poilce Station</title>
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
     <?php include'settingpanel.php'; ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'navbar.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Police Registration Form</h4>
                   <?php
                    if (isset($_POST["btnsubmit"])) {

                      $ext = pathinfo($_FILES["policestationphoto"]["name"],PATHINFO_EXTENSION);
                      $newname = time().rand(1111,9999).time().".".$ext;
                      move_uploaded_file($_FILES["policestationphoto"]["tmp_name"],"uploads/policestation/".$newname);



                      $result=mysqli_query($conn,"insert into tbl_policestation(policestation_name,zone_id,addressline1,addressline2,landmark,pincode,isactive,photo_url,contactnumber,username,password,policename,contact,gender,emailid) values('".$_POST['txtpolicestation']."',".$_POST['txtzoneid'].",'".$_POST['txtaddressline1']."','".$_POST['txtaddressline2']."','".$_POST['txtlandmark']."',".$_POST['txtpincode'].",'".$_POST['isactive']."','".$newname."','".$_POST['txtcontactnumber']."','".$_POST['txtusername']."','".$_POST['txtpassword']."','".$_POST['txtname']."','".$_POST['txtcontact']."','".$_POST['gender']."','".$_POST['txtemail']."')") or die(mysqli_error($conn)) ;

                      if($result==true)
                      {
                        ?>
                        <div class="alert alert-success" role="alert">
                          Record is successfully Inserted.....
                        </div>
                        <?php
                      }
                      else
                      {
                        ?>
                        <div class="alert alert-danger" role="alert">
                          Error!! Please check again....
                        </div>
                        <?php
                      }
                    }

                     ?>
                  <form class="form-sample" id="policeform" method="post" enctype="multipart/form-data">
                   
                    <p class="card-description">
                    </p>
                    <div class="row">
                       
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State Name </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtstateid" id="txtstateid">
                              <option value="">----Select----</option>
                              <?php
                                  $result=mysqli_query($conn,"select * from tbl_state") or die(mysqli_error($conn));
                                  while($row=mysqli_fetch_assoc($result))
                               {
                               ?>

                          <option value="<?php echo $row["state_id"]; ?>"><?php echo $row["state_name"]; ?></option>

                              <?php } ?>

                            </select>
                          </div>
                        </div>
                      </div><div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City Name </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtcityid" id="txtcityid">
                              <option value="">----Select----</option>
                              <!-- <?php
                                  $result=mysqli_query($conn,"select * from tbl_zone") or die(mysqli_error($conn));
                                  while($row=mysqli_fetch_assoc($result))
                               {
                               ?>

                          <option value="<?php echo $row["zone_id"]; ?>"><?php echo $row["zone_name"]; ?></option>

                              <?php } ?>
 -->
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Zone Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtzoneid" id="txtzoneid">
                              <option value="">----Select----</option>
                              <!-- <?php
                                  $result=mysqli_query($conn,"select * from tbl_zone") or die(mysqli_error($conn));
                                  while($row=mysqli_fetch_assoc($result))
                               {
                               ?>

                          <option value="<?php echo $row["zone_id"]; ?>"><?php echo $row["zone_name"]; ?></option>

                              <?php } ?>
 -->
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"> Police Station</label>
                          <div class="col-sm-9">
                            <input type="text" name="txtpolicestation" id="txtpolicestation" placeholder="Police Station Name"class="form-control" />
                            <p class="error" id="duperror"></p>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address Line 1</label>
                          <div class="col-sm-9">
                            <textarea rows="7" name="txtaddressline1" cols="15" placeholder="Address Line 1" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address Line 2</label>
                          <div class="col-sm-9">
                            <textarea rows="7" cols="15" name="txtaddressline2" placeholder="Address Line 2" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">LandMark</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="LandMark" name="txtlandmark" class="form-control" />
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pincode</label>
                          <div class="col-sm-9">
                            <input type="text" name="txtpincode" placeholder="Pincode" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Latitude</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Latitude" name="txtlatitude" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Longitude</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Longitude" name="txtlongitude" class="form-control" />
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">IsActive</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios1" value="Yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isactive" id="membershipRadios2" value="No">
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                    <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Profile Photo</label>
                      <input type="file" name="policestationphoto" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" name="" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Contact number" name="txtcontactnumber" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Name</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="User Name" name="txtusername" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" placeholder="Password" name="txtpassword" class="form-control" />
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Senior Name</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Name" name="txtname" class="form-control" />
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Conatct</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Conatct Number" name="txtcontact" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="Male" checked>
                                Male
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="membershipRadios2" value="Female">
                                Female
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" placeholder="Email" name="txtemail" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>                      
                    <button class="btn btn-light float-right">Cancel</button>
                    <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary mr-2 float-right">Submit</button>
                  </form>
                </div>
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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/iCheck.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <!-- End custom js for this page-->
  <script>
    $("#txtstateid").change(function(){
      var stateid = $(this).val();
      $.ajax({
        url:"loadcity.php",
        data:{"sid":stateid},
        type:"POST",
        success:function(data)
        {
           $("#txtcityid").html(data);
        }
      });
    });
    $("#txtcityid").change(function(){
      var stateid = $(this).val();
      $.ajax({
        url:"loadzone.php",
        data:{"cid":stateid},
        type:"POST",
        success:function(data)
        {
           $("#txtzoneid").html(data);
        }
      });
    });
  $('#txtpolicestation').blur(function() {
      //alert("sdf");
       $.ajax({
          url: "policestationvalidation.php",
          type: 'POST',
          data: {"policestationname":$(this).val()},
          success: function(result){
                     if(result=="yes")
                     {  
                      $("#btnsubmit").prop('disabled', true);
                      $("#duperror").html("Policestation Name Already Exist!");
                        //alert("Already Exist");
                     }
                     else
                     {
                      $("#btnsubmit").prop('disabled', false);
                      $("#duperror").html("");
                     }
                   }
          });
    });    
    $('#policeform').validate({
      rules:
      {
        txtpolicestation:
        {
          required:true
        },
        txtzoneid:
        {
          required:true
        },
        txtpincode:
        {
           required:true,
           number:true,
           minlength:6,
           maxlength:6
        },
        txtemail:
        {
          required:true,
          email:true,
        },
        txtaddressline1:
        {
          required:true
        },
        txtlandmark:
        {
          required:true
        },
        // txtlatitude:
        // {
        //   required:true
        // },
        // txtlongitude:
        // {
        //   required:true
        // },
        txtcontactnumber:
        {
          required:true,
          number:true,
          minlength:10,
          maxlength:10
        },
        txtusername:
        {
          required:true
        },
        txtpassword:
        {
          required:true
        },
        txtname:
        {
          required:true
        },
        txtcontact:
        {
          required:true,
          number:true,
          minlength:10,
          maxlength:10
        },
        txtemail:
        {
          required:true,
          email:true
        }
      },
      messages:
      {
        txtpolicestation:
        {
          required:"Please Enter Police Station Name"
        },
        txtzoneid:
        {
          required:"Please Select Zone Name"
        },
        txtpincode:
        {
           required:"Please Enter Pincode",
           number:"Please Enter Only Numbers",
           minlength:"Min 6 Numbers Allowed",
           maxlength:"Max 6 Numbers Allowed"
        },
        txtaddressline1:
        {
          required:"Please Enter AddressLine1"
        },
        txtlandmark:
        {
          required:"Please Enter LandMark"
        },
        // txtlatitude:
        // {
        //   required:"Please Enter Latitude"
        // },
        // txtlongitude:
        // {
        //   required:"Please Enter Longitude"
        // },
        txtcontactnumber:
        {
          required:"Please Enter Contact Number",
          number:"Please Enter Only Number",
          minlength:"Min 10 Numbers Allowed",
          maxlength:"Max 10 Numbers Allowed"
        },
        txtusername:
        {
          required:"Please Enter Username"
        },
        txtpassword:
        {
          required:"Please Enter Password"
        },
        txtname:
        {
          required:"Please Enter Name"
        },
        txtcontact:
        {
          required:"Please Enter Contact Number",
          number:"Please Enter Only Number",
          minlength:"Min 10 Numbers Allowed",
          maxlength:"Max 10 Numbers Allowed"
        },
        txtemail:
        {
          required:"Please Enter Email",
          email:"Enter Proper Email"
        }
      }
    });
  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
