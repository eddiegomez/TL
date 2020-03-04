<template>
      <div class="container">
    <div class="row">
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1">
            <i class="nav-icon fas fa-cog"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Pessoas perdidas</span>
            <span class="info-box-number">1</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1">
            <i class="fa fa-shopping-cart"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Utilizadores</span>
            <span class="info-box-number">2</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1">
            <i class="fa fa-users"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Centros de Acolhimento</span>
            <span class="info-box-number">3</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1">
            <i class="fa fa-home"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Gestores dos centros</span>
            <span class="info-box-number">1</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- /.col -->
    </div>

  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
