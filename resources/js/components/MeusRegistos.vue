<template>
  <div class="content" style="position:relative; top: 20px">
    <div v-for="pessoa_perdida in pessoas_perdidas" :key="pessoa_perdida.idpessoa_perdida">
      <hr />
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
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
                    <h3
                      class="profile-username text-center"
                    >{{pessoa_perdida.nome}} {{pessoa_perdida.apelido}}</h3>
                    <center>
                      <b class="text-center">
                        <i class="text-muted fas fa-clock"></i>
                        {{pessoa_perdida.reg | myDate}}
                      </b>
                    </center>
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
                          <i class="text-muted fas fa-address-card"></i> Morada
                        </b>
                        <a
                          class="text-muted pull-right"
                          style="float:right"
                        >{{pessoa_perdida.bairro}}</a>
                      </li>
                      <li class="list-group-item">
                        <b class="text-muted">
                          <i class="text-muted fas fa-map-marked"></i> Endereço
                        </b>
                        <a
                          class="text-muted pull-right"
                          style="float:right"
                        >{{pessoa_perdida.avenida}}, Nr {{pessoa_perdida.numero}}</a>
                      </li>
                      <li class="list-group-item">
                        <b class="text-muted">
                          <i class="text-muted fas fa-phone-alt"></i> Contacto
                        </b>
                        <a
                          class="text-muted pull-right"
                          style="float:right"
                        >{{pessoa_perdida.celular}}</a>
                      </li>
                      <li class="list-group-item">
                        <b class="text-muted">
                          <i class="text-muted fas fa-calendar"></i> Desaparecido aos
                        </b>
                        <a
                          class="text-muted pull-right"
                          style="float:right"
                        >{{pessoa_perdida.data_desaparecimento | myDate}}</a>
                      </li>
                    </ul>
                    <div class style="margin: 15px; position: relative">
                      <center>
                        <div class="row">
                          <div class="col-sm-4">
                            <a href="#" @click="editModal(pessoa_perdida)">
                              <button class="btn curved btn-primary btn-block">
                                <b style="color:white">Editar</b>
                              </button>
                            </a>
                          </div>
                          <div class="col-sm-4">
                            <a
                              href="#"
                              @click="desfecho(pessoa_perdida)"
                              class="btn curved btn-success btn-block"
                            >
                              <b style="color:white">Desfecho</b>
                            </a>
                          </div>
                          <div class="col-sm-4">
                            <a
                              href="#"
                              @click="remover(pessoa_perdida)"
                              class="btn curved btn-danger btn-block"
                            >
                              <b style="color:white">Remover</b>
                            </a>
                          </div>
                          <div class="col-md-2"></div>
                        </div>
                      </center>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="card" style="padding:20px;">
              <div class="header">
                <h4 class="card-title">Comentários</h4>
              </div>
              <div class="content">
                <div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="text-muted">
                          <i class="text-muted fas fa-comment"></i> Comentário
                        </label>
                        <textarea
                          rows="3"
                          class="form-control"
                          placeholder="Deixe aqui alguma informação que possa ser util na localização da pessoa perdida"
                          v-model="form.obs"
                          name="obs"
                          :class="{ 'is-invalid': form.errors.has('obs') }"
                        ></textarea>
                        <has-error :form="form" field="obs"></has-error>
                      </div>
                    </div>
                  </div>

                  <button
                    type="submit"
                    class="btn curved btn-primary btn-fill pull-right"
                    style="float:right"
                  >Comentar</button>
                  <div class="clearfix"></div>
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
                    <div class="col-md-12" style="margin:0px">
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
                <form @submit.prevent="editmode ? updateUser(): publicarCaso()">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="text-muted">Apelido</label>
                          <input
                            placeholder="Apelido"
                            v-model="form.apelido"
                            type="text"
                            name="apelido"
                            class="form-control"
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
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('nome') }"
                          />
                          <has-error :form="form" field="nome"></has-error>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="text-muted">Outros nomes</label>
                          <input
                            placeholder="Opcional"
                            v-model="form.alcunha"
                            type="text"
                            name="alcunha"
                            class="form-control"
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
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('data_nascimento') }"
                          />
                          <has-error :form="form" field="data_nascimento"></has-error>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="text-muted">Genero</label>
                          <select
                            class="form-control"
                            v-model="form.genero"
                            type="text"
                            name="genero"
                            :class="{ 'is-invalid': form.errors.has('genero') }"
                          >
                            <option value>Selecione o genero</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                          </select>
                          <has-error :form="form" field="genero"></has-error>
                        </div>
                      </div>
                    </div>
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
                                class="form-control"
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
                                class="form-control"
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
                              <input
                                type="file"
                                @change="gravarFoto"
                                name="photo"
                                class="form-input"
                              />
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
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('descricao') }"
                      ></textarea>
                      <has-error :form="form" field="descricao"></has-error>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn curved btn-danger" data-dismiss="modal">Descartar</button>
                    <button v-show="editmode" type="submit" class="btn curved btn-success">Actualizar</button>
                    <button v-show="!editmode" type="submit" class="btn curved btn-primary">Gravar</button>
                  </div>
                </form>
              </div>
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
      editmode: false,
      pessoas_perdidas: null,
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
    desfecho(pessoa_perdida) {
      swal
        .fire({
          icon: "warning",
          title: "Confirme a operação",
          text: "Tem certeza que pretende dar o desfecho do caso?",
          type: "warning",
          showCancelButton: true,
          confirmButton: "btn curved btn-success",
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
    },
    remover(pessoa_perdida) {
      swal
        .fire({
          icon: "warning",
          title: "Confirme a operação",
          text: "Tem certeza que pretende remover o caso?",
          type: "warning",
          showCancelButton: true,
          confirmButton: "btn curved btn-success",
          cancelButtonColor: "#d33",
          confirmButtonText: "Confirmar"
        })
        .then(result => {
          //send request to the server
          if (result.value) {
            this.form.delete("api/pessoa_perdida/" + pessoa_perdida.idpessoa_perdida)
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
        this.pessoas_perdidas = data.meus_registos;
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