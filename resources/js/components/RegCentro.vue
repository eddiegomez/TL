<template>
  <div class="container col-sm-11" style="top: 20px; position:relative">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Registar Centro de Acolhimento</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form @submit.prevent="registarCentro">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-7">
              <div class="form-group">
                <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Denominação</label>
                <input
                  placeholder="Nome do centro de acolhimento"
                  v-model="form.denominacao"
                  type="text"
                  name="denominacao"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('denominacao') }"
                />
                <has-error :form="form" field="denominacao"></has-error>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Tipo</label>
                <select
                  v-model="form.tipo"
                  name="tipo"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('tipo') }"
                > 
                  <option v-for="tipoc in tipos" :key="tipoc.idtipo_centro" v-bind:value="tipoc.idtipo_centro">{{tipoc.tipo}}</option>
                </select>
                <has-error :form="form" field="tipo"></has-error>
              </div>
            </div>

            <div class="form-group col-sm-2">
              <label class="text-muted">Capacidade</label>
              <input
                placeholder
                v-model="form.capacidade"
                type="number"
                name="capacidade"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('capacidade') }"
              />
              <has-error :form="form" field="capacidade"></has-error>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Provincia</label>
                <select
                  v-model="form.provincia"
                  name="provincia"
                  placeholder="Selecione"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('provincia') }"
                >
                  <option value="Maputo">Maputo</option>
                  <option value="Gaza">Gaza</option>
                  <option value="Inhambane">Inhambane</option>
                  <option value="Sofala">Sofala</option>
                  <option value="Manica">Manica</option>
                  <option value="Zambézia">Zambézia</option>
                  <option value="Tete">Tete</option>
                  <option value="Nampula">Nampula</option>
                  <option value="Niassa">Niassa</option>
                  <option value="Cabo Delgado">Cabo Delgado</option>
                </select>
                <has-error :form="form" field="provincia"></has-error>
              </div>
            </div>

            <div class="form-group col-sm-2">
              <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Distrito</label>
              <input
                placeholder="Distrito"
                v-model="form.distrito"
                type="text"
                name="distrito"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('distrito') }"
              />
              <has-error :form="form" field="distrito"></has-error>
            </div>

            <div class="form-group col-sm-4">
              <label class="text-muted">Avenida/Rua</label>
              <input
                placeholder
                v-model="form.avenida"
                type="text"
                name="avenida"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('avenida') }"
              />
              <has-error :form="form" field="avenida"></has-error>
            </div>

            <div class="form-group col-sm-2">
              <label class="text-muted">Quarteirão</label>
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

            <div class="form-group col-sm-2">
              <label class="text-muted">Número</label>
              <input
                placeholder
                v-model="form.numero"
                type="number"
                name="numero"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('numero') }"
              />
              <has-error :form="form" field="numero"></has-error>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-2">
              <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Latitude</label>
              <input
                placeholder
                v-model="form.latitude"
                type="number"
                name="latitude"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('latitude') }"
              />
              <has-error :form="form" field="latitude"></has-error>
            </div>

            <div class="form-group col-sm-2">
              <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Longitude</label>
              <input
                placeholder
                v-model="form.longitude"
                type="number"
                name="longitude"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('longitude') }"
              />
              <has-error :form="form" field="longitude"></has-error>
            </div>

            <div class="form-group col-sm-4">
              <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Email Institucional</label>
              <input
                placeholder="exemplo@dominio.com"
                v-model="form.email"
                type="email"
                name="email"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('email') }"
              />
              <has-error :form="form" field="email"></has-error>
            </div>

            <div class="form-group col-sm-2">
              <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Celular</label>
              <input
                placeholder="+258"
                v-model="form.celular1"
                type="number"
                name="celular"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('celular1') }"
              />
              <has-error :form="form" field="celular1"></has-error>
            </div>

            <div class="form-group col-sm-2">
              <label class="text-muted">Celular</label>
              <input
                placeholder="+258 (alternativo)"
                v-model="form.celular2"
                type="number"
                name="celular2"
                class="form-control curved"
                :class="{ 'is-invalid': form.errors.has('celular2') }"
              />
              <has-error :form="form" field="celular2"></has-error>
            </div>
          </div>

          <div class="form-group col-sm-8 row">
            <label for="photo" class="col-sm-10 text-muted">Logotipo do Centro</label>
            <input type="file" @change="gravarFoto" name="photo" class="form-input" />
          </div>

          <div class="form-group">
            <label class="text-muted">Informação adicional</label>
            <textarea
              placeholder="Inforação adicional do centro de acolhimento (opcional)"
              rows="4"
              v-model="form.obs"
              type="text"
              name="obs"
              class="form-control curved curved"
              :class="{ 'is-invalid': form.errors.has('desobscricao') }"
            ></textarea>
            <has-error :form="form" field="obs"></has-error>
          </div>
          <button
            @click.prevent="registarCentro"
            type="submit"
            class="btn btn-primary float-right curved"
          >Registar</button>
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
      tipos: null,
      form: new Form({
        denominacao: "",
        tipo: "",
        capacidade: "",
        provincia: "",
        distrito: "",
        //bairro: "",
        //quarteirao: "",
        avenida: "",
        quarteirao: "",
        numero: "",
        latitude: "",
        longitude: "",
        email: "",
        celular1: "",
        celular2: "",
        foto: "",
        obs: ""
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
        this.form.denominacao == "" ||
        this.form.tipo == "" 
      ) {
        toast.fire({
          type: "info",
          title: "Preencha todos os campos obrigatrios"
        });
        return false;
      }
    },
    registarCentro() {
      //if (this.validar()) {
        this.$Progress.start();
        this.form
          .post("api/centro")
          .then(() => {
            this.$Progress.finish();
            this.form.reset();
            toast.fire({
              type: "success",
              title: "Registado com sucesso"
            });
          })
          .catch(() => {
            this.$Progress.fail();
          });
      //}
    },
    buscarTiposCentros() {
      axios.get("api/tipo_centro").then(({ data }) => {
        this.tipos = data.tipos;
      });
    },
  },
  created() {
    this.buscarTiposCentros();
  }
};
</script>
