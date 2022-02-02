<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-map-marker-multiple menu-icon"></i>
        <span class="menu-title">Location</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="viewState.php">View State</a></li>
          <li class="nav-item"> <a class="nav-link" href="viewCity.php">View City</a></li>
          <li class="nav-item"> <a class="nav-link" href="viewZone.php">View Zone</a></li>
        </ul>
      </div>
    </li>
    <?php
    if($_SESSION["type"]=="police")
    {
    ?>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
        <i class="mdi mdi-security menu-icon"></i>
        <span class="menu-title">Police Station</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-advanced">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="viewpoliceRegistration.php">Police Station</a></li>
          <li class="nav-item"> <a class="nav-link" href="viewsubPoliceRegistration.php">Police Sub User</a></li>
        </ul>
      </div>
    </li>
    <?php } ?>
    
    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#fir" aria-expanded="false" aria-controls="editors">
              <i class="mdi mdi-book-open-page-variant menu-icon"></i>
              <span class="menu-title">FIR</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="fir">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="viewCategory.php">Category</a></li>
                <li class="nav-item"><a class="nav-link" href="viewsubCategory.php">Sub Category</a></li>
                <li class="nav-item"><a class="nav-link" href="viewFIR.php">FIR</a></li>
                <li class="nav-item"><a class="nav-link" href="viewFIRlog.php">FIR Log</a></li>
              </ul>
            </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="crimemap.php">
        <i class="mdi mdi-map-marker menu-icon"></i>
        <span class="menu-title">Crime Map</span>
      </a>
    </li>
    <?php
    if($_SESSION["type"]=="police")
    {
    ?>
    <li class="nav-item">
      <a class="nav-link" href="preservehome.php">
        <i class="mdi mdi-security-home menu-icon"></i>
        <span class="menu-title">Preserve Home</span>
      </a>
    </li>
  <?php } ?>
    <li class="nav-item">
      <a class="nav-link" href="viewmissingperson.php">
        <i class="mdi mdi-account-remove menu-icon"></i>
        <span class="menu-title">Missing Person</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="viewwantedperson.php">
        <i class="mdi mdi-account-alert menu-icon"></i>
        <span class="menu-title">Wanted Person</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="viewuser.php">
        <i class="mdi mdi-account-circle menu-icon"></i>
        <span class="menu-title">User</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="viewvehicles.php">
        <i class="mdi mdi-motorbike menu-icon"></i>
        <span class="menu-title">Vehicles</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="charts.php">
        <i class="mdi mdi-chart-bar menu-icon"></i>
        <span class="menu-title">Charts</span>
      </a>
    </li>
    
    
    <li class="nav-item">
      <a class="nav-link" href="viewemergencynumber.php">
        <i class="mdi mdi-phone menu-icon"></i>
        <span class="menu-title">Emergency Numbers</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="viewtips.php">
        <i class="mdi mdi-lightbulb-on menu-icon"></i>
        <span class="menu-title">Tips</span>
      </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#utility" aria-expanded="false" aria-controls="editors">
          <i class="mdi mdi-apps menu-icon"></i>
          <span class="menu-title">Utility</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="utility">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="viewact.php">Act</a></li>
            <li class="nav-item"><a class="nav-link" href="viewnews.php">News</a></li>
            <li class="nav-item"><a class="nav-link" href="viewfeedback.php">Feedback</a></li>
          </ul>
        </div>
    </li>
  </ul>
</nav>