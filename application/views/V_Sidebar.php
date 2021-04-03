  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('about'); ?>" class="brand-link text-center">
          <img src="<?= base_url('assets/'); ?>img/logo/logo-rectangle-white.svg" alt="Logo Yeagerist" style="height: 50px;">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <?php $user['PROFILE_PICTURE'] == 'default.png' ? $image = $user['PROFILE_PICTURE'] : $image = $user['ID'] . $user['PROFILE_PICTURE'] ;?>
                  <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block profile-name"><?= $user['NAME']; ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="<?= $this->session->userdata('role_id') == 0 ? base_url('admin') : base_url('dashboard')  ;?>" class="nav-link">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Home
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('about'); ?>" class="nav-link">
                          <i class="nav-icon fas fa-question"></i>
                          <p>
                              About
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>