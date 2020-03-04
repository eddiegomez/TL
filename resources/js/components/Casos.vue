<template>
  <div class="row">
    <!-- Divider -->
    <hr />
    <div class="col-sm-7"></div>
    <div class="col-sm-5">
      <div class="card-tools right" style="position: relative; bottom: 12px;">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTabela">
          Lista de Casos
          <i class="fa fa-list"></i>
        </button>
        <button class="btn btn-success" data-toggle="modal" data-target="#addusers">
          Registar Pessoa Perdida
          <i class="fa fa-user-plus fa-fw"></i>
        </button>
      </div>
    </div>

    <!-- Divider -->
    <hr />
    <br />
    <div v-for="pessoa_perdida in pessoas_perdidas" :key="pessoa_perdida.idpessoa_perdida">
      <div class="col-12 col-md-12" style="position:relative;top: 5px; left: 5px">
        <div class="card col-md-12">
          <div class="card-body">
            <div
              class="row"
              style="background-color:#3C8DBC; height:4px; top:-20px; position:relative"
            ></div>
            <div class="box box-primary">
              <div class="box-body box-profile">
                <br />
                <center>
                  <img
                    class="profile-user-img img-responsive img-circle"
                    src="/imagens/profile_2.png"
                    alt="User profile picture"
                  />
                </center>
                <h3 class="profile-username text-center">{{pessoa_perdida.nome}}</h3>

                <p class="text-muted text-center">{{pessoa_perdida.created_at}}</p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-calendar"></i> Nascimento
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >{{pessoa_perdida.data_nascimento}}</a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-home"></i> Centro
                    </b>
                    <a class="text-muted pull-right" style="float:right">6a Esquadra</a>
                  </li>
                  <li class="list-group-item">
                    <b>
                      <i class="text-muted fas fa-map-marker"></i>
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >Maputo, Av. Acordos de Lusaka N. 1101</a>
                  </li>
                </ul>
                <div class style="margin: 15px; position: relative">
                  <a href="#ver" class="btn btn-primary btn-block">
                    <b style="color:white">Mais Detalhes</b>
                  </a>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div> 
    
  </div>
</template>

<script>
export default {
  data() {
    return {
      pessoas_perdidas: null,
      form: new Form({
        titulo: "",
        descricao: "",
        estado: "",
        prazo: "",
        photo: "",
        doc: ""
      })
    };
  },
  methods: {
    buscarCasos() {
      axios.get("api/pessoa_perdida").then(({ data }) => {
        this.pessoas_perdidas = data.pessoas_perdidas;
      });
    },
    verDetalhes(pessoa_perdida) {
      this.form.reset();
      $("#ver").modal("show");
      this.form.fill(pessoa_perdida);
    }
  },
  created() {
    this.buscarCasos();
  }
};
</script>
