@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            @component('alerts/alert')
                Insira os dados necessários para finalizar o registo da <strong>pessoa perdida</strong> 
            @endcomponent
            <input type="range" name="points" min="0" max="2" style="width:100%;height:20px">
            <div class="card">
                <div class="card-header"><label class="text-muted">Dados da pessoa perdida</label></div>
                <form method="POST" action="registar">
                    <div class="card-body">
                    <div class="row col-md-12">
                    
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                @csrf
                               
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Data de desaparecimento</label>
                                            <input
                                            type="date"
                                            class="form-control curved"
                                            name="data_ocorencia"
                                            required
                                            />
                                        </div>
                                    </div>
                                    
                                        
                                    <div class="col-md-5">
                                    <div class="form-group">
                                    <label class="text-muted">Visto por ultimo</label>
                                            <input
                                            name="visto_ultimo"
                                            type="text"
                                            class="form-control curved"
                                            placeholder="Ultimo lugar onde esteve a pessoa perdida"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-muted"><a class="obrigatorio" style="color:red">*</a> Grau de ligação</label>
                                            <select
                                            class="form-control curved"
                                            name="grau"
                                            required
                                            >
                                            <option value="Masculino">Pai/mãe</option>
                                            <option value="Feminino">irmão(a)</option>
                                            <option value="Feminino">Filho(a)</option>
                                            <option value="Masculino">Avo</option>
                                            <option value="Feminino">Neto</option>
                                            <option value="Feminino">Tio(a)</option>
                                            <option value="Feminino">Sobrinho(a)</option>
                                            <option value="Feminino">Amigo(a)</option>
                                            <option value="Feminino">Primo(a)</option>
                                            <option value="Feminino">Outro(a)</option>
                                            </select>
                                        </div>
                                    </div>
                           <!-- <form>-->
                           
                            
                            </div>
                            <div class="row">
                            
                            <div class="form-group col-sm-12">
                                <label class="text-muted">Informação adicional</label>
                                <textarea
                                placeholder="Adicione alguma informação como a cor da roupa que trazia, cor dos olhos, calçado, etc"
                                rows="6"
                                type="text"
                                name="descricao"
                                class="form-control curved"
                                ></textarea>
                            </div>
                            
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-12">
                            <input required type="checkbox" class="form-control" name="vehicle1" value="Bike" style="display:inline; inline-size:auto;    top: 12px;position: relative"><a class="obrigatorio" style="color:red">*</a>   Associar minha morada, email e celular</div>
                            </div>
                            </div>
                            
                        </div>
                        <hr style="top:-20px"/>
                        <div class="form-group" style="float:left">
                            <div class="col-md-6" >
                                <button class="btn btn-primary curved" onclick="goBack()">
                                    Voltar
                                </button>
                            </div>
                        </div>
                        <div class="form-group" style="float:right">
                            <div class="col-md-6" >
                            <a href="dados">
                                <button type="submit" class="btn btn-success curved">
                                    Registar
                                </button>
                            </a>    
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
function gravarFoto(){
    window.alert('testes');
}
function goBack() {
    window.history.back()
}
</script>