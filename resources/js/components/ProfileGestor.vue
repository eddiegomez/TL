<template>
  <div class="content" style="position:relative; top: 20px">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card" style="padding:20px;">
            <div class="header">
              <h4 class="card-title">Perfil Institucional</h4>
            </div>
            <div class="content">
              <form @submit.prevent="updateProfile()">
                <div v-for="centro in centro" :key="centro.idcentro">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="text-muted">Identificador</label>
                        <input
                          type="text"
                          class="form-control"
                          disabled
                          placeholder="#CA0120"
                          id="id"
                        />
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="form-group">
                        <label class="text-muted">Denominação</label>
                        <input
                          id="nome"
                          type="text"
                          class="form-control"
                          placeholder="Nome do centro"
                          v-model="form.nome"
                          name="nome"
                          :class="{ 'is-invalid': form.errors.has('nome') }"
                        />
                        <has-error :form="form" field="nome"></has-error>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label class="text-muted">Tipo</label>
                        <select
                          class="form-control"
                          id="tipo"
                          v-model="form.tipo"
                          name="tipo"
                          :class="{ 'is-invalid': form.errors.has('tipo') }"
                        >
                          <option value>Selecione o tipo</option>
                          <option value="Admin">Posto policial</option>
                          <option value="Cliente">Orfanato</option>
                          <option value="Pservicos">Centro social</option>
                          <option value="Pservicos">Outros</option>
                        </select>
                        <has-error :form="form" field="tipo"></has-error>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="text-muted">Capacidade</label>
                        <input
                          type="number"
                          class="form-control"
                          id="qtd"
                          v-model="form.qtd"
                          name="qtd"
                          :class="{ 'is-invalid': form.errors.has('qtd') }"
                        />
                        <has-error :form="form" field="qtd"></has-error>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label class="text-muted">Avenida/Rua</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Avenida/rua"
                          id="avenida"
                          v-model="form.avenida"
                          name="avenida"
                          :class="{ 'is-invalid': form.errors.has('avenida') }"
                        />
                        <has-error :form="form" field="avenida"></has-error>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="text-muted">Numero</label>
                        <input
                          type="number"
                          class="form-control"
                          id="nr"
                          v-model="form.nr"
                          name="nr"
                          :class="{ 'is-invalid': form.errors.has('nr') }"
                        />
                        <has-error :form="form" field="nr"></has-error>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="text-muted">Provincia</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Provincia"
                          id="provincia"
                          v-model="form.provincia"
                          name="provincia"
                          :class="{ 'is-invalid': form.errors.has('provincia') }"
                        />
                        <has-error :form="form" field="provincia"></has-error>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="text-muted">Cidade</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Cidade"
                          id="cidade"
                          v-model="form.cidade"
                          name="cidade"
                          :class="{ 'is-invalid': form.errors.has('cidade') }"
                        />
                        <has-error :form="form" field="cidade"></has-error>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="text-muted">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          placeholder="Email institucional"
                          id="email"
                          v-model="form.email"
                          name="email"
                          :class="{ 'is-invalid': form.errors.has('email') }"
                        />
                        <has-error :form="form" field="email"></has-error>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="text-muted">Celular 1</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="+258"
                          id="celular"
                          v-model="form.celular"
                          name="celular"
                          :class="{ 'is-invalid': form.errors.has('celular') }"
                        />
                        <has-error :form="form" field="celular"></has-error>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="text-muted">Celular 2</label>
                        <input type="number" class="form-control" placeholder="+258" />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="text-muted">Obs.</label>
                        <textarea
                          rows="3"
                          class="form-control"
                          placeholder="Informação adicional do centro "
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
                    class="btn btn-success btn-fill pull-right"
                    style="float:right"
                  >Update Profile</button>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-user">
            <div class="content center" style="padding:20px">
              <div class="author">
                <center>
                  <a href="#">
                    <img
                      :src="'/imagens/profile.png'"
                      class="profile-user-img img-responsive img-circle"
                      style="height: 140px;width: 140px"
                    />

                    <h4 class="title">
                      Mike Andrew
                      <br />
                      <small>michael24</small>
                    </h4>
                  </a>
                </center>
              </div>
              <p class="description text-center">
                "Lamborghini Mercy
                <br />Your chick she so thirsty
                <br />I'm in that two seat Lambo"
              </p>
            </div>
            <hr />
            <div class="text-center">
              <button href="#" class="btn btn-simple">
                <i class="nav-icon fas fa-gmail"></i>
              </button>
              <button href="#" class="btn btn-simple">
                <i class="fa fa-twitter"></i>
              </button>
              <button href="#" class="btn btn-simple">
                <i class="fa fa-google-plus-square"></i>
              </button>
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
      gestor: null,
      centro: null,
      form: new Form({
        nome: "",
        tipo: "",
        qtd: "",
        avenida: "",
        nr: "",
        provincia: "",
        cidade: "",
        email: "",
        celular: "",
        obs: ""
      })
    };
  },
  methods: {
    updateProfile() {
      window.alert("");
    },
      buscarCentro() {
      axios.get("api/centro").then(({ data }) => {
        array.forEach(element => {
          
        });
        this.form.fill(data.centro);
      });
    }
  },
  mounted() {
    this.buscarCentro();
  }
};
</script>
