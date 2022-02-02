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


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/charts/morris.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:47 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Charts Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
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
     <?php include 'settingpanel.php';?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'navbar.php';?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php
                    $url = "http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate";
                    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                    echo $my_array_of_vars['v']; 

                      // Output: C4kxS1ksqtw
                    ?>

                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $my_array_of_vars['v']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                  <h4 class="card-title">Pie chart</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Scatter chart</h4>
                  <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              #
                            </th>
                            <th>
                              <?php echo generateRandomString(); ?>
                              Category Name
                            </th>
                            <th>
                              Total FIR
                            </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count=1;
                         
                          $result1=mysqli_query($conn,"select * from tbl_subcategory")or die(mysqli_error($conn));
                          while($item=mysqli_fetch_assoc($result1))
                          {
                            
                          ?>
                          <tr>
                            <td>
                              <?php echo $count;$count++; ?>
                            </td>
                            <td>
                              <?php
                              $result2=mysqli_query($conn,"select * from tbl_subcategory");
                               echo $item["subcat_name"]; 
                               $x=$item["subcat_id"];
                              ?>
                            </td>
                            <td>
                              <?php
                              $result=mysqli_query($conn,"select * from tbl_fir where subcat_id='".$x."'");
                              $n=0;
                                while(mysqli_fetch_assoc($result))
                                {
                                  $n=$n+1;
                                }
                                echo $n;
                              ?>
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
        <?php
        function generateRandomString($length = 30) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        ?>
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
  <?php include 'notificationscript.php';?>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
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
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
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
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/charts/morris.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:48 GMT -->
</html>
