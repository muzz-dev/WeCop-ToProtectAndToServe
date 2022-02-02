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
  <title>Update FIR - Poilce Station</title>
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
                  <h4 class="card-title">Update FIR</h4>
                  <form class="form-sample" id="policeform" enctype="multipart/form-data" method="post">
                    <?php
                      if(isset($_POST["btnsubmit"]))
                      {
                        if(empty($_FILES["image1"]["name"]))
                        {
                          $newname1=$_POST["oldname1"];
                        }
                        else
                        {
                          $ext1 = pathinfo($_FILES["image1"]["name"],PATHINFO_EXTENSION);
                          $newname1=time().rand(1111,9999).time().".".$ext1;
                          move_uploaded_file($_FILES["image1"]["tmp_name"],"uploads/fir/".$newname1);
                        }
                        
                        if(empty($_FILES["image2"]["name"]))
                        {
                          $newname2=$_POST["oldname2"];
                        }
                        else
                        {
                          $ext2 = pathinfo($_FILES["image2"]["name"],PATHINFO_EXTENSION);
                          $newname2=time().rand(1111,9999).time().".".$ext2;
                          move_uploaded_file($_FILES["image2"]["tmp_name"],"uploads/fir/".$newname2);
                        }

                        $startdate = date('Y-m-d',strtotime($_POST["dtstartcrime"]));
                        $enddate = date('Y-m-d',strtotime($_POST["dtendcrime"]));
                        $starttime = date('H:i',strtotime($_POST["tmstartcrime"]));
                        $endtime = date('H:i',strtotime($_POST["tmendcrime"]));
                        $firdate = date('Y-m-d',strtotime($_POST["dtfir"]));
                        $firtime = date('H:i',strtotime($_POST["tmfir"]));

                        $id=my_simple_crypt($_GET["updateid"],'d');
                        $result=mysqli_query($conn,"update tbl_fir set subcat_id=".$_POST["txtsubcatid"].",cname='".$_POST["txtname"]."',contact='".$_POST["txtcontact"]."',email='".$_POST["txtemailid"]."',title='".$_POST["txttitle"]."',description='".$_POST["txtdescription"]."',scrimedate='".$startdate."',scrimetime='".$starttime."',ecrimedate='".$enddate."',ecrimetime='".$endtime."',firdate='".$firdate."',firtime='".$firtime."',address='".$_POST["txtaddress"]."',landmark='".$_POST["txtlandmark"]."',pincode='".$_POST["txtpincode"]."',latitude='".$_POST["txtlatitude"]."',longtitude='".$_POST["txtlongitude"]."',imageurl1='".$newname1."',imageurl2='".$newname2."',fir_type='".$_POST["txtfirtype"]."',act='".$_POST["txtact"]."' where fir_id='".$id."'")or die (mysqli_error($conn));

                        // if($_SESSION["type"]=='police')
                        // {
                        //   $result=mysqli_query($conn,"update tbl_fir set subcat_id=".$_POST["txtsubcatid"].",cname='".$_POST["txtname"]."',contact='".$_POST["txtcontact"]."',email='".$_POST["txtemailid"]."',title='".$_POST["txttitle"]."',description='".$_POST["txtdescription"]."',scrimedate='".$startdate."',scrimetime='".$starttime."',ecrimedate='".$enddate."',ecrimetime='".$endtime."',firdate='".$firdate."',firtime='".$firtime."',address='".$_POST["txtaddress"]."',landmark='".$_POST["txtlandmark"]."',pincode='".$_POST["txtpincode"]."',latitude='".$_POST["txtlatitude"]."',longtitude='".$_POST["txtlongitude"]."',imageurl1='".$newname1."',imageurl2='".$newname2."',fir_type='".$_POST["txtfirtype"]."',act='".$_POST["txtact"]."'")or die (mysqli_error($conn));
                        // }
                        // else
                        // {

                        //   $rs=mysqli_query($conn,"select * from tbl_policestation_subuser where p_userid='".$_SESSION["id"]."'");
                        //   while($row=mysqli_fetch_assoc($rs))
                        //   {
                        //     $policestationid=$row["policestation_id"];
                        //   }

                        //   // $result=mysqli_query($conn,"update tbl_fir set subcat_id=".$_POST["txtsubcatid"].",cname='".$_POST["txtname"]."',contact='".$_POST["txtcontact"]."',email='".$_POST["txtemailid"]."',user_id='".$userid."',title='".$_POST["txttitle"]."',description='".$_POST["txtdescription"]."',scrimedate='".$startdate."',scrimetime='".$starttime."',ecrimedate='".$enddate."',ecrimetime='".$endtime."',firdate='".$firdate."',firtime='".$firtime."',address='".$_POST["txtaddress"]."',landmark='".$_POST["txtlandmark"]."',pincode='".$_POST["txtpincode"]."',policestation_id='".$policestationid."',latitude='".$_POST["txtlatitude"]."',longtitude='".$_POST["txtlongitude"]."',imageurl1='".$newname1."',imageurl2='".$newname2."',fir_type='".$_POST["txtfirtype"]."'")or die (mysqli_error($conn));
                        // }
                        

                        if($result==true)
                        {
                          echo "<script>window.location='viewFIR.php';</script>";
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
                        $result=mysqli_query($conn,"select *,x.cat_id,a.act_id from tbl_fir as f left join tbl_subcategory as x on x.subcat_id=f.subcat_id left join tbl_act as a on a.subcat_id=x.subcat_id where fir_id='".$id."'") or die(mysqli_error($conn));
                        while($item=mysqli_fetch_assoc($result))
                        {
                    ?>
                    <p class="card-description">
                     
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FIR Type</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtfirtype">
                              <option value="">----Select----</option>
                              <option <?php if($item["fir_type"]=='Person') { ?> selected <?php } ?> value="Person">Person</option>
                              <option <?php if($item["fir_type"]=='Police') { ?> selected <?php } ?> value="Police">Police</option>
                            </select>
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtcatid" id="txtcatid">
                              <option value="">----Select----</option>
                              <?php
                              $result=mysqli_query($conn,"select * from tbl_category");
                              while($row=mysqli_fetch_assoc($result))
                              {
                                ?>
                                <option <?php if($item["cat_id"]==$row["cat_id"]){ ?> selected <?php } ?> value="<?php echo $row["cat_id"]?>"><?php echo $row["cat_name"]; ?></option>
                                <?php
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sub Category </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtsubcatid">
                              <option value="">----Select----</option>
                              <?php
                              $result=mysqli_query($conn,"select * from tbl_subcategory");
                              while($row=mysqli_fetch_assoc($result))
                              {
                                ?>
                                <option <?php if($item["subcat_id"]==$row["subcat_id"]){ ?> selected <?php } ?> value="<?php echo $row["subcat_id"]?>"><?php echo $row["subcat_name"]; ?></option>
                                <?php
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Act</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtact" id="txtact">
                              <option value="">----Select----</option>
                              <?php
                                  $count=1;
                                  $result=mysqli_query($conn,"select * from tbl_act where subcat_id='".$item["subcat_id"]."'") or die(mysqli_error($conn));
                                  while($row=mysqli_fetch_assoc($result))
                                  {
                                ?>

                                  <option <?php if($item["act_id"]==$row["act_id"]){?> selected <?php }?> value="<?php echo $row["act_id"]; ?>"><?php echo $row["act_title"]; ?></option>

                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>

                       
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["cname"]; ?>" placeholder="Name" class="form-control" name="txtname"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["contact"]; ?>" placeholder="Contact Number"class="form-control" name="txtcontact"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" placeholder="Email" value="<?php echo $item["email"]; ?>" class="form-control" name="txtemailid"/>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["title"]; ?>" placeholder="Title"class="form-control" name="txttitle"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["description"]; ?>" placeholder="Description"class="form-control" name="txtdescription"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Crime Date</label>
                          <div class="col-sm-9">
                            <input type="date" placeholder="Start Crime Date"class="form-control" name="dtstartcrime" value="<?php echo $item["scrimedate"]?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Crime Time</label>
                          <div class="col-sm-9">
                            <input type="time" placeholder="Start Crime Time"class="form-control" name="tmstartcrime" value="<?php echo $item["scrimetime"]?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Crime Date</label>
                          <div class="col-sm-9">
                            <input type="date" placeholder="End Crime Date"class="form-control" name="dtendcrime" value="<?php echo $item["ecrimedate"]?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Crime Time</label>
                          <div class="col-sm-9">
                            <input type="time" placeholder="End Crime Time"class="form-control" name="tmendcrime" value="<?php echo $item["ecrimetime"]?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FIR Date</label>
                          <div class="col-sm-9">
                            <input type="date" placeholder="FIR Date"class="form-control" name="dtfir" value="<?php echo $item["firdate"]?>"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FIR Time</label>
                          <div class="col-sm-9">
                            <input type="time" placeholder="FIR Time"class="form-control" name="tmfir" value="<?php echo $item["firtime"]?>"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <textarea name="txtaddress" placeholder="Address" rows="7" cols="15" class="form-control"><?php echo $item["address"]; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div id="somecomponent" class="explore-full-map" style="height: 400px;">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">LandMark</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $item["landmark"]; ?>" placeholder="LandMark" class="form-control" name="txtlandmark" id="txtlandmark"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pincode</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Pincode" value="<?php echo $item["pincode"]; ?>" class="form-control" id="txtpincode" name="txtpincode"/>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Latitude</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Latitude" class="form-control" name="txtlatitude" id="txtlatitude"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Longitude</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Longitude" class="form-control" name="txtlongitude" id="txtlongitude"/>
                          </div>
                        </div>
                      </div>

                    
                    <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Image Url 1</label>
                      <input type="file" name="image1" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" value="<?php echo $item["imageurl1"]; ?>" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" name="oldname1" value="<?php echo $item["imageurl1"];?>">
                      </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Image Url 2</label>
                      <input type="file" name="image2" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" value="<?php echo $item["imageurl2"]; ?>" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        <input type="hidden" name="oldname2" value="<?php echo $item["imageurl2"];?>">
                      </div>
                    </div>
                    </div>

                    </div>
                    <hr>
                      <button class="btn btn-light float-right" type="button" onclick="window.location='viewFIR.php';">Cancel</button>
                      <button type="submit" class="btn btn-primary mr-2 float-right" name="btnsubmit">Submit</button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js" type="text/javascript"></script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClJ7bohWjfhtUsd71UVKXfsu48-Wq5O5s" type="text/javascript"></script>
 <script type="text/javascript">
  $('#somecomponent').locationpicker({
    location: {latitude: <?php echo $item["latitude"]; ?>, longitude: <?php echo $item["longtitude"]; ?>},
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
  $('#somecomponent1').locationpicker({
    location: {latitude: 21.1702, longitude: 72.8311},
    radius: 0,
    inputBinding: {
          latitudeInput: $('#txtmlatitude'),
          longitudeInput: $('#txtmlongitude'),
          locationNameInput: $('#txtmlandmark')
      },
    mapTypeId: google.maps.MapTypeId.TERRAIN,
    enableAutocomplete: true,
    onchanged: function (currentLocation, radius, isMarkerDropped) {
          var addressComponents = $(this).locationpicker('map').location.addressComponents;
          var address="";
        //  address=addressComponents["district"];
          //$("#txtlandmark").val(address);
      },
      oninitialized: function(component) {
          var addressComponents = $(component).locationpicker('map').location.addressComponents;
          console.log(addressComponents);
          
      }
    });
  </script>
   <?php
                      }
                    }
                  ?>
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
  $("#txtcatid").change(function(){
      var cid = $(this).val();
      $.ajax({
        url:"loadcategory.php",
        data:{"cid":cid},
        type:"POST",
        success:function(data)
        {
           $("#txtsubcatid").html(data);
        }
      });
    });
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
