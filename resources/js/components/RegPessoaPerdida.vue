<template>
  <div class="container col-sm-10" style="top: 20px; position:relative;">
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

            <div class="col-sm-6">
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
                <label class="text-muted">Data de Nascimento</label>
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
                <label class="text-muted">Genero</label>
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
            <div class="col-sm-4">
              <div class="form-group">
                <label for="photo" class="col-sm-10 text-muted">Fotografia</label>
                <input type="file" @change="gravarFoto" name="photo" class="form-input" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="text-muted">Informação adicional</label>
            <textarea
              placeholder="Depoimento da pessoa perdida ou alguma informação adicional"
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
        descricao: ""
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
    publicarCaso() {
      //this.$Progress.start();
      this.form
        .post("api/pessoa_perdida")
        .then(() => {
          //this.$Progress.finish();
          this.form.reset();
          toast.fire({
            type: "success",
            title: "Publicado com sucesso"
          });
        })
        .catch(() => {
          //this.$Progress.fail();
        });
    }
  }
};
</script>