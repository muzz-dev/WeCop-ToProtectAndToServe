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
<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:37 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Missing Person - Poilce Station</title>
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
                <div class="card-body">
                  <h4 class="card-title">Update Missing Person</h4>
                  <form class="form-sample" id="" enctype="multipart/form-data" method="post">
                    <?php
                      if(isset($_POST["btnsubmit"]))
                      {
                        $id=my_simple_crypt($_GET["updateid"],'d');
                        if(empty($_FILES["image1"]["name"]))
                        {
                          $newname1=$_POST["oldname"];
                        }
                        else
                        {
                          $ext1 = pathinfo($_FILES["image1"]["name"],PATHINFO_EXTENSION);
                          $newname1=time().rand(1111,9999).time().".".$ext1;
                          move_uploaded_file($_FILES["image1"]["tmp_name"],"uploads/missing/".$newname1);
                        }
                        
                        $result=mysqli_query($conn,"update tbl_missing_person set mname='".$_POST["txtmname"]."',mphoto='".$newname1."',gender='".$_POST["gender"]."',age='".$_POST["txtage"]."',lastaddress1='".$_POST["txtaddress1"]."',lastaddress2='".$_POST["txtaddress2"]."',landmark='".$_POST["txtlandmark"]."',pincode='".$_POST["txtpincode"]."',lastlocationtype='".$_POST["txtlastlocationtype"]."',contactname='".$_POST["txtcname"]."',contactmobilenumber='".$_POST["txtcnumber"]."',isdisplay='".$_POST["isdisplay"]."',moredetails='".$_POST["txtmoredetail"]."',city_id=".$_POST["txtcity"]." where pid='".$id."'") or die (mysqli_error($conn));
                      
                        if($result==true)
                        {
                          echo "<script>window.location='viewmissingperson';</script>";
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
                      if(isset($_GET["updateid"]))
                      {
                      $id=my_simple_crypt($_GET["updateid"],'d');
                      if(!$id)
                      {
                        echo "<script>window.location='error.php';</script>";
                      }
                      // echo $id;
                      $result=mysqli_query($conn,"select * from tbl_missing_person where pid='".$id."'");
                      while($item=mysqli_fetch_assoc($result))
                      { 
                                $landmark=$item["landmark"];
                                $lat=$item["lattitude"];
                                $long=$item["longtitude"];
                    ?>
                    <p class="card-description">
                    </p>
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Missing Name</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["mname"];?>" placeholder="Name" class="form-control" name="txtmname"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Missing Person Photo</label>
                      <input type="file" name="image1" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" value="<?php echo $item["mphoto"];?>" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" name="oldname" value="<?php echo $item["mphoto"];?>">
                      </div>
                      </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="Male" <?php if($item["gender"]=="Male") { ?> checked <?php } ?>>
                                Male
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio"  class="form-check-input" name="gender" id="membershipRadios2" value="Female" <?php if($item["gender"]=="Female") { ?> checked <?php } ?>>
                                Female
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Age</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["age"];?>" placeholder="Enter Age"class="form-control" name="txtage"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Address 1</label>
                          <div class="col-sm-9">
                            <textarea name="txtaddress1" value="" placeholder="Address" rows="7" cols="15" class="form-control"><?php echo $item["lastaddress1"];?></textarea>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Address 2</label>
                          <div class="col-sm-9">
                            <textarea name="txtaddress2" value="" placeholder="Address" rows="7" cols="15" class="form-control"><?php echo $item["lastaddress2"];?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                      <div id="somecomponent" class="explore-full-map" style="height: 400px;"></div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">LandMark</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["landmark"];?>" placeholder="LandMark" class="form-control" name="txtlandmark" id="txtlandmark"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pincode</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["pincode"];?>" placeholder="Pincode" class="form-control" name="txtpincode" id="txtpincode"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last location type</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["lastlocationtype"];?>" placeholder="Last location" class="form-control" name="txtlastlocationtype"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Latitude</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Latitude" class="form-control" name="txtlatitude" id="txtlatitude" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Longitude</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["lattitude"] ?>" placeholder="Longitude" class="form-control" name="txtlongitude" id="txtlongitude" />
                          </div>
                        </div>
                      </div>

                      
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Name </label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["contactname"];?>" placeholder="Contact Name" class="form-control" name="txtcname"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Mobile Number</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["contactmobilenumber"];?>" placeholder="Contact Number" name="txtcnumber" class="form-control" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">IsDisplay</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isdisplay" id="membershipRadios1" value="Yes" <?php if($item["isdisplay"]=="Yes") { ?> checked <?php } ?>>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isdisplay" id="membershipRadios2" value="No"  value="Yes" <?php if($item["isdisplay"]=="No") { ?> checked <?php } ?>>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Missing Date</label>
                          <div class="col-sm-9">
                            <input type="date" placeholder="Missing Date"class="form-control" name="dtmissing"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Missing Time</label>
                          <div class="col-sm-9">
                            <input type="time" placeholder="missing Time"class="form-control" name="tmmissing"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">More Detail</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["moredetails"];?>" placeholder="More Detail"class="form-control" name="txtmoredetail"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City Name </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtcity">
                              <option value="">----Select----</option>
                              <?php
                              $result=mysqli_query($conn,"select * from tbl_city");
                              while($row=mysqli_fetch_assoc($result))
                              {
                                ?>
                                <option <?php if($item["city_id"]==$row["city_id"]) {?>selected <?php }?>  value="<?php echo $row["city_id"]?>"><?php echo $row["city_name"]; ?></option>
                                <?php
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FIR Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtfir">
                              <option value="">----Select----</option>
                              <?php
                              $result=mysqli_query($conn,"select * from tbl_fir");
                              while($row=mysqli_fetch_assoc($result))
                              {
                                ?>
                                <option value="<?php echo $row["fir_id"]?>"><?php echo $row["cname"]; ?></option>
                                <?php
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>
                    <hr>
                      <button class="btn btn-light float-right" type="button" onclick="window.location='viewmissingperson.php';">Cancel</button>
                      <button type="submit" class="btn btn-primary mr-2 float-right" name="btnsubmit">Submit</button>
                  </form>
                  <?php
                  }
                  }
                  ?>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js" type="text/javascript"></script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClJ7bohWjfhtUsd71UVKXfsu48-Wq5O5s" type="text/javascript"></script>

  <script type="text/javascript">
  $('#somecomponent').locationpicker({
    location: {latitude: <?php echo $lat; ?>, longitude: <?php  echo $long; ?>},
    radius: 0,
    inputBinding: {
          latitudeInput: $('#txtlatitude'),
          longitudeInput: $('#txtlongitude'),
          locationNameInput: $('#txtlandmark')
      },
    mapTypeId: google.maps.MapTypeId.TERRAIN,
    enableAutocomplete: true,
    onchanged: function (currentLocation, radius, isMarkerDropped) {
          var addressComponents = $(this).locationpicker('map').location.addressComponents;
          var address="";
          var pincode = addressComponents["postalCode"];
          $("#txtpincode").val(pincode);
        //  address=addressComponents["district"];
          //$("#txtlandmark").val(address);
      },
      oninitialized: function(component) {
          var addressComponents = $(component).locationpicker('map').location.addressComponents;
          console.log(addressComponents);
          
      }
    });
  </script>
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

<!-- <script>
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
        txtemailid:
        {
          required:true,
          email:true,
        },
        txtaddress:
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
        txtemailid:
        {
          required:"Please Enter EMail",
          email:"Enter Proper Email"
        }
      }
    });
  </script> -->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
