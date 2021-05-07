
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
  
  <!--Personalizados-->
  <link rel = "stylesheet" href="/perfil/assets/animate.min.css">
  <link rel = "stylesheet" href="/css/bootstrap.min.css">
  <link rel = "stylesheet" href="/perfil/assets/demo.css">
  <link rel = "stylesheet" href="/perfil/assets/light-bootstrap-dashboard.css">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" @keyup="searchit" v-model="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color:#051d39">
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">SGPP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color:#051d39">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/imagens/profile.png" class="img-circle" style="height:35px;width:35px" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?php echo e(Auth::user()->name); ?>

          <?php echo e(session()->put('id_user',Auth::user()->id)); ?>

          <br ><h6 style="color: grey">(<?php echo e(Auth::user()->email); ?>) </h6>
          </a> 
        </div>

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-blue"></i>
              <p>
                Estratísticas 
                <span class="right"><i class="nav-icon fas fa-bell" style="color:red"></i></span>
              </p>
            </router-link>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bookmark"></i>
              <p>
                Pessoas perdidas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/registar" class="nav-link">  
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>Registar</p>
                </router-link>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <router-link to="/casosCentros" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Por centros</p>
                </router-link>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <router-link to="/casosNormalUsers" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Por outros</p>
                </router-link>
              </li>
            </ul>

          </li>
          
          <li class="nav-item nav-treeview">
              <li class="nav-item">
              <router-link to="/encontradas" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Pessoas Encontradas</p>
                </router-link>
              </li>
            </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-map"></i>
              <p>
                Centros
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/reg_centro" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Novo</p>
                </router-link>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/centros" class="nav-link">
                  <i class="nav-icon fas fa-map-marker"></i>
                  <p>Ver Centros</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <router-link to="/gestor" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Gestores
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Perfil
              </p>
            </router-link>
          </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isGestor')): ?>
          <li class="nav-item">
            <router-link to="/dashGestor" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-blue"></i>
              <p>
                Estratísticas
                <span class="right badge badge-danger">Novo</span>
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bookmark"></i>
              <p>
                Casos
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/registar" class="nav-link">  
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>Registar</p>
                </router-link>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <router-link to="/casos" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Pessoas Perdidas</p>
                </router-link>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <router-link to="/encontradas" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Pessoas Encontradas</p>
                </router-link>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <router-link to="/profileGestor" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Perfil
              </p>
            </router-link>
          </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isNormal')): ?>
          <li class="nav-item">
            <router-link to="/registarNormal" class="nav-link">  
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Registar pessoa perdida</p>
            </router-link>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pessoas Perdidas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <router-link to="/casosCentros" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Nos centros</p>
                </router-link>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <router-link to="/casosNormalUsers" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Registado por outros</p>
                </router-link>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <router-link to="/meus" class="nav-link">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>Meus registos</p>
                </router-link>
              </li>
            </ul>
          </li> 
 
          <li class="nav-item">
            <router-link to="/encontradas" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>Pessoas encontradas</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/centros_normal" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>Ver Centros</p>
            </router-link>
          </li>
          
          <li class="nav-item">
            <router-link to="/pesquisa" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>Pesquisa avançada</p>
            </router-link>
          </li>
          <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-power-off red" style="color: red"></i>
              <p>
                Sair
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
    <!-- Main content -->
    <div class="content">
    
      <router-view></router-view>
      <vue-progress-bar></vue-progress-bar>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" style="">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Plataforma de busca de pessoas perdidas
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="#">SGPP</a>.</strong> Sujeito a direitos autorais.
  </footer>
</div>
<!-- ./wrapper -->
<style>
.curved {
  border-radius: 25px;
}
</style>
<script src="/js/app.js"></script>
</body>
</html>
<?php /**PATH D:\EDDY\PROJECTOS\trabalho\resources\views/layouts/master.blade.php ENDPATH**/ ?>