@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            @component('alerts/alert')
                Ao registar-se poderá <strong>publicar e buscar</strong> casos de <strong>pessoas perdidas</strong>.
            @endcomponent
            <div class="card">
                <div class="card-header"><label class="text-muted">Registo de Utilizador</label></div>
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
                                            required
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
                                            required
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
                                            required
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
                                    :src="'/imagens/profile.png'"
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
                                            />
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            
                            </div>
                            
                        </div>
                        <hr style="top:-20px"/>
                        <div class="form-group" style="float:right">
                            <div class="col-md-6" >
                                <button type="submit" class="btn btn-primary">
                                    Registar
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
