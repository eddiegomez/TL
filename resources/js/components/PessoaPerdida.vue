<template>
    <div class="container">
        <div class="row">
          <div class="card col-md-12">
            <div class="card-header">
            
              <h3 class="card-title">Utilizadores</h3>
              <div class="card-tools">
                <button class="btn btn-success" @click="newModal()">Adicionar <i class="fa fa-user-plus fa-fw"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div>
              <div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Identificador</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nome</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tipo</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Data de registo</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Acção</th></tr>
                </thead>
                <tbody>
                  <tr>
                    <td>fefedf</td>
                    <td>gggg</td>
                    <td>hhh</td>
                    <td>jjj</td>
                    <td>kkk</td>
                    <td>
                    <a href="#" @click="editModal()">
                      <i class="fa fa-edit"></i>
                    </a>
                    /
                    <a href="#" @click="deleteUser()">
                      <i class="fa fa-trash red"></i>
                    </a>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="addusers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 v-show="editmode" class="modal-title" id="exampleModalLabel">Actualizar dados </h5>
                <h5 v-show="!editmode" class="modal-title" id="exampleModalLabel">Registo de utilizador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
            </div>
          </div>
        </div>

    </div>

    
</template>

<script>
    export default {
      data() {
        return{
          editmode: false,
        
        }
      },
      methods: {
        updateUser(){
          
        },
        editModal(){
          this.editmode = true;
          this.form.reset(); 
          $('#addusers').modal('show');
        },
        newModal(){
          this.editmode = false;
          this.form.reset(); 
          $('#addusers').modal('show');
        },
        deleteUser(){
          
        },
        createUser(){
         
      },
        created() {
          
      }
    }
    }
</script>
