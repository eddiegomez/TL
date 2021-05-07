<template>
  <div class="row">
    <!-- Divider -->
    <hr />
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
      <div class="card-tools right" style="position: relative; top: 20px">
        <button class="btn btn-success" @click="newModal()">
          Gestor
          <i class="fa fa-user-plus fa-fw"></i>
        </button>
      </div>
    </div>
    <!-- Divider -->
    <hr />
    <br />
    <div
      v-for="gestor in gestores"
      :key="gestor.idgestor"
      style="position: relative; left: 35px"
    >
      <div class="col-12 col-md-12" style="position: relative; top: 30px">
        <div class="card col-md-12" style="width: 290px">
          <div class="card-body">
            <div
              class="row"
              style="
                background-color: #3c8dbc;
                height: 4px;
                top: -20px;
                position: relative;
              "
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
                  <a href="#" @click="ver_foto(gestor)">
                    <img
                      :src="'/imagens/gestores/' + gestor.foto"
                      class="profile-user-img img-responsive img-circle"
                      style="height: 140px; width: 140px"
                    />
                  </a>
                </center>
                <h3 class="profile-username text-center">
                  {{ gestor.nome | upText }} {{ gestor.apelido | upText }}
                </h3>
                <p class="text-muted text-center">
                  <i class="text-muted fas fa-envelope"></i>
                  {{ gestor.email }}
                </p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item" v-if="gestor.celular != null">
                    <b class="text-muted">
                      <i class="text-muted fas fa-phone-alt"></i>
                    </b>
                    <a class="text-muted pull-right" style="float: right"
                      >+258 {{ gestor.celular }}</a
                    >
                  </li>
                  <li class="list-group-item" v-if="gestor.denominacao != null">
                    <b class="text-muted">
                      <i class="text-muted fas fa-home"></i>
                    </b>
                    <a class="text-muted pull-right" style="float: right">{{
                      gestor.denominacao
                    }}</a>
                  </li>
                </ul>
                <div class style="margin: 15px; position: relative">
                  <center>
                    <a href="#" @click="editModal(gestor)">
                      <i class="fa fa-edit" style="color: gray"></i>
                    </a>
                  </center>
                  <div class="row">
                    <a
                      href="#"
                      @click="detalhes(gestor)"
                      style="padding-left: 10px"
                    >
                      <button class="btn curved btn-primary">
                        <b style="color: white">Detalhes</b>
                      </button>
                    </a>
                    <a
                      @click="desfecho(gestor)"
                      style="padding-left: 20px"
                      v-if="gestor.denominacao != null"
                    >
                      <button class="btn curved btn-warning">
                        <b style="color: gray">Desactivar</b>
                      </button>
                    </a>
                    <a
                      data-toggle="modal"
                      data-target="#myModal"
                      style="padding-left: 20px"
                      v-if="gestor.denominacao == null"
                    >
                      <button class="btn curved btn-success">
                        <i class="fa fa-cogs" style="color: white"></i
                        ><b style="color: white"> Alocar</b>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <form @submit.prevent="alocarGestor">
                <div class="row">
                  <h4
                    class="text-centered"
                    style="position: relative; padding: 12px"
                  >
                    <strong
                      >Gestor: {{ gestor.nome }} {{ gestor.apelido }}</strong
                    >
                  </h4>
                  <select
                    v-model="form.tipo"
                    name="centro"
                    class="form-control curved"
                    :class="{ 'is-invalid': form.errors.has('centro') }"
                    style="margin-left: 12px; margin-right: 12px"
                  >
                    <option
                      v-for="centro in centros"
                      :key="centro.idcentro"
                      v-bind="centro.idcentro"
                    >
                      {{ centro.denominacao }}
                    </option>
                  </select>
                  <center>
                    <button
                      type="submit"
                      class="btn curved btn-success"
                      style="
                        margin-top: 15px;
                        margin-right: 15px;
                        position: relative;
                        left: 95px;
                      "
                    >
                      <i class="fa fa-cogs" style="color: white"></i
                      ><b style="color: white"> Alocar</b>
                    </button>
                  </center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal REGISTAR-->
    <div
      class="modal fade"
      id="registarGestor"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registar Gestor</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="novoGestor">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label class="text-muted">Centro</label>
                      <select
                        v-model="form.tipo"
                        name="tipo"
                        class="form-control curved"
                        :class="{ 'is-invalid': form.errors.has('tipo') }"
                      >
                        <option></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <img
                      class="profile-user-img"
                      src="/imagens/pessoas_perdidas/default.png"
                      alt="User profile picture"
                      style="height: 100%; width: 85px"
                    />
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label class="text-muted">Nome</label>
                      <input
                        type="text"
                        name="nome"
                        class="form-control"
                        placeholder="nome"
                        v-model="form.nome"
                        :class="{ 'is-invalid': form.errors.has('nome') }"
                      />
                      <has-error :form="form" field="nome"></has-error>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="text-muted">Apelido</label>
                      <input
                        type="text"
                        name="apelido"
                        class="form-control"
                        placeholder="apelido"
                        v-model="form.apelido"
                        :class="{ 'is-invalid': form.errors.has('apelido') }"
                      />
                      <has-error :form="form" field="apelido"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">D. nascimento</label>
                      <input
                        type="date"
                        name="d_nasc"
                        class="form-control"
                        placeholder="DD-MM-AAAA"
                        v-model="form.d_nasc"
                        :class="{ 'is-invalid': form.errors.has('d_nasc') }"
                      />
                      <has-error :form="form" field="d_nasc"></has-error>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">Nacionalidade</label>
                      <input
                        type="text"
                        name="nacionalidade"
                        class="form-control"
                        placeholder="nacionalidade"
                        v-model="form.nacionalidade"
                        :class="{
                          'is-invalid': form.errors.has('nacionalidade'),
                        }"
                      />
                      <has-error :form="form" field="nacionalidade"></has-error>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">Naturalidade</label>
                      <input
                        type="text"
                        name="naturalidade"
                        class="form-control"
                        placeholder="naturalidade"
                        v-model="form.naturalidade"
                        :class="{
                          'is-invalid': form.errors.has('naturalidade'),
                        }"
                      />
                      <has-error :form="form" field="naturalidade"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">Bairro</label>
                      <input
                        type="text"
                        name="bairro"
                        class="form-control"
                        placeholder="bairro"
                        v-model="form.bairro"
                        :class="{ 'is-invalid': form.errors.has('bairro') }"
                      />
                      <has-error :form="form" field="bairro"></has-error>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="text-muted">Avenida/Rua</label>
                      <input
                        type="text"
                        name="avenida"
                        class="form-control"
                        placeholder="avenida/rua"
                        v-model="form.avenida"
                        :class="{ 'is-invalid': form.errors.has('avenida') }"
                      />
                      <has-error :form="form" field="avenida"></has-error>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="text-muted">Quarteirão</label>
                      <input
                        type="number"
                        name="quarteirao"
                        class="form-control"
                        placeholder="quarteirão."
                        v-model="form.quarteirao"
                        :class="{ 'is-invalid': form.errors.has('quarteirao') }"
                      />
                      <has-error :form="form" field="quarteirao"></has-error>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="text-muted">Numero</label>
                      <input
                        type="number"
                        name="numero"
                        class="form-control"
                        placeholder="num."
                        v-model="form.numero"
                        :class="{ 'is-invalid': form.errors.has('numero') }"
                      />
                      <has-error :form="form" field="numero"></has-error>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="text-muted"
                        >Email</label
                      >
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email"
                        v-model="form.email"
                        :class="{ 'is-invalid': form.errors.has('email') }"
                      />
                      <has-error :form="form" field="email"></has-error>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="text-muted"
                        >Celular</label
                      >
                      <input
                        type="number"
                        name="cell"
                        class="form-control"
                        placeholder="+258"
                        v-model="form.cell"
                        :class="{ 'is-invalid': form.errors.has('cell') }"
                      />
                      <has-error :form="form" field="cell"></has-error>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">Password</label>
                      <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="password"
                        v-model="form.password"
                        :class="{ 'is-invalid': form.errors.has('password') }"
                      />
                      <has-error :form="form" field="password"></has-error>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">Password</label>
                      <input
                        type="password"
                        name="password_c"
                        class="form-control"
                        placeholder="confirme a password"
                      />
                    </div>
                  </div>
                </div>

                <div class="row"></div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Descartar
              </button>
              <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      gestores: null,
      centros: null,
      form: new Form({
        nome: "",
        apelido: "",
        d_nasc: "",
        nacionalidade: "",
        naturalidade: "",
        avenida: "",
        numero: "",
        cell: "",
        password: "",
      }),
    };
  },
  methods: {
    ver_foto(gestor) {
      var image = document.getElementById("ver_foto");
      image.src = "/imagens/gestores/" + gestor.foto;
      $("#foto").modal("show");
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#registarGestor").modal("show");
    },
    alocarGestor() {
      window.alert("dsdsd");
    },
    novoGestor() {
      this.$Progress.start();
      this.form
        .post("api/gestor")
        .then(() => {
          this.$Progress.finish();
          //this.buscarCasos();
          $("#registarGestor").modal("hide");
          toast.fire({
            type: "success",
            title: "Registado com sucesso",
          });
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    buscarGestores() {
      axios.get("api/gestor").then(({ data }) => {
        this.gestores = data["gestores"];
      });
      axios.get("api/gestor").then(({ data }) => {
        this.centros = data["centros"];
      });
    },
  },
  created() {
    this.buscarGestores();
  },
};
</script>
