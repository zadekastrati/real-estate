</head>

<body>
  <div class="header2 padding-lr-100" style="margin-right: 10px;">
    <!-- Main Content Section -->
    <div class="menu" style="margin-top:0 !important;">
      <a href="admin_dashboard.php"
        class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admin_dashboard.php') ? 'active' : ''; ?>">Dashboard</a>
      <a href="admin_properties.php"
        class="<?php echo (basename($_SERVER['PHP_SELF']) == 'admin_properties.php') ? 'active' : ''; ?>">Your
        properties</a>
      <div class="dropdown" style="display: inline;">
        <button class="dropdown-button btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../auth/logout.php" style="padding: 0 5px 0 5px;">Log out</a></li>
        </ul>
      </div>
    </div>
  </div>