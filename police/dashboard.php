<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
   echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'checksession.php'; ?>
<?php include 'enc.php'; ?>
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:24:40 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard - Poilce Station</title>
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
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body class="sidebar-mini">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "header.php";
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
     <?php include 'settingpanel.php'; ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     <?php include "navbar.php";
     ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-3 col-md-6 grid-margin stretch-card hand-pointer" onclick="window.location='viewFIR.php';">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div class="img-sm bg-primary rounded-md d-flex align-items-center justify-content-center text-white">
                      <i class="mdi mdi-book-open-page-variant  icon-md"></i>
                    </div>
                    <div class="text-right text-md-center text-lg-left ml-lg-4">
                      <h1 class="font-weight-bold mb-0" align="right">
                      <?php
                      if($_SESSION["type"]=='police')
                      {
                        $result=mysqli_query($conn,"select * from tbl_fir where policestation_id='".$_SESSION["id"]."'") or die(mysqli_error($conn));
                      }
                      else
                      {
                        $result=mysqli_query($conn,"select f.*,s.subcat_name,p.policestation_name from tbl_fir as f left join tbl_subcategory as s on f.subcat_id=s.subcat_id left join tbl_policestation as p on f.policestation_id=p.policestation_id where p_userid='".$_SESSION["id"]."'");
                      }
                      
                      echo mysqli_num_rows($result);
                      ?>
                      </h1>
                      <p class="mb-0">FIR</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 grid-margin stretch-card hand-pointer" onclick="window.location='viewsubPoliceRegistration.php';">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div class="img-sm bg-danger rounded-md d-flex align-items-center justify-content-center text-white">
                      <i class="mdi mdi-account-key icon-md"></i>
                    </div>
                    <div class="text-right text-md-center text-lg-left ml-lg-4">
                      <h1 class="font-weight-bold mb-0" align="right">
                       <?php
                        $result=mysqli_query($conn,"select * from tbl_policestation_subuser where policestation_id='".$_SESSION["id"]."'") or die (mysqli_error($conn));
                        echo mysqli_num_rows($result);
                        ?>
                      </h1>
                      <p class="mb-0">Total Police </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 grid-margin stretch-card hand-pointer" onclick="window.location='viewmissingperson.php';">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div class="img-sm bg-primary rounded-md d-flex align-items-center justify-content-center text-white">
                      <i class="mdi mdi-account-remove icon-md"></i>
                    </div>
                    <div class="text-right text-md-center text-lg-left ml-lg-4">
                      <h1 class="font-weight-bold mb-0" align="right">
                        <?php
                        $result=mysqli_query($conn,"select * from tbl_policestation as p left join tbl_zone as z on p.zone_id=z.zone_id left join tbl_city as c on z.city_id=c.city_id left join tbl_missing_person as m on c.city_id=m.city_id where policestation_id='".$_SESSION["id"]."'") or die (mysqli_error($conn));
                        echo mysqli_num_rows($result);
                      ?>
                      </h1>
                      <p class="mb-0">Missing Person</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 grid-margin stretch-card hand-pointer" onclick="window.location='viewvehicles.php';">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div class="img-sm bg-danger rounded-md d-flex align-items-center justify-content-center text-white">
                      <i class="mdi mdi-motorbike icon-md"></i>
                    </div>
                    <div class="text-right text-md-center text-lg-left ml-lg-4">
                      <h1 class="font-weight-bold mb-0" align="right">
                        <?php
                        $result=mysqli_query($conn,"select * from tbl_vehicles where policestation_id='".$_SESSION["id"]."'") or die (mysqli_error($conn));
                        echo mysqli_num_rows($result);
                      ?>
                      </h1>
                      <p class="mb-0">Stolen Vehicles</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">News feed</h4>
                  <ul class="bullet-line-list">
                    <?php
                      $date=date('Y-m-d');
                      $result=mysqli_query($conn,"select * from tbl_news where enddate<='".$date."' ORDER BY news_id DESC LIMIT 4");
                      while($row=mysqli_fetch_assoc($result))
                      {

                      ?>
                        <li>
                          <p class="text-muted mb-2"><?php echo date('d F Y',strtotime($row["startdate"])); ?></p>
                          <p><?php echo $row["title"]; ?></p>
                        </li>
                        <?php
                      }
                        ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body d-flex flex-column justify-content-between">
                  <h4 class="card-title">Category wise Crime Report </h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recent FIR</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Title of FIR
                          </th>
                          <th>
                            Complainer
                          </th>
                          <th>
                            Incharge
                          </th>
                          <th>
                            Remarks
                          </th>
                        </tr>
                      </thead>
                      <?php
                      $cnt=1;
                      $result=mysqli_query($conn,"select f.*,p.policestation_id,s.pname from tbl_fir as f left join tbl_policestation_subuser as s on f.p_userid=s.p_userid left join tbl_policestation as p on s.policestation_id=p.policestation_id where p.policestation_id='".$_SESSION["id"]."' ORDER BY fir_id DESC LIMIT 6");
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                      <tbody>
                        <tr>
                          <td>
                            <?php echo $cnt;$cnt++; ?>
                          </td>
                          <td>
                            <?php echo $row["title"] ?>
                          </td>
                          <td>
                            <?php echo $row["cname"] ?>
                          </td>
                          <td>
                            <?php echo $row["pname"] ?>
                          </td>
                          <td>
                            <label <?php if($row["status"]=="Pending") { ?> class="badge badge-danger" <?php } elseif($row["status"]=="In Process") { ?> class="badge badge-primary" <?php } elseif($row["status"]=="Complete") { ?> class="badge badge-success" <?php } ?>
                            >
                              <?php echo $row["status"] ?>
                                
                              </label>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                    }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recent Missing Person</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <?php
                        $result=mysqli_query($conn,"select * from tbl_policestation as p left join tbl_zone as z on p.zone_id=z.zone_id left join tbl_city as c on z.city_id=c.city_id left join tbl_missing_person as m on c.city_id=m.city_id where policestation_id='".$_SESSION["id"]."'");
                        while($row=mysqli_fetch_assoc($result))
                        {
                        ?>
                        <tr>
                          <td>
                            <img src="uploads/missing/<?php echo $row["mphoto"] ?>" alt="icon"/>
                          </td>
                          <td>
                            <p><?php echo $row["mname"]; ?></p>
                            <p class="text-muted mb-0"><?php echo $row["zone_name"]; ?></p>
                          </td>
                          <!-- <td class="text-primary"> 
                            <?php echo date('d-F-Y',strtotime($row["missingdate"])); ?>
                          </td> -->
                          <td>
                            <button type="button" class="btn btn-social-icon btn-outline-linkedin" onclick="window.location='missingprofileex.php?id=<?php echo my_simple_crypt($row["pid"],'e'); ?>'"><i class="mdi mdi-eye"></i></button>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "footer.php"
        ?>
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
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>

  <script>
     var doughnutPieData = {
    datasets: [{
      data: [
      <?php
     $result=mysqli_query($conn,"select s.*,(select count(*) from tbl_fir where subcat_id=s.subcat_id) as TotalFir from tbl_subcategory as s");
    while($row=mysqli_fetch_assoc($result))
    {
    ?>
      <?php echo $row["TotalFir"]; ?>,

      <?php } ?> 
      ],
      backgroundColor: [
        'rgba(99, 62, 119, 1)',
        'rgba(225, 73, 121, 1)',
        'rgba(9, 132, 227, 1)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
    <?php
     $result=mysqli_query($conn,"select * from tbl_subcategory ");
    while($row=mysqli_fetch_assoc($result))
    {
    ?>
      '<?php echo $row["subcat_name"] ?>' ,
    <?php } ?>
    ]
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
     if ($("#pieChart").length) {
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  </script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:07 GMT -->
</html>

