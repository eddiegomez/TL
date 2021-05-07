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
                <div>
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
                          placeholder="Centro de Acolhimento UEM"
                          v-model="form.nome"
                          name="nome"
                          :class="{ 'is-invalid': form.errors.has('nome') }"
                          value="Centro de Acolhimento UEM"
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
                          disabled
                        >
                          <option value>Outros</option>
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
                          placeholder="20"
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
                          placeholder="Julius Nyerere"
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
                          placeholder="3453"
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
                          placeholder="Maputo"
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
                          placeholder="Maputo"
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
                          placeholder="UEM@ac.mz"
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
                          placeholder="+258 846499514"
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
                  >Actualizar</button>
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
                      style="height: 180px;width: 180px"
                    />

                    <h4 class="title" style="top:10px;position:relative"><strong id='nome_user'></strong></h4>
                  </a>
                </center>
              </div>
              <p class="description text-center">
                
              </p>
              <h6 class="description text-center">
                <br /><i class="fas fa-calendar"></i> 12/09/1984
              </h6>
              <h6 class="description text-center">
                <br /><i class="fas fa-phone"></i> +258 874007848
              </h6>
              <h6 class="description text-center">
                <br /><i class="fas fa-envelope"></i> resp@gmail.com
              </h6>
            </div>
            <hr />
            <div class="text-center" style="position:relative; top: -10px">
              <button @click="newModal()" class="btn btn-simple">
                <i class="fas fa-pen"></i>
              </button>
              <button href="#" class="btn btn-simple">
                <i class="fas fa-user"></i>
              </button>
              <button href="#" class="btn btn-simple">
                <i class="fas fa-cogs"></i>
              </button>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <option
                          
                        ></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <img
                      class="profile-user-img"
                      src="/imagens/pessoas_perdidas/default.png"
                      alt="User profile picture"
                      style="height:100%; width: 85px"
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
                        :class="{ 'is-invalid': form.errors.has('nacionalidade') }"
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
                        :class="{ 'is-invalid': form.errors.has('naturalidade') }"
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
                      <label for="exampleInputEmail1" class="text-muted">Email</label>
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
                      <label for="exampleInputEmail1" class="text-muted">Celular</label>
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
              <button type="button" class="btn btn-danger" data-dismiss="modal">Descartar</button>
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
      form: new Form({
        denominacao: "",
        tipo: "",
        capacidade: "",
        provincia: "",
        avenida: "",
        //quarteirao: "",
        numero: "",
        //latitude: "",
        //longitude: "",
        email: "",
        celular1: "",
        celular2: "",
        obs: ""     
      }),
      form2: new Form({
        nome: "",
        apelido: "",
        d_nasc: "",
        nacionalidade: "",
        naturalidade: "",
        avenida: "",
        numero: "",
        cell: "",
        password: ""
      })
    }
  },
  methods:{
    newModal() {
      this.form.reset();
      $("#registarGestor").modal("show");
    }
  },
  created() {
    /*axios.get("api/centro")
    .then(({ data }) => (this.form.fill(data)));*/
    
  },
  mounted(){
    let result = axios.get("api/profile")
    .then(({ data }) => (this.form2.fill(data)));
    console.log(result.nome);
    document.getElementById('nome_user').innerHTML="Jorge Pereira";
  }
};
</script>
