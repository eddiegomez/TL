<template>
  <div class="row">
    <!-- Divider -->
    <hr />
    <div class="col-sm-7"></div>
    <div class="col-sm-5">
      <div class="card-tools right" style="position: relative; bottom: 12px;">
        <button class="btn curved btn-primary" data-toggle="modal" data-target="#modalTabela">
          Lista de Casos
          <i class="fa fa-list"></i>
        </button>
        <button class="btn curved btn-success" @click="newModal()">
          Registar Pessoa Perdida
          <i class="fa fa-user-plus fa-fw"></i>
        </button>
        <!--<button class="btn curved btn curved-success" data-toggle="modal" data-target="#addusers">
          Registar Pessoa Perdida
          <i class="fa fa-user-plus fa-fw"></i>
        </button>-->
      </div>
    </div>

    <!-- Divider -->
    <hr />
    <br />
    <div v-for="pessoa_perdida in pessoas_perdidas" :key="pessoa_perdida.idpessoa_perdida">
      <div class="col-12 col-md-12" style="position:relative;top: 5px; left: 5px">
        <div class="card col-md-12" style="width:390px">
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
                <h3 class="profile-username text-center">{{pessoa_perdida.nome | upText}}</h3>
                <p class="text-muted text-center">
                  <i class="text-muted fas fa-clock"></i>
                  {{pessoa_perdida.reg}}
                </p>

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
                      <i class="text-muted fas fa-home"></i> Centro
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >{{pessoa_perdida.denominacao}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>
                      <i class="text-muted fas fa-map-marker"></i>
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >{{pessoa_perdida.provincia}} - {{pessoa_perdida.avenida}}, {{pessoa_perdida.numero}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>
                      <i class="text-muted fas fa-phone"></i>
                    </b>
                    <a
                      class="text-muted pull-right"
                      style="float:right"
                    >+258 {{pessoa_perdida.celular}}</a>
                  </li>
                </ul>
                <div class style="margin: 15px; position: relative">
                  <center>
                    <a href="#" @click="editModal(pessoa_perdida)">
                      <i class="fa fa-edit"></i>
                    </a>
                  </center>
                  <div class="row">
                    <div class="col-sm-6">
                      <a href="#" @click="detalhes(pessoa_perdida)">
                        <button class="btn curved btn-primary btn-block">
                          <b style="color:white">Detalhes</b>
                        </button>
                      </a>
                    </div>
                    <div class="col-sm-6">
                      <a
                        href="#"
                        @click="desfecho(pessoa_perdida)"
                        class="btn curved btn-success btn-block"
                      >
                        <b style="color:white">Desfecho</b>
                      </a>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal REGISTAR E EDITAR-->
    <div
      class="modal fade"
      id="registarCaso"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="editmode" class="modal-title" id="exampleModalLabel">Actualizar dados</h5>
            <h5
              v-show="!editmode"
              class="modal-title"
              id="exampleModalLabel"
            >Registar pessoa perdida</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updt(): publicarCaso()">
            <div class="modal-body">
              <div class="row">
                  <div class="form-group">
                    <input
                      v-model="form.id"
                      type="number"
                      hidden
                      name="id"
                      :class="{ 'is-invalid': form.errors.has('id') }"
                    />
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="text-muted">Apelido</label>
                    <input
                      placeholder="Apelido"
                      v-model="form.apelido"
                      type="text"
                      name="apelido"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('apelido') }"
                    />
                    <has-error :form="form" field="apelido"></has-error>
                  </div>
                </div>

                <div class="col-sm-9">
                  <div class="form-group">
                    <label class="text-muted">Nome</label>
                    <input
                      placeholder="Nome"
                      v-model="form.nome"
                      type="text"
                      name="nome"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('nome') }"
                    />
                    <has-error :form="form" field="nome"></has-error>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="text-muted">Outros nomes</label>
                    <input
                      placeholder="Opcional"
                      v-model="form.alcunha"
                      type="text"
                      name="alcunha"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('alcunha') }"
                    />
                    <has-error :form="form" field="alcunha"></has-error>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label class="text-muted">D. Nascimento</label>
                    <input
                      v-model="form.data_nascimento"
                      type="date"
                      name="data_nascimento"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('data_nascimento') }"
                    />
                    <has-error :form="form" field="data_nascimento"></has-error>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="text-muted">Genero</label>
                    <select
                      class="form-control curved"
                      v-model="form.genero"
                      type="text"
                      name="genero"
                      :class="{ 'is-invalid': form.errors.has('genero') }"
                    >
                      <option value="Masculino">Masculino</option>
                      <option value="Feminino">Feminino</option>
                    </select>
                    <has-error :form="form" field="genero"></has-error>
                  </div>
                </div>
              </div>``
              <div class="row">
                <div class="col-sm-8">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted">Nacionalidade</label>
                        <input
                          placeholder="País"
                          v-model="form.nacionalidade"
                          type="text"
                          name="nacionalidade"
                          class="form-control curved"
                          :class="{ 'is-invalid': form.errors.has('nacionalidade') }"
                        />
                        <has-error :form="form" field="nacionalidade"></has-error>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="text-muted">Naturalidade</label>
                        <input
                          placeholder="Provincia"
                          v-model="form.naturalidade"
                          type="text"
                          name="naturalidade"
                          class="form-control curved"
                          :class="{ 'is-invalid': form.errors.has('naturalidade') }"
                        />
                        <has-error :form="form" field="naturalidade"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="photo" class="col-sm-10 text-muted">Fotografia</label>
                        <input type="file" @change="gravarFoto" name="photo" class="form-input" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <img
                    class="profile-user-img img-responsive"
                    src="/imagens/pessoas_perdidas/default.png"
                    alt="User profile picture"
                    style="height:140px; width: 135px"
                    id="uploading_photo"
                  />
                </div>
              </div>

              <div class="form-group">
                <label class="text-muted">Informação adicional</label>
                <textarea
                  placeholder="Depoimento da pessoa perdida ou alguma informação adicional"
                  rows="2"
                  v-model="form.descricao"
                  type="text"
                  name="descricao"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('descricao') }"
                ></textarea>
                <has-error :form="form" field="descricao"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn curved btn-danger" data-dismiss="modal">Descartar</button>
              <a
                href="#"
                @click="actualizar()"
                class=""
              >
                <button v-show="editmode" class="btn curved btn-success">Actualizar</button>
              </a>
              <button v-show="!editmode" type="submit" class="btn curved btn-primary">Gravar</button>
            </div>
          </form>
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
                <button class="btn curved" data-toggle="modal" data-target="#foto">
                  <img
                    id="modal_foto"
                    :src="'/imagens/pessoas_perdidas/'"
                    class
                    style="width: 100%"
                  />
                </button>
                <center>
                  <h3 class="text-muted pull-right" id="modal_ID"></h3>
                </center>
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
            <div class="col-md-12">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <br />
                  <center>
                    <h4 class="text-muted pull-right">CENTRO</h4>
                  </center>
                </li>
                <li class="list-group-item">
                  <b class="text-muted">
                    <i class="text-muted fas fa-home"></i> Denominação
                  </b>
                  <a class="text-muted pull-right" id="modalnome_centro" style="float:right"></a>
                </li>
                <li class="list-group-item">
                  <b class="text-muted">
                    <i class="text-muted fas fa-map-marker"></i> Endereço
                  </b>
                  <a class="text-muted pull-right" id="modal_endereco" style="float:right"></a>
                </li>
                <li class="list-group-item">
                  <b class="text-muted">
                    <i class="text-muted fas fa-phone"></i> Celular
                  </b>
                  <a class="text-muted pull-right" id="modal_celular" style="float:right"></a>
                </li>
                <li class="list-group-item">
                  <b class="text-muted">
                    <i class="text-muted fas fa-envelope"></i> Email
                  </b>
                  <a class="text-muted pull-right" id="modal_email" style="float:right"></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" @click="desfecho(pessoa_perdida)" class="btn curved btn-success">
              <b style="color:white">Desfecho</b>
            </a>
            <button data-dismiss="modal" class="btn curved btn-primary" style="float:right">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
  </div>
