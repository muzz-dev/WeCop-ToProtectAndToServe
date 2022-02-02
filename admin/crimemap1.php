<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Crime Map - Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/flag-icon.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/simple-line-icons.css">
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/icheck/skins/all.html">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/favicon.png" />
  

    <!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
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
      <?php include 'navbar.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
             <!-- <div id="map_canvas" style="width: 800px; height:500px;"></div>-->
             <div id="map" style="width: 100%; height: 600px;"></div> 
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClJ7bohWjfhtUsd71UVKXfsu48-Wq5O5s" type="text/javascript"></script>
        
 <script type="text/javascript">
    var locations = [
     <?php
                      $count=1;
                      $result=mysqli_query($conn,"select f.fir_id,f.landmark,f.latitude,f.longtitude,s.subcat_name,s.subcat_image,x.policestation_name,p.pname from tbl_fir as f left join tbl_subcategory as s on f.subcat_id=s.subcat_id left join tbl_policestation as x on f.policestation_id=x.policestation_id left join tbl_policestation_subuser as p on f.p_userid=p.p_userid and f.latitude!=NULL and f.longtitude!=NULL") or die(mysqli_error($conn));
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
 ['<?php echo $row["landmark"] ?>', <?php echo $row["latitude"] ?>, <?php echo $row["longtitude"]; ?>,'<?php echo $row["subcat_image"] ?>', '<?php echo $row["policestation_name"] ?>'],
    <?php } ?>
     ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(21.1702, 72.8311),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon:"uploads/subcategory/"+locations[i][3]
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

       <!--  <script type="text/javascript">
        // check DOM Ready
        $(document).ready(function() {
            // execute
            (function() {
                // map options
                var options = {
                    zoom: 5,
                    center: new google.maps.LatLng(21.170240, 72.831062), // centered US
                    mapTypeId: google.maps.MapTypeId.TERRAIN,
                    mapTypeControl: false
                };

                // init map
                var map = new google.maps.Map(document.getElementById('map_canvas'), options);

                // NY and CA sample Lat / Lng
                var southWest = new google.maps.LatLng(21.170240);
                var northEast = new google.maps.LatLng(72.831062);
                var lngSpan = northEast.lng() - southWest.lng();
                var latSpan = northEast.lat() - southWest.lat();


 // for (i = 0; i < locations.length; i++) {  
 //      marker = new google.maps.Marker({
 //        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
 //        map: map
 //      });

 //      google.maps.event.addListener(marker, 'click', (function(marker, i) {
 //        return function() {
 //          infowindow.setContent(locations[i][0]);
 //          infowindow.open(map, marker);
 //        }
 //      })(marker, i));
 //    }



                // set multiple marker
               <?php
                      $count=1;
                      $result=mysqli_query($conn,"select f.fir_id,f.landmark,f.latitude,f.longtitude,s.subcat_name,x.policestation_name,p.pname from tbl_fir as f left join tbl_subcategory as s on f.subcat_id=s.subcat_id left join tbl_policestation as x on f.policestation_id=x.policestation_id left join tbl_policestation_subuser as p on f.p_userid=p.p_userid and f.latitude!=NULL and f.longtitude!=NULL") or die(mysqli_error($conn));
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>

                      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $row["latitude"]; ?>,<?php echo $row["longtitude"]; ?>),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, <?php echo $count; ?>) {
        return function() {
          infowindow.setContent(<?php echo $row["fir_id"]; ?>);
          infowindow.open(map, marker);
        }
      })(marker, <?php echo $count; ?>));
                   
                 <?php
                 $count++;
                      }
                      ?>   
            })();
        });
        </script> -->
  <!-- End custom js for this page-->
</body>

<?php include 'notificationscript.php';?>
<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:39 GMT -->
</html>
