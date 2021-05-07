<template>
  <div class="container">
    <div class="row">
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-2">
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
            <span class="info-box-text">Pessoas Encontradas</span>
            <span class="info-box-number" id="p_encontradas"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    <!-- /.col -->
    </div>
    <div class="row">
      <div class="Chart col-sm-12">
        <h2>Relatorios</h2>
        <line-example></line-example>
      </div>
    </div>
  </div>
</template>

<script>
import LineExample from "./Charts/LineChartGestor.js";
export default {
  name: "tes",
  components: {
    LineExample
  },

  methods: {
    estatisticas() {
      axios.get("api/dash_gestor").then(({ data }) => {
        document.getElementById("p_perdidas").innerHTML = data.pessoasPerdidas;
        document.getElementById("p_encontradas").innerHTML = data.pessoasEncontradas;
      });
    }
  },
  created() {
    this.estatisticas();
  }
};
</script>
