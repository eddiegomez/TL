<template>
  <div class="container">
    <div class="row">
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-2">
            <i class="fa fa-users"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Utilizadores</span>
            <span class="info-box-number" id="utilizadores"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
 
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-2">
            <i class="nav-icon fas fa-users"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Pessoas perdidas</span>
            <span class="info-box-number" id="p_perdidas"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-2">
            <i class="nav-icon fas fa-users"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Pessoas Encotradas</span>
            <span class="info-box-number" id="p_encontradas"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-2">
            <i class="fa fa-home"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Centros de Acolhimento</span>
            <span class="info-box-number" id="centros"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-2">
            <i class="fa fa-user-cog"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Gestores dos centros</span>
            <span class="info-box-number" id="gestores"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- /.col -->
    </div>
    <div class="row">
      <div class="Chart col-sm-12">
        <h2>Casos de desaparecimento</h2>
        <line-example></line-example>
      </div>
    </div>
  </div>
</template>

<script>
import LineExample from "./Charts/LineChart.js";
export default {
  name: "tes",
  components: {
    LineExample
  },

  methods: {
    estatisticas() {
      axios.get("api/dash").then(({ data }) => {
        document.getElementById("p_perdidas").innerHTML = data.pessoasPerdidas;
        document.getElementById("p_encontradas").innerHTML = data.pessoasEncontradas;
        document.getElementById("centros").innerHTML = data.centros;
        document.getElementById("utilizadores").innerHTML = data.utilizadores;
        document.getElementById("gestores").innerHTML = data.gestores;
        //document.getElementById("normal_user").innerHTML = data.normal_user;
      });
    }
  },
  created() {
    this.estatisticas();
  }
};
</script>
