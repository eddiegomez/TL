<?php $__env->startSection('content'); ?>
<div class="container col-sm-11" style="top: 20px; position:relative">
    <div class="card card-primary">
      <div class="card-header">
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
                  class="form-control"
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
                  class="form-control"
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
                  v-model="form.nome"
                  type="text"
                  name="outros"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('outros') }"
                />
                <has-error :form="form" field="outros"></has-error>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="text-muted">Data de Nascimento</label>
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
            <div class="col-sm-4">
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
            <div class="col-sm-4">
              <label class="text-muted">Genero</label>
              <div class="row">
                <div class="col-sm-6" style="position: relative;float: left">
                  <input
                    value="Masculino"
                    v-model="form.masculino"
                    type="radio"
                    name="masculino"
                    class
                    :class="{ 'is-invalid': form.errors.has('masculino') }"
                  />
                  <label for="masculino" class="text-muted">Masculino</label>
                  <has-error :form="form" field="masculino"></has-error>
                </div>
                <br />
                <div class="col-sm-6" style="position: relative;float: right">
                  <input
                    value="Feminino"
                    v-model="form.feminino"
                    type="radio"
                    name="feminino"
                    class
                    :class="{ 'is-invalid': form.errors.has('feminino') }"
                  />
                  <label for="feminino" class="text-muted">Feminino</label>
                  <has-error :form="form" field="feminino"></has-error>
                </div>
                <br />
              </div>
            </div>

            <div class="col-sm-8">
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
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('descricao') }"
            ></textarea>
            <has-error :form="form" field="descricao"></has-error>
          </div>

          <button type="submit" class="btn btn-primary float-right">Registar</button>
        </div>
        <!-- /.card-body -->
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\EDDY\PROJECTOS\trabalho\resources\views/regPessoaPerdida.blade.php ENDPATH**/ ?>