<template>
  <div class="container col-sm-11" style="top: 20px; position:relative">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Registar Centro de Acolhimento</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form @submit.prevent="">
        <div class="card-body">
              <div class="form-group">
                <label class="text-muted">Denominação</label>
                <input
                  placeholder="Nome do centro de acolhimento"
                  v-model="form.denominacao"
                  type="text"
                  name="denominacao"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('denominacao') }"
                >
                <has-error :form="form" field="denominacao"></has-error>
              </div>

              <div class="row">
                <div class="col-sm-5">
                  <div class="form-group">
                    <label class="text-muted">Tipo</label>
                    <select
                    v-model="form.tipo_centro"
                    name="tipo_centro"
                    placeholder="Selecione"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('tipo_centro') }"
                  >
                    <option value="Orfanato">Orfanato</option>
                    <option value="Posto_policial">Posto Policial</option>
                    <option value="ONG">Organização Não Governamental</option>
                    <option value="Comunidade Religiosa">Comunidade Religiosa</option>
                    <option value="Outros">Outros</option>
                  </select>
                    <has-error :form="form" field="tipo_centro"></has-error>
                  </div>
                </div>

                <div class="form-group col-sm-2">
                  <label class="text-muted">Capacidade</label>
                  <input
                    placeholder=""
                    v-model="form.capacidade"
                    type="number"
                    name="capacidade"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('capacidade') }"
                  >
                  <has-error :form="form" field="capacidade"></has-error>
                </div>

                <div class="col-sm-5">
                  <div class="form-group">
                    <label class="text-muted">Provincia</label>
                    <select
                      v-model="form.provincia"
                      name="provincia"
                      placeholder="Selecione"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('provincia') }"
                      >
                        <option value="servicos">Maputo</option>
                        <option value="emprego">Gaza</option>
                        <option value="carros">Inhambane</option>
                        <option value="tecnologia">Beira</option>
                        <option value="mobiliario">Zambézia</option>
                        <option value="escola">Tete</option>
                        <option value="escritorio">Quelimane</option>
                        <option value="outras">Chimoio</option>
                        <option value="outras">Cabo Delgado</option>
                    </select>
                    <has-error :form="form" field="provincia"></has-error>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-sm-3">
                  <label class="text-muted">Distrito</label>
                  <input
                    placeholder="Distrito"
                    v-model="form.distrito"
                    type="text"
                    name="distrito"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('distrito') }"
                  >
                  <has-error :form="form" field="distrito"></has-error>
                </div>

                <div class="form-group col-sm-5">
                  <label class="text-muted">Avenida/Rua</label>
                  <input
                    placeholder=""
                    v-model="form.avenida"
                    type="text"
                    name="avenida"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('avenida') }"
                  >
                  <has-error :form="form" field="avenida"></has-error>
                </div>

                <div class="form-group col-sm-2">
                  <label class="text-muted">Quarteirão</label>
                  <input
                    placeholder=""
                    v-model="form.quarteirao"
                    type="number"
                    name="quarteirao"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('quarteirao') }"
                  >
                  <has-error :form="form" field="quarteirao"></has-error>
                </div>

                <div class="form-group col-sm-2">
                  <label class="text-muted">Número</label>
                  <input
                    placeholder=""
                    v-model="form.quarteirao"
                    type="number"
                    name="numero"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('numero') }"
                  >
                  <has-error :form="form" field="numero"></has-error>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-sm-6">
                  <label class="text-muted">Email Institucional</label>
                  <input
                    placeholder="exemplo@dominio.com"
                    v-model="form.email"
                    type="email"
                    name="email"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                  >
                  <has-error :form="form" field="email"></has-error>
                </div>

                <div class="form-group col-sm-3">
                  <label class="text-muted">Celular</label>
                  <input
                    placeholder="+258"
                    v-model="form.celular"
                    type="number"
                    name="celular"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('celular') }"
                  >
                  <has-error :form="form" field="celular"></has-error>
                </div>

                <div class="form-group col-sm-3">
                  <label class="text-muted">Celular</label>
                  <input
                    placeholder="+258 (alternativo)"
                    v-model="form.celular"
                    type="number"
                    name="celular2"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('celular2') }"
                  >
                  <has-error :form="form" field="celular2"></has-error>
                </div>
              </div>

              <div class="form-group col-sm-8 row">
                  <label for="photo" class="col-sm-10 text-muted">Logotipo da instituição</label>
                  <input type="file" @change="" name="photo" class="form-input">
                </div>
                
          <div class="form-group">
            <label class="text-muted">Informação adicional</label>
            <textarea
              placeholder="Inforação adicional do centro de acolhimento (opcional)"
              rows="4"
              v-model="form.descricao"
              type="text"
              name="descricao"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('descricao') }"
            ></textarea>
            <has-error :form="form" field="descricao"></has-error>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Registar</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
    return {
      form: new Form({
        titulo: "",
        descricao: "",
        estado: "",
        prazo: "",
        photo: "",
        doc: ""
      }),
    };
  },
  methods: {
    
  },
  created() {
    
  }
}
</script>
