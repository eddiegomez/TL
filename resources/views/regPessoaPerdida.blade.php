@extends('layouts.app')
<style>
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #000000
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: 1
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: blue
}
</style>
@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            @component('alerts/alert')
                Registe um <strong>familiar, amigo ou conhecido</strong> e  conte com a ajuda de milhares de pessoas  a ajudar na busca. Fácil, rápido e eficiente 
            @endcomponent
            <input type="range" name="points" min="0" max="2" value="1" style="width:100%;height:20px">
            <!-- progressbar
            <ul id="progressbar">
                                <li class="active" id="account"><strong>Account</strong></li>
                                <li id="personal"><strong>Personal</strong></li>
                                <li id="payment"><strong>Payment</strong></li>
                                <li id="confsirm"><strong>Finish</strong></li>
                            </ul> <!-- fieldsets -->
            <div class="card">
                <div class="card-header"><label class="text-muted">Dados da pessoa perdida</label></div>
                    <form method="POST" enctype="multipart/form-data" action="fase2reg">
                    <div class="card-body">
                    <div class="row col-md-12">
                    
                    </div>
                        <div class="row">
                            <div class="col-md-8">
                                @csrf
                               
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Apelido</label>
                                            <input
                                            type="text"
                                            class="form-control curved"
                                            placeholder="apellido"
                                            name="apelido"
                                            id="apelido"
                                            required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Nome</label>
                                            <input
                                            id="nome"
                                            name="nome"
                                            type="text"
                                            class="form-control curved"
                                            placeholder="nome"
                                            required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-muted">Outros nomes</label>
                                            <input
                                            id="outros_nomes"
                                            name="outros_nome"
                                            type="text"
                                            class="form-control curved"
                                            placeholder="alcunha"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Genero</label>
                                            <select
                                            id="sexo"
                                            class="form-control curved"
                                            name="sexo"
                                            >
                                            <option value="Masculino">M</option>
                                            <option value="Feminino">F</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Data de nascimento</label>
                                            <!--<label class="text-muted"><a class="obrigatorio" style="color:red"> (Inválida)</a></label>-->
                                            <input
                                            type="date"
                                            class="form-control curved"
                                            name="data_nascimento"
                                            id="data_nascimento"
                                            max=<?php echo date('d/m/Y')?>
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-muted">Nacionalidade</label>
                                            <input
                                            type="text"
                                            class="form-control curved"
                                            placeholder="nacionalidade"
                                            name="nacionalidade"
                                            id="nacionalidade"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-muted">Naturalidade</label>
                                            <input
                                            type="text"
                                            class="form-control curved"
                                            placeholder="naturalidade"
                                            name="naturalidade"
                                            id="naturalidade"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="text-muted">Morada</label>
                                            <input
                                            type="text"
                                            class="form-control curved"
                                            placeholder="Av./Rua"
                                            name="avenida"
                                            id="avenida"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-muted">Bairro</label>
                                            <input
                                            type="text"
                                            class="form-control curved"
                                            placeholder="bairro"
                                            name="bairro"
                                            id="bairro"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="text-muted">Quarteirão</label>
                                            <input
                                            type="number"
                                            class="form-control curved"
                                            name="quarteirao"
                                            id="quarteirao"
                                            min="0"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="text-muted">N*</label>
                                            <input
                                            type="number"
                                            class="form-control curved"
                                            name="numero"
                                            id="numero"
                                            min="0"
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
                                    id="prev"
                                    src="/imagens/profile.png"
                                    class="profile-user-img img-responsive img-circle"
                                    style="height: 148px;width: 148px"
                                    />
                                </a>
                                </center>
                            </div>
                           <!-- <form>-->
  

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-muted"></label>
                                        <input required onchange="preview()" id="im" type="file" name="photos[]" class="form-input" multiple>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            
                            </div>
                            
                        </div>
                        <hr style="top:-20px"/>
                        <div class="form-group" style="float:right">
                            <div class="col-md-6" >
                            
                                <button type="submit" class="btn btn-primary curved">
                                    Seguinte
                                </button>
                            
                            </div>
                        </div>
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
@endsection
<script>
dados = [];
function preview(){
    //document.getElementById('prev').src=document.getElementById('im').value;
    
    //window.alert();
}
function validar(){
    window.alert(document.getElementById('data_nascimento').value);
}
function fase2(){
    dados.push(document.getElementById('apelido').value);
    dados.push(document.getElementById('nome').value);
    dados.push(document.getElementById('outros_nomes').value);
    dados.push(document.getElementById('sexo').value);
    dados.push(document.getElementById('data_nascimento').value);
    dados.push(document.getElementById('nacionalidade').value);
    dados.push(document.getElementById('naturalidade').value);
    dados.push(document.getElementById('avenida').value);
    dados.push(document.getElementById('bairro').value);
    dados.push(document.getElementById('quarteirao').value);
    dados.push(document.getElementById('numero').value);
    dados.push(document.getElementById('foto').value);
    window.location.href = "/dados/"+dados;
}
photos = [];
function gravarFoto(){
 photos.push(document.getElementById("photo").value);
 window.alert(photos);
}
</script>