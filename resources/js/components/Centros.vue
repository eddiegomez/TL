<template>
  <div class="container">
    <div class="row justify-content-center" style="position:relative; top: 50px">
      <div class="col-md-12">
        <div class="card-tools" style="position: relative; bottom: 10px;">
          <button class="btn btn-success" data-toggle="modal" data-target="#add">
            Mostrar no Mapa
            <i class="fa fa-map-marker"></i>
          </button>
        </div>

        <div class="row">
          <div class="card col-md-12">
            <div class="card-header" style="backgroud-color: red">
              <h3 class="card-title">Centros de Acolhimento</h3>
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
                          >#</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Browser: activate to sort column ascending"
                          >Denominação</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Platform(s): activate to sort column ascending"
                          >Tipo</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Engine version: activate to sort column ascending"
                          >Capacidade</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Platform(s): activate to sort column ascending"
                          >Casos registados</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="CSS grade: activate to sort column ascending"
                          >Gestor</th>
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
                        <tr v-for="centro in centros"  :key="centro.idcentro">
                          <td>CAD{{centro.idcentro}}</td>
                          <td>{{centro.denominacao}}</td>
                          <td>{{centro.tipo}}</td>
                          <td>12</td>
                          <td>3</td>
                          <td>{{centro.nome}}</td>
                          <td>
                            <a href="#" @click="editModal(user)">
                              <i style="color:green" class="fa fa-eye"></i>
                            </a>
                            /
                            <a href="#" @click="editModal(user)">
                              <i class="fa fa-edit"></i>
                            </a>
                            /
                            <a href="#" @click="deleteUser(user.id)">
                              <i style="color:red" class="fa fa-trash red"></i>
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
                    >Mostrando 1 a 10</div>
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
      centros: null,
      form: new Form({
        titulo: "",
        descricao: "",
        estado: "",
        prazo: "",
        photo: "",
        doc: ""
      })
    };
  },
  methods: {
    buscarCentros() {
      axios.get("api/centro").then(({ data }) => {
        this.centros = data; 
      });
    },
  },
  created() {
    this.buscarCentros();
  }
};
</script>
