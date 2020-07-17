<template>
  <div class="container">
    <div class="row justify-content-center" style="position:relative; top: 50px">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label class="text-muted">Critério de busca</label>
              <select
                class="form-control"
                v-model="form.genero"
                type="text"
                name="genero"
                aria-placeholder="Selecione"
                :class="{ 'is-invalid': form.errors.has('genero') }"
              >
                <option value="Masculino">Nome</option>
                <option value="Masculino">Idade</option>
                <option value="Feminino">Genero</option>
                <option value="Feminino">Provincia</option>
                <option value="Feminino">Data de desaparecimento</option>
              </select>
              <has-error :form="form" field="genero"></has-error>
            </div>
          </div>
          <div class="col-sm-7">
            <div class="form-group">
              <label class="text-muted">Palavra-chave</label>
              <input
                placeholder="Chave de pesquisa"
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
          <div class="card col-md-12">
            <div class="card-header">
              <h3 class="card-title">Pessoas Perdidas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class>
                <div class="row">
                  <div class="col-sm-12"></div>
                  <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table
                      id="example2"
                      class="table table-bordered table-hover dataTable"
                      role
                      aria-describedby="example2_info"
                    >
                      <thead>
                        <tr role="row">
                          <th
                            class="sorting_asc"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-sort="ascending"
                            aria-label="Rendering engine: activate to sort column descending"
                          >Nome</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Browser: activate to sort column ascending"
                          >Data de nascimento</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Platform(s): activate to sort column ascending"
                          >Tipo de registo</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Engine version: activate to sort column ascending"
                          >Data de registo</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Platform(s): activate to sort column ascending"
                          >Registado por</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="CSS grade: activate to sort column ascending"
                          >Operação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="pessoa_perdida in pessoas_perdidas"
                          :key="pessoa_perdida.idpessoa_perdida"
                        >
                          <td>{{pessoa_perdida.nome}}</td>
                          <td>{{pessoa_perdida.data_nascimento | myDate}}</td>
                          <td>{{pessoa_perdida.tipo | capitalizar}}</td>
                          <td>{{pessoa_perdida.reg}}</td>
                          <td>{{pessoa_perdida.nom_user}}</td>
                          <td>
                            <a href="#" @click="editModal(user)">
                              <i class="fa fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot></tfoot>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div
                      class="dataTables_info"
                      id="example2_info"
                      role="status"
                      aria-live="polite"
                    >Mostrando 1 a 10 10 1 registos</div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                      <ul class="pagination">
                        <li
                          class="paginate_button page-item previous disabled"
                          id="example2_previous"
                        >
                          <a
                            href="#"
                            aria-controls="example2"
                            data-dt-idx="0"
                            tabindex="0"
                            class="page-link"
                          >Anterior</a>
                        </li>
                        <li class="paginate_button page-item active">
                          <a
                            href="#"
                            aria-controls="example2"
                            data-dt-idx="1"
                            tabindex="0"
                            class="page-link"
                          >1</a>
                        </li>
                        <li class="paginate_button page-item">
                          <a
                            href="#"
                            aria-controls="example2"
                            data-dt-idx="2"
                            tabindex="0"
                            class="page-link"
                          >2</a>
                        </li>
                        <li class="paginate_button page-item">
                          <a
                            href="#"
                            aria-controls="example2"
                            data-dt-idx="3"
                            tabindex="0"
                            class="page-link"
                          >3</a>
                        </li>
                        <li class="paginate_button page-item">
                          <a
                            href="#"
                            aria-controls="example2"
                            data-dt-idx="4"
                            tabindex="0"
                            class="page-link"
                          >4</a>
                        </li>
                        <li class="paginate_button page-item">
                          <a
                            href="#"
                            aria-controls="example2"
                            data-dt-idx="5"
                            tabindex="0"
                            class="page-link"
                          >5</a>
                        </li>
                        <li class="paginate_button page-item">
                          <a
                            href="#"
                            aria-controls="example2"
                            data-dt-idx="6"
                            tabindex="0"
                            class="page-link"
                          >6</a>
                        </li>
                        <li class="paginate_button page-item next" id="example2_next">
                          <a
                            href="#"
                            aria-controls="example2"
                            data-dt-idx="7"
                            tabindex="0"
                            class="page-link"
                          >Seguinte</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="add"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Centros de Acolhimento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
  </div>
</template>

<script>
export default {
  data() {
    return {
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
    buscarCasos() {
      axios.get("api/pesquisa").then(({ data }) => {
        this.pessoas_perdidas = data.pessoas_perdidas;
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
        this.pessoas_perdidas = data.data
      })
      .catch(() =>{

      })
    });
    this.buscarCasos();
  }
};
</script>
