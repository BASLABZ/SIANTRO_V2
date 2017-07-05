<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>U</b>GM</span>
      <span class="logo-lg"><b>SIANTRO</b>UGM</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/admin.gif" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['operator_username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="img/<?php echo $_SESSION['operator_image']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['operator_username']; ?> - <?php echo $_SESSION['level_name']; ?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                <!-- ketoknya di button ini di selipin ID getoooh -->
                <?php
                    // $varId=$_SESSION['operator_id'];
                 ?>
                  <a href="index.php?hal=master/pengguna/profil" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="index.php?logout=1" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <script>
    $(document).ready(function(){
      $(".dropdown-toggle").dropdown();
    }); 
  </script>