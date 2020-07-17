<template>
  <div class="row">
    <hr />
    <div class="col-sm-7"></div>
    <div class="col-sm-5">
      <div class="card-tools" style="position: relative; top: 8px;right:0px">
        
      </div>
    </div>
    <!-- Divider -->
    <hr />
    <br />
    <div
      v-for="pessoa_perdida in pessoas_encontradas"
      :key="pessoa_perdida.idpessoa_perdida"
      style="position:relative;left: 35px;"
    >
      <div class="col-12 col-md-12" style="position:relative;top: 15px;">
        <div class="card col-md-12" style="width:370px">
          <div class="card-body">
            <div
              class="row"
              style="background-color:#3C8DBC; height:4px; top:-20px; position:relative"
            ></div>
            <div class="box box-primary">
              <div class="box-body box-profile">
                <br />
                <center>
                  <!--<img
                    class="profile-user-img img-responsive img-circle"
                    src="/imagens/pessoas_perdidas/pp5.jpg"
                    alt="User profile picture"
                  />-->
                  <a href="#" @click="ver_foto(pessoa_perdida)">
                    <img
                      :src="'/imagens/pessoas_perdidas/'+ pessoa_perdida.foto"
                      class="profile-user-img img-responsive img-circle"
                      style="height: 140px;width: 140px"
                    />
                  </a>
                </center>
                <h3 class="profile-username text-center">{{pessoa_perdida.nome + " " + pessoa_perdida.apelido}}</h3>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-calendar"></i> Nascimento
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >{{pessoa_perdida.data_nascimento | myDate}}</a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-map"></i> Naturalidade
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >{{pessoa_perdida.nacionalidade}} - {{pessoa_perdida.naturalidade}}</a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-clock"></i> Registo
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >{{pessoa_perdida.criacao | myDate}}</a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-clock"></i> Desfecho
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >{{pessoa_perdida.desfecho | myDate}}</a>
                  </li>
                </ul>
                <div class style="margin: 15px; position: relative">
                  <center>
                    <div class="col-sm-6">
                      <a href="#" @click="detalhes(pessoa_perdida)">
                        <button class="btn curved btn-primary btn-block">
                          <b style="color:white">Detalhes</b>
                        </button>
                      </a>
                    </div>
                  </center>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Modal MOSTRAR FOTO-->
    <div
      class="modal fade"
      id="foto"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered"
        role="document"
        style="width: 500px;padding: -20px"
      >
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <img
                  id="ver_foto"
                  :src="'/imagens/pessoas_perdidas/'"
                  class="profile-user-img img-responsive"
                  style="height: 100%;width: 100%; padding: 0px"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->

    <!--Modal DETALHES-->
    <div
      class="modal fade"
      id="detalhes"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document" style="width: 500px">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding: 0px">
            <div class="row">
              <div class="col-md-4">
                <button class="btn" data-toggle="modal" data-target="#foto">
                  <img
                    id="modal_foto"
                    :src="'/imagens/pessoas_perdidas/'"
                    class
                    style="width: 100%"
                  />
                </button>
              </div>
              <div class="col-md-7">
                <h3 class="text-muted pull-right" id="modal_nome"></h3>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-calendar"></i> Nascimento
                    </b>
                    <a class="text-muted pull-right" id="modal_nasc" style="float:right"></a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-home"></i> Naturalidade
                    </b>
                    <a class="text-muted pull-right" id="modal_naturalidade" style="float:right"></a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-clock"></i>
                    </b>
                    <a class="text-muted pull-right" id="modal_data_reg" style="float:right"></a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-clipboard"></i>
                    </b>
                    <a class="text-muted pull-right" id="modal_obs" style="float:right"></a>
                  </li>
                </ul>
              </div>
            </div>
           
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn curved btn-primary">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      pessoas_encontradas: null,
      form: new Form({
        nome: "",
        apelido: "",
        alcunha: "",
        data_nascimento: "",
        nacionalidade: "",
        naturalidade: "",
        photo: "",
        descricao: ""
      })
    };
  },
  methods: {
    ver_foto(pessoa_perdida) {
      var image = document.getElementById("ver_foto");
      image.src = "/imagens/pessoas_perdidas/" + pessoa_perdida.foto;
      $("#foto").modal("show");
    },
    detalhes(pessoa_perdida) {
      var image = document.getElementById("modal_foto");
      image.src = "/imagens/pessoas_perdidas/" + pessoa_perdida.foto;
      document.getElementById("modal_nome").innerHTML = pessoa_perdida.nome + " " + pessoa_perdida.apelido;
      document.getElementById("modal_nasc").innerHTML =
        pessoa_perdida.data_nascimento;
      document.getElementById("modal_naturalidade").innerHTML =
        pessoa_perdida.naturalidade;
      document.getElementById("modal_data_reg").innerHTML =
        pessoa_perdida.created_at;
      document.getElementById("modal_obs").innerHTML = pessoa_perdida.obs;
      $("#detalhes").modal("show");
    },
    buscarCasos() {
      axios.get("api/pessoa_perdida").then(({ data }) => {
        this.pessoas_encontradas = data.pessoas_encontradas;
      });
    },
    verDetalhes(pessoa_perdida) {
      this.form.pessoas_perdidas = pessoa_perdida;
      $("#detalhes").modal("show");
    }
  },
  created() {
     Fire.$on('searching', () =>{
      let query = this.$parent.search;
      axios.get('api/find?q=' + query)
      .then((data) => {
        this.pessoas_perdidas = data.data;
      });
    })
    this.buscarCasos();
  }
};
</script>
 