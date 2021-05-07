@extends('layouts.app')
        <link rel="stylesheet" href="<?php echo asset('assets/css/slick.css')?>"> 
        <link rel="stylesheet" href="<?php echo asset('assets/css/slick-theme.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/animate.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/iconfont.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/font-awesome.min.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/magnific-popup.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/bootsnav.css')?>">

        <!--For Plugins external css-->
        <link rel="stylesheet" href="<?php echo asset('assets/css/plugins.css')?>" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="<?php echo asset('assets/css/style.css')?>">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="<?php echo asset('assets/css/responsive.css')?>" />
        <style>
            div.img {
                margin: 5px;
                margin-top:20px;
                border: 1px solid #ccc;
                float: left;
                width: 100%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            .btn-default:hover {
                background-color: #4da6ff !important;
                border-color: #4da6ff !important;
            }

            div.img:hover {
                border: 1px solid #777;
            }

            img:hover {
                
            }

            div.img img {
                width: 100%;
                height: 400px;
            }

            div.desc {
                padding: 15px;
                text-align: center;
            }

            .btn-default {
                border: white;
                color: black;
            }

            .texto-botao {
                color: black;
            }

            .rad {
                border-radius: 0px !important;
                border-left-color: #ddd0 !important;
                border-right-color: #ddd0 !important;
            }
        </style>
        
  
  @section('content')
            <!--About-->
            <section id="about" class="teams roomy-80" style="background-color:#f2f2ff;padding-top: 20px; position:relative;top:-43px; padding-bottom: 30px">
                <div class="container">
                    <div class="row">
                        <div class="page-top-info" style="height:50px">
                            <div class="container">
                                <h4>Pessoas perdidas</h4>
                                <div class="site-pagination" style="display:inline">
                                    <a href="/">Home</a> /
                                    <a href="desaparecidos">Pessoas perdidas</a> /
                                    <a>Filtar</a> /
                                </div>
                            </div>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section><!-- End off Team & Skill section -->
            <div class="col-sm-2" style="padding-top: 0px;position:relative; top:-10px">
            <ul class="list-group" style="width:100%">
                <a href="/desaparecidos">
                <li class="list-group-item rad ">
                    <span class="badge"><?php echo $qtd['qtd_perdidas']; ?></span>
                    Pessoas perdidas
                </li>
                </a>
                <a href="/desaparecidos_centros">
                <li class="list-group-item rad">
                    <span class="badge"><?php echo $qtd['qtd_perdidas_centros']; ?></span>
                    Nos centros
                </li>
                </a>
                <a href="/pessoas_encontradas">
                <li href="eee" class="list-group-item rad">
                    <span class="badge"><?php echo $qtd['qtd_encontradas']; ?></span>
                    Pessoas encontradas
                </li>
                </a>
                <a href="/filtrar">
                <li class="list-group-item rad active">
                    <span class="badge"><i class="nav-icon fa fa-search"></i></span>
                    Filtrar
                </li>
                </a>
            </ul>
                
            </div>
            <div class="col-sm-10" style="position:relative; top:-15px">
            <div class="row" style="padding-left: 20px">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="text-muted">Filtrar por:</label>
                        <select
                        class="form-control curved"
                        name="filtro"
                        id="filtro"
                        required
                        onchange="buscar()"
                        >
                        <option value="nome">Nome</option>
                        <option value="provincia">Provincia</option>
                        <option value="nascimento">Data de nascimento</option>
                        <option value="desaparecimento">Data de desaparecimento</option>
                        <option value="entre">Intervalo de tempo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-3">
                    <label class="text-muted">Valor</label>
                    <input
                    placeholder="nome da pessoa perdida"
                    type="text"
                    name="nome"
                    id="nome"
                    class="form-control curved"
                    style="border-radius:1rem"/>

                    <select
                        class="form-control curved"
                        name="provincia"
                        id="provincia"
                        style="border-radius:1rem;display:none"
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

                    <input
                    type="date"
                    name="nascimento"
                    id="nascimento"
                    class="form-control curved"
                    style="border-radius:1rem;display:none"
                    />

                    <input
                    type="date"
                    name="desaparecimento"
                    id="desaparecimento"
                    class="form-control curved"
                    style="border-radius:1rem;display:none"
                    />

                    <input
                    type="date"
                    name="inferior"
                    id="inferior"
                    class="form-control curved"
                    style="border-radius:1rem;display:none"
                    />

                </div>
                <div class="col-sm-3" id="superior" style="display:none;">
                    <h5 class="text-muted" style="top:38px;position:relative;left: -15px"> até </h6>
                    <input
                        type="date"
                        name="superior"
                        id="superior2"
                        class="form-control curved"
                        style="border-radius:1rem;top:28px;position:relative;padding-left:15px"
                        />
                </div>
                <div class="col-sm1">
                    <button onclick="pesquisar()" class="form-control btn btn-primary" style="border-radius: 1rem;top:28px;position:relative;"><i class="nav-icon fa fa-search"></i></button>
                </div>
                
            </div>
            <div class="form-group col-sm-12" style="padding-top:10px;border-bottom: 1px solid #e6e6e6; padding-bottom:30px;position:relative; top:-40px"></div>
            @foreach ($pessoas_perdidas as $pessoa_perdida)
                <div class="col-sm-3"style="position:relative; top:-55px">
                    <div class="img">
                    <div
                    class="col-sm-12"
                    style="background-color:#3C8DBC; height:4px; position:relative"
                    ></div>
                    <a target="_self" href="/detalhes/<?php echo $pessoa_perdida->idpessoa_perdida; ?>">
                        <img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>" alt="Fjords" width="300" style="height:300px">
                    </a>
                    <h3 style="text-align: center"><strong><?php echo $pessoa_perdida->nome; ?> <?php echo $pessoa_perdida->apelido; ?></strong></h3>
                    <div class="desc"><i class="nav-icon fa fa-calendar"></i>  <?php $d=strtotime($pessoa_perdida->reg); echo date("d/m/Y", $d) ; ?></div>
                    <center><a href="/detalhes/<?php echo $pessoa_perdida->idpessoa_perdida; ?>"><button class="btn-primary" style="background-color: #008CBA; padding-top: 7px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative; bottom: 5px"><h6 style="color:white;"><i class="nav-icon fa fa-eye"></i></h6></button></a>
                    <button class="btn-primary" data-toggle="modal" data-target="#myModal{{$pessoa_perdida->idpessoa_perdida}}" style="background-color: #00cc00; padding-top: 7px; padding-left: 15px;  padding-right: 15px; border-radius: 0.5rem; position:relative; bottom: 5px"><h6 style="color:white;"><i class="nav-icon fa fa-user"></i></h6></button>
                    </center>
                    </div>
                </div>
                <!-- Modal -->
                <div id="myModal{{$pessoa_perdida->idpessoa_perdida}}" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="row">
                                    <center> 
                                        <a href="#">
                                            <img
                                            :src="'/imagens/profile.png'"
                                            class="profile-user-img img-responsive img-circle"
                                            style="height: 78px;width: 78px"
                                            />
                                        </a>
                                        <h6 style="position:relative; padding-top: 6px">
                                        <h5><strong>{{$pessoa_perdida->nome_user}} {{$pessoa_perdida->apelido_user}}</strong></h5>
                                        <h6>{{$pessoa_perdida->celular}}</h6>
                                        <h6>{{$pessoa_perdida->email}}</h6>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div> 
        </div>
    </section>
    
    <footer class="main-footer col-md-12" style="position:relative; left:-250px;">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        <i class="nav-icon fa fa-phone-square"></i> Edsongomex@gmail.com | +258 846499514
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="#">SGPP</a>.</strong> All rights reserved.
    </footer>

    <script type="text/javascript">
    /*var url = window.location.href;
    var res1 = url.slice(36,46);
    var res2 = url.slice(47,57);*/
    
    function buscar(){
        if(document.getElementById('filtro').value === "nome"){
            this.priorizar_nome();
        }
        if(document.getElementById('filtro').value === "provincia"){
            this.priorizar_provincia();
        }
        if(document.getElementById('filtro').value === "nascimento"){
            this.priorizar_nascimento();
        }
        if(document.getElementById('filtro').value === "desaparecimento"){
            this.priorizar_desaparecimento();
        }
        if(document.getElementById('filtro').value === "entre"){
            this.priorizar_entre();
        }
    }
    function inicializar(){
        if("nome" === <?php echo json_encode(session()->get('activo'));?>){
            this.priorizar_nome();
            document.getElementById('filtro').value == "nome";
            this.buscar();
        }
        if("provincia" === <?php echo json_encode(session()->get('activo'));?>){
            this.priorizar_provincia();
            document.getElementById('filtro').value == "provincia";
            this.buscar();
        }
        if("nascimento" === <?php echo json_encode(session()->get('activo'));?>){
            this.priorizar_nascimento();
            document.getElementById('filtro').value == "nascimento";
            this.buscar();
        }
        if("desaparecimento" === <?php echo json_encode(session()->get('activo'));?>){
            this.priorizar_desaparecimento();
            document.getElementById('filtro').value == "desaparecimento";
            this.buscar();
        }
        if("entre" === <?php echo json_encode(session()->get('activo'));?>){
            this.priorizar_entre();
            document.getElementById('filtro').value == "entre";
            this.buscar();
        }
    }
    function priorizar_nome(){
        document.getElementById('nome').style="display:inherit";
        document.getElementById('provincia').style="display:none";
        document.getElementById('nascimento').style="display:none";
        document.getElementById('desaparecimento').style="display:none";
        document.getElementById('inferior').style="display:none";
        document.getElementById('superior').style="display:none";
    }
    function priorizar_provincia(){
        document.getElementById('nome').style="display:none";
        document.getElementById('provincia').style="display:inherit";
        document.getElementById('nascimento').style="display:none";
        document.getElementById('desaparecimento').style="display:none";
        document.getElementById('inferior').style="display:none";
        document.getElementById('superior').style="display:none";
    }
    function priorizar_nascimento(){
        document.getElementById('nome').style="display:none";
        document.getElementById('provincia').style="display:none";
        document.getElementById('nascimento').style="display:inherit";
        document.getElementById('desaparecimento').style="display:none";
        document.getElementById('inferior').style="display:none";
        document.getElementById('superior').style="display:none";
    }
    function priorizar_desaparecimento(){
        document.getElementById('nome').style="display:none";
        document.getElementById('provincia').style="display:none";
        document.getElementById('nascimento').style="display:none";
        document.getElementById('desaparecimento').style="display:inherit";
        document.getElementById('inferior').style="display:none";
        document.getElementById('superior').style="display:none";
    }
    function priorizar_entre(){
        document.getElementById('nome').style="display:none";
        document.getElementById('provincia').style="display:none";
        document.getElementById('nascimento').style="display:none";
        document.getElementById('desaparecimento').style="display:none";
        document.getElementById('inferior').style="display:inherit";
        document.getElementById('superior').style="display:inherit";
    }
    
    function pesquisar(){
        var filtro = document.getElementById('filtro').value;
        if(filtro === "nome"){
            var chave = document.getElementById('nome').value;
            window.location.href = "/filtrar_casos/"+filtro+"/"+chave;
        }
        if(filtro === "provincia"){
            var chave = document.getElementById('provincia').value;
            window.location.href = "/filtrar_casos/"+filtro+"/"+chave;
        }
        if(filtro === "nascimento"){
            var chave = document.getElementById('nascimento').value;
            window.location.href = "/filtrar_casos/"+filtro+"/"+chave;
        }
        if(filtro === "desaparecimento"){
            var chave = document.getElementById('desaparecimento').value;
            window.location.href = "/filtrar_casos/"+filtro+"/"+chave;
        }

        if(filtro === "entre"){
            var chave1 = document.getElementById('inferior').value;
            var chave2 = document.getElementById('superior2').value;
            window.location.href = "/filtrar_entre/"+chave1+"/"+chave2;
        }

    }
    </script>
        <!-- JS includes -->

        <script src="<?php echo asset('assets/js/vendor/jquery-1.11.2.min.js')?>"></script>
        <script src="<?php echo asset('assets/js/vendor/bootstrap.min.js')?>"></script>
        <script src="<?php echo asset('assets/js/jquery.magnific-popup.js')?>"></script>
        <!--<script src="assets/js/jquery.easypiechart.min.js"></script>-->
        <script src="<?php echo asset('assets/js/jquery.easing.1.3.js')?>"></script>
        <!--<script src="assets/js/slick.js"></script>-->
        <script src="<?php echo asset('assets/js/slick.min.js')?>"></script>
        <script src="<?php echo asset('assets/js/js.isotope.js')?>"></script>
        <script src="<?php echo asset('assets/js/jquery.collapse.js')?>"></script>
        <script src="<?php echo asset('assets/js/bootsnav.js')?>"></script>
        <script src="<?php echo asset('assets/js/plugins.js')?>"></script>
        <script src="<?php echo asset('assets/js/main.js')?>"></script>

        @endsection