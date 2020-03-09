
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SGPP</title>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel = "stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id = "app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
     
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
          
      <span class="brand-text font-weight-light">SGPP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/imagens/profile_2.png" class="img-circle" style="height:35px;width:35px" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?php echo e(Auth::user()->name); ?>

          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-blue"></i>
              <p>
                Estratísticas
                <span class="right badge badge-danger">Novo</span>
              </p>
            </a>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tv "></i>
              <p>
                Publicidades
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Meus serviços</p>
                </a>
              </li>
                
            </ul>


            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link"> 
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Adicionar</p>
                </a>
              </li>
                
            </ul>
          </li>

          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Developer
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Perfil
              </p>
            </a>
          </li>
          

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-power-off red"></i>
              <p>
                <?php echo e(__('Logout')); ?>

              </p>
            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
            </form>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Página Inicial</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">SGPP</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>
  localStorage.setItem('user_id', <?php echo e(Auth::user()->id); ?>);
</script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/app.js"></script>
</body>
</html>
<?php /**PATH D:\EDDY\PROJECTOS\trabalho\resources\views/layouts/master2.blade.php ENDPATH**/ ?>