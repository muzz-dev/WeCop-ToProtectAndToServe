<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:37 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add FIR - Admin</title>
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
                  <h4 class="card-title">ADD FIR</h4>
                  <form class="form-sample" id="AddFIR" enctype="multipart/form-data" method="post">
                    <?php
                      if(isset($_POST["btnsubmit"]))
                      {
                        $number=$_POST["txtcontact"];
                        $query=mysqli_query($conn,"select * from tbl_user where contact='".$number."'")or die(mysqli_error());
                        if(mysqli_num_rows($query)<=0)
                        {
                          $result=mysqli_query($conn,"insert into tbl_user(uname,contact,email) values('".$_POST["txtname"]."','".$_POST["txtcontact"]."','".$_POST["txtemailid"]."')")or die(mysqli_error($conn));
                          $userid=mysqli_insert_id($conn);
                        }
                        else
                        {
                          while($r=mysqli_fetch_assoc($query))
                          {
                            $userid=$r["userid"];
                          }
                        }
                        $ext1 = pathinfo($_FILES["image1"]["name"],PATHINFO_EXTENSION);
                        $newname1=time().rand(1111,9999).time().".".$ext1;
                        move_uploaded_file($_FILES["image1"]["tmp_name"],"uploads/fir/".$newname1);
                        $ext2 = pathinfo($_FILES["image2"]["name"],PATHINFO_EXTENSION);
                        $newname2=time().rand(1111,9999).time().".".$ext2;
                        move_uploaded_file($_FILES["image2"]["tmp_name"],"uploads/fir/".$newname2);


                        $result=mysqli_query($conn,"insert into tbl_fir(subcat_id,cname,contact,email,user_id,title,description,address,landmark,pincode,zone_id,latitude,longtitude,status,p_userid,imageurl1,imageurl2,fir_type) values(".$_POST["txtsubcatid"].",'".$_POST["txtname"]."','".$_POST["txtcontact"]."','".$_POST["txtemailid"]."','".$userid."','".$_POST["txttitle"]."','".$_POST["txtdescription"]."','".$_POST["txtaddress"]."','".$_POST["txtlandmark"]."','".$_POST["txtpincode"]."',".$_POST["txtzoneid"].",'".$_POST["txtlatitude"]."','".$_POST["txtlongitude"]."','".$_POST["txtstatus"]."','".$_POST["txtpolicename"]."','".$newname1."','".$newname2."','".$_POST["txtfirtype"]."')")or die(mysqli_error($conn));

                        $fir_typeid=mysqli_insert_id($conn);

                        if(isset($_POST["ismissing"]))
                        {
                          $ext3 = pathinfo($_FILES["image3"]["name"],PATHINFO_EXTENSION);
                          $newname3=time().rand(1111,9999).time().".".$ext3;
                          move_uploaded_file($_FILES["image3"]["tmp_name"],"uploads/missing/".$newname3);

                          $result1=mysqli_query($conn,"insert into tbl_missing_person(mname,mphoto,gender,age,lastaddress1,lastaddress2,landmark,pincode,lastlocationtype,latitude,longtitude,contactname,contactmobilenumber,isdisplay,moredetails,city_id) values('".$_POST["txtmname"]."','".$newname1."','".$_POST["gender"]."','".$_POST["txtage"]."','".$_POST["txtlastaddress1"]."','".$_POST["txtlastaddress2"]."','".$_POST["txtlandmark"]."','".$_POST["txtpincode"]."','".$_POST["txtlastlocationtype"]."','".$_POST["txtmlatitude"]."','".$_POST["txtmlongitude"]."','".$_POST["txtcname"]."','".$_POST["txtcnumber"]."','".$_POST["isdisplay"]."','".$_POST["txtmoredetail"]."',".$_POST["txtcityid"].")");
                        }

                      // $fir_typeid=mysqli_insert_id($conn);
                    if (isset($_POST['isvehicles']))
                    {
                    $ext4=pathinfo($_FILES["vphoto1"]["name"],PATHINFO_EXTENSION);
                    $newname4=time().rand(1111,9999).time().".".$ext4;
                    move_uploaded_file($_FILES["vphoto1"]["tmp_name"],"uploads/vehicles/".$newname4);
                    
                    $ext5=pathinfo($_FILES["vphoto2"]["name"],PATHINFO_EXTENSION);
                    $newname5=time().rand(1111,9999).time().".".$ext5;
                    move_uploaded_file($_FILES["vphoto2"]["tmp_name"],"uploads/vehicles/".$newname5);
                    
                    $result = mysqli_query($conn,"insert into tbl_vehicles (policestation_id,vnumber,chassisnumber,vphoto1,vphoto2) values('".$_POST['txtpolicestationid']."','".$_POST['txtvnumber']."','".$_POST["txtchnumber"]."','".$newname4."','".$newname5."')");
                  }

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
                    <p class="card-description">
                     
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtstateid" id="txtstateid">
                              <option>----Select----</option>
                              <?php
                              $result=mysqli_query($conn,"select * from tbl_state");
                              while($row=mysqli_fetch_assoc($result))
                              {
                                ?>
                                <option value="<?php echo $row["state_id"]?>"><?php echo $row["state_name"]; ?></option>
                                <?php
                              }
                            ?> 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtcityid" id="txtcityid">
                              <option>----Select----</option>
                            </select>
                          </div>
                        </div>
                      </div><div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Zone Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtzoneid" id="txtzoneid">
                              <option>----Select----</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PoliceStation Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtpolicestationid" id="txtpolicestationid">
                              <option>----Select----</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Police Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtpolicename" id="txtpolicename">
                              <option value="">----Select----</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FIR Type</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtfirtype">
                              <option value="">----Select----</option>
                              <option value="Person">Person</option>
                              <option value="Police">Police</option>
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
                                <option value="<?php echo $row["subcat_id"]?>"><?php echo $row["subcat_name"]; ?></option>
                                <?php
                              }
                            ?>
                              
                            </select>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Name" class="form-control" name="txtname"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Contact Number"class="form-control" name="txtcontact"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" placeholder="Email" class="form-control" name="txtemailid"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Title"class="form-control" name="txttitle"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Description"class="form-control" name="txtdescription"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Crime Date</label>
                          <div class="col-sm-9">
                            <input type="date" placeholder="Start Crime Date"class="form-control" name="dtstartcrime"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Crime Time</label>
                          <div class="col-sm-9">
                            <input type="time" placeholder="Start Crime Time"class="form-control" name="tmstartcrime"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Crime Date</label>
                          <div class="col-sm-9">
                            <input type="date" placeholder="End Crime Date"class="form-control" name="dtendcrime"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Crime Time</label>
                          <div class="col-sm-9">
                            <input type="time" placeholder="End Crime Time"class="form-control" name="tmendcrime"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FIR Date</label>
                          <div class="col-sm-9">
                            <input type="date" placeholder="FIR Date"class="form-control" name="dtfir"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">FIR Time</label>
                          <div class="col-sm-9">
                            <input type="time" placeholder="FIR Time"class="form-control" name="tmfir"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <textarea name="txtaddress" placeholder="Address" rows="7" cols="15" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pincode</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Pincode" class="form-control" name="txtpincode"/>
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
                            <input type="text" placeholder="LandMark" class="form-control" name="txtlandmark" id="txtlandmark" />
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
                            <input type="text" placeholder="Longitude" class="form-control" name="txtlongitude" id="txtlongitude" />
                          </div>
                        </div>
                      </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtstatus">
                              <option value="">----Select----</option>
                              <option value="Pending">Pending</option>
                              <option value="In Process">In Process</option>
                              <option value="Complete">Complete</option>
                            </select>
                          </div>
                        </div>
                      </div> 

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Act</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Act" class="form-control" name="txtact"/>
                          </div>
                        </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Image Url 1</label>
                      <input type="file" name="image1" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Image Url 2</label>
                      <input type="file" name="image2" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                      <div class="form-check">
                         <input class="col-sm-9 form-check-input" onchange="manageform();" type="checkbox" id="ismissing" name="ismissing">
                         <label class="col-sm form-check-label" for="ismissing">
                          Is Missing
                        </label>
                      </div>
                    </div>
                    </div>
                       <div class="col-md-6">
                      <div class="form-group row">
                      <div class="form-check">
                         <input class="col-sm-9 form-check-input" onchange="manageform1();" type="checkbox" id="isvehicles" name="isvehicles">
                         <label class="col-sm form-check-label" for="isvehicles">
                          Is Vehicles
                        </label>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="row" id="mform" style="display:none;">
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State Name </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtstateid" id="mtxtstateid">
                              <option value="">----Select----</option>
                              <?php
                              $result=mysqli_query($conn,"select * from tbl_state");
                              while($row=mysqli_fetch_assoc($result))
                              {
                                ?>
                                <option value="<?php echo $row["state_id"]?>"><?php echo $row["state_name"]; ?></option>
                                <?php
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City Name </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="mtxtcityid" id="mtxtcityid">
                              <option value="">----Select----</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Missing Name</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Name" class="form-control" name="txtmname"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Missing Person Photo</label>
                      <input type="file" name="image3" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
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
                          <label class="col-sm-3 col-form-label">Age</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Enter Age"class="form-control" name="txtage"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Address 1</label>
                          <div class="col-sm-9">
                            <textarea name="txtlastaddress1" placeholder="Address" rows="7" cols="15" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Address 2</label>
                          <div class="col-sm-9">
                            <textarea name="txtlastaddress2" placeholder="Address" rows="7" cols="15" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last location type</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Last location" class="form-control" name="txtlastlocationtype"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pincode</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Pincode" class="form-control" name="txtmpincode"/>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-12">
                      <div id="somecomponent1" class="explore-full-map" style="height: 400px;"></div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">LandMark</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="LandMark" class="form-control" name="txtmlandmark" id="txtmlandmark" />
                          </div>
                        </div>
                      </div>
                      
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Latitude</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Latitude" class="form-control" name="txtmlatitude" id="txtmlatitude" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Longitude</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Longitude" class="form-control" name="txtmlongitude" id="txtmlongitude" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Name</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Contact Person Name" class="form-control" name="txtcname" />
                          </div>
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Contact Person Number" class="form-control" name="txtcnumber" />
                          </div>
                        </div>
                      </div>
                    

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">IsDisplay</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isdisplay" id="membershipRadios1" value="Yes" checked>
                                Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="isdisplay" id="membershipRadios2" value="No">
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
                            <input type="text" placeholder="More Detail"class="form-control" name="txtmoredetail"/>
                          </div>
                        </div>
                      </div>
                </div>

                <div class="row" id="vform" style="display:none;">

                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State Name </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtstateid" id="vtxtstateid">
                              <option value="">----Select----</option>
                              <?php
                              $result=mysqli_query($conn,"select * from tbl_state");
                              while($row=mysqli_fetch_assoc($result))
                              {
                                ?>
                                <option value="<?php echo $row["state_id"]?>"><?php echo $row["state_name"]; ?></option>
                                <?php
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City Name </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="mtxtcityid" id="vtxtcityid">
                              <option value="">----Select----</option>
                            </select>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Zone Name </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="vtxtzoneid" id="vtxtzoneid">
                              <option value="">----Select----</option>
                            </select>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Police Station</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="txtpolicestationid" id="vtxtpolicestationid">
                              <option value="">----Select----</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Vehicle Number</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Vehicle Number" class="form-control" name="txtvnumber"/>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Chassis Number</label>
                          <div class="col-sm-9">
                            <input type="text" placeholder="Chassis Number" class="form-control" name="txtchnumber"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Vehicle Image 1</label>
                      <input type="file" name="vphoto1" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      </div>
                      </div>
                          <div class="col-md-6">
                      <div class="form-group row">
                      <label class="col-sm-3 col-form-label">vehicle Image-2</label>
                      <input type="file" name="vphoto2" class="file-upload-default">
                      <div class="input-group col-sm-9">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
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
    location: {latitude: 21.1702, longitude: 72.8311},
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
        //  address=addressComponents["district"];
          //$("#txtlandmark").val(address);
      },
      oninitialized: function(component) {
          var addressComponents = $(component).locationpicker('map').location.addressComponents;
          console.log(addressComponents);
          
      }
    });
  </script>
  <script type="text/javascript">
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
      var cityid = $(this).val();
      $.ajax({
        url:"loadzone.php",
        data:{"cid":cityid},
        type:"POST",
        success:function(data)
        {
           $("#txtzoneid").html(data);
        }
      });
    });
  $("#txtzoneid").change(function(){
      var zoneid = $(this).val();
      $.ajax({
        url:"loadpolicestation.php",
        data:{"zid":zoneid},
        type:"POST",
        success:function(data)
        {
           $("#txtpolicestationid").html(data);
        }
      });
    });
  $("#mtxtstateid").change(function(){
      var stateid = $(this).val();
      $.ajax({
        url:"loadcity.php",
        data:{"sid":stateid},
        type:"POST",
        success:function(data)
        {
           $("#mtxtcityid").html(data);
        }
      });
    });
  $("#txtpolicestationid").change(function(){
      var policestationid = $(this).val();
      $.ajax({
        url:"loadpolicename.php",
        data:{"pid":policestationid},
        type:"POST",
        success:function(data)
        {
           $("#txtpolicename").html(data);
        }
      });
    });
   $("#vtxtstateid").change(function(){
      var stateid = $(this).val();
      $.ajax({
        url:"loadcity.php",
        data:{"sid":stateid},
        type:"POST",
        success:function(data)
        {
           $("#vtxtcityid").html(data);
        }
      });
    });
    $("#vtxtcityid").change(function(){
      var cityid = $(this).val();
      $.ajax({
        url:"loadzone.php",
        data:{"cid":cityid},
        type:"POST",
        success:function(data)
        {
           $("#vtxtzoneid").html(data);
        }
      });
    });
     $("#vtxtzoneid").change(function(){
      var zoneid = $(this).val();
      $.ajax({
        url:"loadpolicestation.php",
        data:{"zid":zoneid},
        type:"POST",
        success:function(data)
        {
           $("#vtxtpolicestationid").html(data);
        }
      });
    });
    $('#AddFIR').validate({

      rules:
      {
        txtsubcatid:
        {
          required:true
        },
        txtname:
        {
          required:true
        },
        txtcontact:
        {
          required:true
        },
        txtemailid:
        {
          required:true
        },
        txttitle:
        {
          required:true
        },
        txtdescription:
        {
          required:true
        },
        txtaddress:
        {
          required:true
        },
        txtlandmark:
        {
          required:true
        },
        txtpincode:
        {
          required:true
        },
        txtzoneid:
        {
          required:true
        },
        txtstatus:
        {
          required:true
        },
        txtpolicename:
        {
          required:true
        }
      },
      messages:
      {
        txtsubcatid:
        {
          required:"Please Select Category"
        },
        txtname:
        {
          required:"Please Enter Name"
        },
        txtcontact:
        {
          required:"Please Enter Contact"
        },
        txtemailid:
        {
          required:"Please Enter EmailId"
        },
        txttitle:
        {
          required:"Please Enter Title"
        },
        txtdescription:
        {
          required:"Please Enter Description"
        },
        txtaddress:
        {
          required:"Please Enter Address"
        },
        txtlandmark:
        {
          required:"Please Enter LandMark"
        },
        txtpincode:
        {
          required:"Please Enter Pincode"
        },
        txtzoneid:
        {
          required:"Please Select Zone"
        },
        txtstatus:
        {
          required:"Please Select Status"
        },
        txtpolicename:
        {
          required:"Please Select Police Name"
        }
      }
    });


    function manageform()
    {
      if($("#ismissing").prop('checked') == true)
      {
        $("#mform").show();
      }
      else
      {
        $("#mform").hide();
      }
    }

     function manageform1()
    {
      if($("#isvehicles").prop('checked') == true)
      {
        $("#vform").show();
      }
      else
      {
        $("#vform").hide();
      }
    }



  </script>
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