</template>

<style>
.curved {
  border-radius: 25px;
}
</style>
<script>
export default {
  data() {
    return {
      editmode: false,
      pessoas_perdidas: null,
      form: new Form({
        id: "",
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
    updt(){

    },
    detalhes(pessoa_perdida) {
      var image = document.getElementById("modal_foto");
      image.src = "/imagens/pessoas_perdidas/" + pessoa_perdida.foto;
      document.getElementById("modal_ID").innerHTML =
        "#CP" + pessoa_perdida.idpessoa_perdida;
      document.getElementById("modal_nome").innerHTML = pessoa_perdida.nome;
      document.getElementById("modal_nasc").innerHTML =
        pessoa_perdida.data_nascimento;
      document.getElementById("modal_naturalidade").innerHTML =
        pessoa_perdida.naturalidade;
      document.getElementById("modal_data_reg").innerHTML =
        pessoa_perdida.created_at;
      document.getElementById("modal_obs").innerHTML = pessoa_perdida.obs;
      document.getElementById("modalnome_centro").innerHTML =
        pessoa_perdida.denominacao;
      document.getElementById("modal_endereco").innerHTML =
        pessoa_perdida.provincia +
        "-" +
        pessoa_perdida.avenida +
        "," +
        pessoa_perdida.numero;
      document.getElementById("modal_celular").innerHTML =
        "+258 " + pessoa_perdida.celular;
      document.getElementById("modal_email").innerHTML = pessoa_perdida.email;
      $("#detalhes").modal("show");
    },
    editModal(pessoa_perdida) {
      this.editmode = true;
      this.form.reset();
      var image = document.getElementById("uploading_photo");
      image.src = "/imagens/pessoas_perdidas/" + pessoa_perdida.foto;
      $("#registarCaso").modal("show");
      this.form.fill(pessoa_perdida);
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#registarCaso").modal("show");
    },
    gravarFoto(e) {
      /*var image = document.getElementById("uploading_photo");
      image.src = "/imagens/pessoas_perdidas/"+this.form.foto;*/
      let file = e.target.files[0];
      //extrai os dados da img
      console.log(file);
      let reader = new FileReader();
      reader.onloadend = file => {
        this.form.photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
    actualizar() {
      /*this.$Progress.start();
      this.form
        .put("api/pessoa_perdida" + pessoa_perdida.idpessoa_perdida)
        .then(() => {
          this.$Progress.finish();
          this.buscarCasos();
          this.form.reset();
          $("#registarCaso").modal("hide");
          toast.fire({
            type: "success",
            title: "Actualizações guardadas"
          });
        })
        .catch(() => {
          this.$Progress.fail();
        });*/window.alert(this.form.id);
    },
    publicarCaso() {
      this.$Progress.start();
      this.form
        .post("api/pessoa_perdida")
        .then(() => {
          this.$Progress.finish();
          this.buscarCasos();
          this.form.reset();
          $("#registarCaso").modal("hide");
          toast.fire({
            type: "success",
            title: "Publicado com sucesso"
          });
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    buscarCasos() {
      axios.get("api/pessoa_perdida").then(({ data }) => {
        this.pessoas_perdidas = data.pessoas_perdidas;
      });
    },
    verDetalhes(pessoa_perdida) {
      this.form.pessoas_perdidas = pessoa_perdida;
      $("#detalhes").modal("show");
    },

    desfecho(pessoa_perdida) {
      swal
        .fire({
          icon: "warning",
          title: "Confirme a operação",
          text: "Tem certeza que pretende dar o desfecho do caso?",
          type: "warning",
          showCancelButton: true,
          confirmButton: "btn curved btn curved-success",
          cancelButtonColor: "#d33",
          confirmButtonText: "Confirmar"
        })
        .then(result => {
          //send request to the server
          if (result.value) {
            this.form
              .put("api/caso/" + pessoa_perdida.idpessoa_perdida)
              .then(() => {
                this.buscarCasos();
                Swal.fire("Concluido!");
                Fire.$emit("AfterCreate ");
              })
              .catch(() => {
                Swal(
                  "Failed",
                  "O desfecho do caso terminou de forma inesperada",
                  "warning"
                );
              });
          }
        });
    }
  },
  created() {
    this.buscarCasos();
  }
};
</script>
