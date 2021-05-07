@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><label class="text-muted">Perfil</label></div>
                    <form method="POST" action="registarUser">
                    <div class="card-body">
                    <div class="row col-md-12">
                    
                    </div>
                        <div class="row">
                            <div class="col-md-8">
                                @csrf
                               
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted">Apelido</label>
                                            <input
                                            type="text"
                                            class="form-control"
                                            placeholder="apellido"
                                            name="apelido"
                                            value=<?php echo $utilizador->apelido?>
                                            required
                                            id="apelido"
                                            disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="text-muted">Nome</label>
                                            <input
                                            name="nome"
                                            type="text"
                                            class="form-control"
                                            placeholder="nome"
                                            value=<?php echo $utilizador->nome?>
                                            required
                                            disabled
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted">Genero</label>
                                            <select
                                            class="form-control"
                                            name="sexo"
                                            value=<?php echo $utilizador->sexo?>
                                            required
                                            disabled
                                            >
                                            <option value>Selecione o genero</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted">Data de nascimento</label>
                                            <input
                                            type="date"
                                            class="form-control"
                                            name="data_nascimento"
                                            required
                                            disabled
                                            value=<?php echo $utilizador->data_nascimento?>
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted">Nacionalidade</label>
                                            <input
                                            type="text"
                                            class="form-control"
                                            placeholder="nacionalidade"
                                            name="nacionalidade"
                                            required
                                            disabled
                                            value=<?php echo $utilizador->pais?>
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted">Naturalidade</label>
                                            <input
                                            type="text"
                                            class="form-control"
                                            placeholder="naturalidade"
                                            name="naturalidade"
                                            required
                                            disabled
                                            value=<?php echo $utilizador->provincia?>
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="text-muted">Morada</label>
                                            <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Av./Rua"
                                            name="avenida"
                                            required
                                            disabled
                                            value=<?php echo $utilizador->avenida?>
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-muted">Bairro</label>
                                            <input
                                            type="text"
                                            class="form-control"
                                            placeholder="bairro"
                                            name="bairro"
                                            disabled
                                            value=<?php echo $utilizador->bairro?>
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="text-muted">Quarteirão</label>
                                            <input
                                            type="number"
                                            class="form-control"
                                            name="quarteirao"
                                            disabled
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="text-muted">N*</label>
                                            <input
                                            type="number"
                                            class="form-control"
                                            name="numero"
                                            required
                                            disabled
                                            value=<?php echo $utilizador->numero?>
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted">Celular</label>
                                            <input
                                            type="number"
                                            class="form-control"
                                            placeholder="+258"
                                            name="celular"
                                            required
                                            disabled
                                            value=<?php echo $utilizador->celular?>
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted">Celular (alt)</label>
                                            <input
                                            type="number"
                                            class="form-control"
                                            placeholder="+258"
                                            disabled
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="content center" style="padding:20px">
                            <div class="author">
                                <center>
                                <a href="#">
                                    <img
                                    src="/imagens/profile.png"
                                    class="profile-user-img img-responsive img-circle"
                                    style="height: 148px;width: 148px"
                                    />
                                </a>
                                </center>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-muted">Email</label>
                                        <input
                                        type="email"
                                        class="form-control"
                                        placeholder="exemplo@gmail.com"
                                        name="email"
                                        required
                                        disabled
                                        value=<?php echo $utilizador->email?>
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-muted">Password</label>
                                            <input
                                            type="password"
                                            class="form-control"
                                            placeholder="senha"
                                            name="password"
                                            value=<?php echo $utilizador->password?>
                                            disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-muted">Password</label>
                                            <input
                                            type="password"
                                            class="form-control"
                                            placeholder="confirmação"
                                            disabled
                                            />
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                             
                            </div>
                            
                        </div>
                        <hr style="top:-20px"/>
                        
                        
                        
                        <a id="btn_habilitar" onclick="habilitar_campos()" style="padding:10px; float:right">
                            <buton class="btn btn-primary"><i class="nav-icon fa fa-user-edit"></i></buton>
                        </a>
                        <button id="btn_actualizar" type="submit" class="btn btn-success" style="top:10px;position:relative;float:right; display:none">
                            Actualizar
                        </button>
                        <a id="btn_cancelar" onclick="desabilitar_campos()" style="padding:10px; float:right; display:none">
                            <buton class="btn btn-warning">Cancelar</buton>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <footer class="main-footer col-md-12" style="position:relative; left:-250px;">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="#">SGPP</a>.</strong> All rights reserved.
    </footer>
</div>
<script>
    function habilitar_campos(){
        //document.getElementById('apelido').disabled="none";
        document.getElementById('btn_habilitar').style="display:none";
        document.getElementById('btn_actualizar').style="display:inline; float:right!important;top:10px;position:relative;";
        document.getElementById('btn_cancelar').style="display:inline; float:right!important;padding:10px;";
    }
    function desabilitar_campos(){
        document.getElementById('btn_habilitar').style="display:inline; float:right;padding:10px; ";
        document.getElementById('btn_actualizar').style="display:none";
        document.getElementById('btn_cancelar').style="display:none"; 
    }
</script>
@endsection
