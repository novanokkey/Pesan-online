<?php
  date_default_timezone_set('Asia/Jakarta');
  $tanggal = date('d-m-Y');
?>
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>SHOP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php
           
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../img/user/user.jpg" width="10%" alt="<?php echo $currentUser['email']; ?>" class="user-image" data-lock-picture="../img/user/user.jpg" />
             
              <span class="hidden-xs"><?php echo $currentUser['email']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              

              <li class="user-header">
                  <img src="../img/user/user.jpg" alt="<?php echo $currentUser['email']; ?>" class="img-circle" data-lock-picture="../img/user/user.jpg" />
                
                <p>
                  <?php echo $currentUser['email']; ?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                   
                  </div>
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="user?aksi=edit&id=<?php echo $currentUser['email']; ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>