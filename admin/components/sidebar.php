<!-- As a link -->
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <button id="sidebarToggle" class="p-2 mx-2 text-primary border-0 bg-transparent"><i class="fa-solid fa-bars"></i></button>
  </div>
</nav>
<div class="sidebar border-end" id="sidebar" style="z-index: 999;">
  <div class="sidebar-header border-bottom py-0">
    <div class="sidebar-brand">
      <div class="nav-logo">
        <a href="<?= $baseurl ?>index.html">
          <img src="<?= $baseurl ?>img/logo.png" alt="Logo" style="width: 90px; height: auto;">
        </a>
      </div>
    </div>
    <!-- Close Sidebar Button -->
    <button id="closeSidebarBtn" class="btn btn-transparent btn-sm text-primary"><i class="fa-solid fa-xmark"></i></button>
  </div>
  <ul class="sidebar-nav">
    <li class="nav-title">Nav Title</li>
    <li class="nav-item">
      <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : '' ?>" href="<?= $baseurl ?>admin/dashboard.php">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'products.php') ? 'active' : '' ?>" href="<?= $baseurl ?>admin/products.php">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'customers.php') ? 'active' : '' ?>" href="<?= $baseurl ?>admin/customers.php">Customers</a>
    </li>
  </ul>
  <div class="sidebar-footer border-top d-flex">
    <a class="text-decoration-none" href="<?= $baseurl ?>controller/auth/logout.php">Logout</a>
  </div>
</div>