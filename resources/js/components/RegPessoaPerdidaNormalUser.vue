<template>
  <div class="container col-sm-10" style="top: 20px; position:relative">
    <div class="card card-primary">
      <div class="card-header" style="background-color:#051d39">
        <h3 class="card-title">Registar pessoa perdida</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form @submit.prevent="publicarCaso">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Apelido
                </label>
                <input
                  required
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

            <div class="col-sm-6">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Nome
                </label>
                <input
                  required
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

            <div class="col-sm-3">
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
          </div>

          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Data de Nascimento
                </label>
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
            <div class="col-sm-3">
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
            <div class="col-md-3">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Genero
                </label>
                <select
                  class="form-control curved"
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
            <div class="col-sm-3">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Data de desaparecimento
                </label>
                <input
                  v-model="form.data_desaparecimento"
                  type="date"
                  name="data_desaparecimento"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('data_desaparecimento') }"
                />
                <has-error :form="form" field="data_desaparecimento"></has-error>
              </div>
            </div>

            <div class="col-sm-5">
              <div class="form-group">
                <label for="photo" class="col-sm-10 text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Fotografia
                </label>
                <input type="file" @change="gravarFoto" name="photo" class="form-input" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Rua/Avenida
                </label>
                <input
                  v-model="form.avenida"
                  placeholder="Residencia da pessoa perdida"
                  type="text"
                  name="avenida"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('avenida') }"
                />
                <has-error :form="form" field="avenida"></has-error>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Bairro
                </label>
                <input
                  v-model="form.bairro"
                  type="text"
                  name="bairro"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('bairro') }"
                />
                <has-error :form="form" field="bairro"></has-error>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Quarteirão
                </label>
                <input
                  placeholder
                  v-model="form.quarteirao"
                  type="number"
                  name="quarteirao"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('quarteirao') }"
                />
                <has-error :form="form" field="quarteirao"></has-error>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label class="text-muted">
                  <a class="obrigatorio" style="color:red">*</a> Numero
                </label>
                <input
                  v-model="form.numero"
                  type="number"
                  name="numero"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('numero') }"
                />
                <has-error :form="form" field="numero"></has-error>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="text-muted">Informação adicional</label>
            <textarea
              placeholder="Informação adicional como a cor dos olhos, a roupa que trazia na ultima vez que foi vista, etc"
              rows="6"
              v-model="form.descricao"
              type="text"
              name="descricao"
              class="form-control curved"
              :class="{ 'is-invalid': form.errors.has('descricao') }"
            ></textarea>
            <has-error :form="form" field="descricao"></has-error>
          </div>
          <button
            @click.prevent="publicarCaso"
            type="submit"
            class="btn btn-primary float-right curved"
          >Publicar</button>
        </div>
        <!-- /.card-body -->
      </form>
    </div>
  </div>
</template>

<style>
.curved {
  border-radius: 25px;
}

.obrigatorio {
  color: red;
}
</style>

<script>
export default {
  data() {
    return {
      form: new Form({
        nome: "",
        apelido: "",
        alcunha: "",
        data_nascimento: "",
        nacionalidade: "",
        naturalidade: "",
        photo: "",
        genero: "",
        descricao: "",
        data_desaparecimento: "",
        bairro: "",
        avenida: "",
        quarteirao: "",
        numero: ""
      })
    };
  },
  methods: {
    gravarFoto(e) {
      let file = e.target.files[0];
      //extrai os dados da img
      console.log(file);
      let reader = new FileReader();
      reader.onloadend = file => {
        this.form.photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
    validar() {
      if (
        this.form.apelido == "" ||
        this.form.nome == "" ||
        this.form.apelido == "" ||
        this.form.photo.null
      ) {
        toast.fire({
          type: "info",
          title: "Preencha todos os campos obrigatrios"
        });
        return false;
      }
    },
    publicarCaso() {
      if (this.validar()) {
        this.$Progress.start();
        this.form
          .post("api/regPessoa_perdida")
          .then(() => {
            this.$Progress.finish();
            this.form.reset();
            toast.fire({
              type: "success",
              title: "Publicado com sucesso"
            });
          })
          .catch(() => {
            this.$Progress.fail();
          });
      }
    }
  }
};
</script>