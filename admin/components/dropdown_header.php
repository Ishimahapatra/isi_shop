<div class="dropdown">
  <button class="btn btn-sm btn-label-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    More
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'appointment.php' ? 'active' : '') ?>" href="<?= $baseurl ?>admin/appointment.php">Appointment</a>
    <a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'today_appointment.php' ? 'active' : '') ?>" href="<?= $baseurl ?>admin/today_appointment.php">Today Appointment</a>
  </div>
  <?php echo (basename($_SERVER['PHP_SELF']) == 'appointment.php' ? '<a type="button" class="btn btn-primary btn-sm" data-coreui-toggle="modal" data-coreui-target="#appointmentModal"><i class="fa fa-plus"></i> Add</a>' : '') ?>
  
</div>
