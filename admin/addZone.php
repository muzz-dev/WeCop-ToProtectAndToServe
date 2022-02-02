<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'connection.php';?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:37 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Zone - Admin</title>
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
            <div class="col-md-6 grid-margin stretch-card container center_div">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Zone</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample" method="post" id="AddZone">
                  <?php
                  if (isset($_POST['btnsubmit']))
                  {
                    $result = mysqli_query($conn,"insert into tbl_zone (zone_name,zone_code,city_id) values('".$_POST['txtzonename']."','".$_POST['txtzonecode']."','".$_POST["txtcityid"]."')");

                    if ($result==true) 
                    {
                      ?>
                      <div class="alert alert-success" role="alert">
                        Successfully Insert !!!
                      </div>
                      <?php
                    }
                    else
                    {
                      ?>
                      <div class="alert alert-danger" role="alert">
                        ERROR !!!
                      </div>
                      <?php
                    }
                  }

                  ?>
                  <div class="form-group">
                      <label for="txtstateid">State Name</label>
                        <select class="form-control" id="txtstateid" name="txtstateid">
                          <option value="">--Select--</option>
                         <?php
                          $count=1;
                          $result=mysqli_query($conn,"select * from tbl_state ORDER BY state_name") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>

                          <option value="<?php echo $row["state_id"]; ?>"><?php echo $row["state_name"]; ?></option>

                          <?php } ?>


                        </select>
                    </div>
                    <div class="form-group">
                      <label for="txtcityid">City Name</label>
                        <select class="form-control" id="txtcityid" name="txtcityid">
                          <option value="">--Select--</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Zone Name</label>
                      <input type="text" class="form-control" id="txtzonename" placeholder="Zone Name" name="txtzonename">
                      <p class="error" id="duperror"></p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Zone Code</label>
                      <input type="text" class="form-control" id="txtzonecode" placeholder="Zone Code" name="txtzonecode">
                      <p class="error" id="duperrorcode"></p>
                    </div>
                    <hr>
                    <button class="btn btn-light float-right" type="button" onclick="window.location='viewzone.php';">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-2 float-right" id="btnsubmit" name="btnsubmit">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include 'footer.php';?>
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
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
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
  <?php include 'notificationscript.php';?>
  <!-- End custom js for this page-->


  <script>
    $('#txtzonename').blur(function() {
      //alert("sdf");
       $.ajax({
          url: "zonevalidation.php",
          type: 'POST',
          data: {"zonename":$(this).val()},
          success: function(result){
                     if(result=="yes")
                     {  
                      $("#btnsubmit").prop('disabled', true);
                      $("#duperror").html("Cityname Already Exist!");
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
    $('#txtzonecode').blur(function() {
      //alert("sdf");
       $.ajax({
          url: "zonecodevalidation.php",
          type: 'POST',
          data: {"zonecode":$(this).val()},
          success: function(result){
                     if(result=="yes")
                     {  
                      $("#btnsubmit").prop('disabled', true);
                      $("#duperrorcode").html("City Code Already Exist!");
                        //alert("Already Exist");
                     }
                     else
                     {
                      $("#btnsubmit").prop('disabled', false);
                      $("#duperrorcode").html("");
                     }
                   }
          });
    });
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
    $('#AddZone').validate({
      rules:
      {
        txtstateid:
        {
          required:true
        },
        txtcityid:
        {
          required:true
        },
        txtzonename:
        {
          required:true
        },
        txtzonecode:
        {
          required:true
        }
      },
      messages:
      {
        txtstateid:
        {
          required:"Please Select State"
        },
        txtcityid:
        {
          required:"Please Select City"
        },
        txtzonename:
        {
          required:"Please Enter Zone Name"
        },
        txtzonecode:
        {
          required:"Please Enter Zone Code"
        }
      }
    });
  </script>


</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
