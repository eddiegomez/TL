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
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
            }

            .btn-default:hover {
                background-color: #4da6ff !important;
                border-color: #4da6ff !important;
            }

            .card:hover {
                background-color: #f2f2f2 !important;
                border-color: #4da6ff !important;
            }

            div.img:hover {
                border: 1px solid #777;
            }

            .pt:hover {
                border: 1px solid #777;
            }

            div.img img {
                width: 100%;
                
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

            .titulo {
                color: #808080;
                text-transform: uppercase;
            }
            
            .h5e {
                float: right;
            }

            .dados {
                color: #414141;
            }

            .br{
                padding: 5px;
            }
        </style>
        
  
  @section('content')
  <section id="about" class="teams roomy-80" style="background-color:#f2f2ff;padding-bottom: 35px; padding-top: 35px; position:relative;top: -40px !important">
        <div class="container">
            <div class="row">
                <div class="page-top-info" style="height:50px">
                    <div class="container">
                        <h4>Pessoas perdidas</h4>
                        <div class="site-pagination" style="display:inline">
                            <a href="/">Home</a> /
                            <a href="/desaparecidos">Pessoas perdidas</a> /
                            <a onclick="#">Detalhes da pessoa perdida</a>
                        </div>
                    </div>
                </div>
            </div><!-- End off row -->
        </div><!-- End off container -->
    </section><!-- End off Team & Skill section -->

    <section  class="teams roomy-80" style="padding-top: 0px !important;">
        @if($dados['recente'])
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    @component('alerts/alert')
                        Registado com sucesso.
                    @endcomponent
                </div>
                <div class="col-sm-2">
                </div>
            </div>
        @endif   
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <a onclick="goBack()"><button class="btn btn-primary" style="left: 30px; padding-top: 15px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative;"><h6 style="color:white;"><i class="nav-icon fa fa-arrow-left"></i> Voltar</h6></button></a>
                @if($dados['utilizador']->users_id == Auth::user()->id && $dados['pessoa_perdida']->estado == 1)
                    <a href="/desfecho/<?php echo $dados['pessoa_perdida']->idpessoa_perdida; ?>"><button class="btn btn-success" style="left: 40px;padding-top: 15px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative;"><h6 style="color:white;"><i class="nav-icon fa fa-eye-slash"></i> Desactivar</h6></button></a>
                @endif
                @if($dados['utilizador']->users_id == Auth::user()->id && $dados['pessoa_perdida']->estado == 0)
                    <a href="/activar/<?php echo $dados['pessoa_perdida']->idpessoa_perdida; ?>"><button class="btn btn-primary" style="left: 40px;padding-top: 15px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative;"><h6 style="color:white;"><i class="nav-icon fa fa-eye"></i> Activar</h6></button></a>
                @endif
                @if($dados['utilizador']->users_id == Auth::user()->id)
                    {{$iduser = Auth::user()->id}}
                    <a href="/apagar/<?php echo $dados['pessoa_perdida']->idpessoa_perdida; ?>/<?php echo $iduser; ?>"><button class="btn btn-danger" style="left: 30px;padding-top: 15px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative;"><h6 style="color:white;"><i class="nav-icon fa fa-trash"></i> Apagar</h6></button></a>
                @endif
            </div>
        </div>
        <div class="col-sm-2">
            
        </div>
        <div class="col-sm-8">
        
            <div class="col-sm-5">
                <div class="img">
                <!--<img src="/imagens/pessoas_perdidas/" alt="/imagens/pessoas_perdidas/default.png" width="100%" height="450px !important;">-->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox" height="100px !important;">
                                <div class="item active" >
                                    <img src="/imagens/pessoas_perdidas/<?php echo $dados['fotos'][0]->foto?>"  style="height:400px !important;" alt="">
                                </div>
                                @for($i=1; $i<count($dados['fotos']);$i++)
                                    <div class="item">
                                        <img src="/imagens/pessoas_perdidas/<?php echo $dados['fotos'][$i]->foto?>" style="height:400px !important;" alt="/imagens/pessoas_perdidas/default.png">
                                    </div>
                                @endfor
                        </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon" aria-hidden="true"><i class="nav-icon fa fa-arrow-left" style="position:relative; top: 200px !important"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon" aria-hidden="true"><i class="nav-icon fa fa-arrow-right" style="position:relative; top: 200px !important"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                    <ul class="list-group" style="width:100%">
                    <li class="list-group-item rad ">
                        <h3 style="text-align: center"><strong><?php echo $dados['pessoa_perdida']->nome; ?> <?php echo $dados['pessoa_perdida']->apelido; ?></strong></h3>
                    </li>
                    <li class="list-group-item rad ">
                        <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-calendar"></i></h6>
                        <h6 class="text-muted" style="float:right !important"><?php $d=strtotime($dados['pessoa_perdida']->data_nascimento); echo date("d/m/Y", $d) ; ?></h6>
                    </li>
                    <li class="list-group-item rad ">
                        <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-map"></i></h6>
                        <h6 class="text-muted" style="float:right !important"><?php echo $dados['pessoa_perdida']->nacionalidade; ?> - <?php echo $dados['pessoa_perdida']->naturalidade; ?></h6>
                    </li>
                    <li class="list-group-item rad "> 
                        <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-pen"></i></h6>
                        <h6 class="text-muted" style="float:right !important"><?php $d=strtotime($dados['pessoa_perdida']->reg); echo date("d/m/Y", $d) ; ?></h6>
                    </li>

                    <li class="list-group-item rad ">
                        <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-map"></i></h6>
                        <h6 class="text-muted" style="float:right !important"><?php echo $dados['utilizador']->pais; ?> - <?php echo $dados['utilizador']->provincia; ?></h6>
                    </li>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <center><a data-toggle="collapse" class="text-muted" href="#collapse1">Registado por</a></center>
                            </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                            <ul class="list-group">
                            @if($dados['pessoa_perdida']->centro_idcentro ==null)
                                <li class="list-group-item rad ">
                                    <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-user-plus"></i></h6>
                                    <h6 class="text-muted" style="float:right !important"><?php echo $dados['entidade']->nome; ?></h6>
                                </li>
                            @endif
                            @if($dados['pessoa_perdida']->centro_idcentro != null)
                                <li class="list-group-item rad ">
                                    <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-home"></i></h6>
                                    <h6 class="text-muted" style="float:right !important"><?php echo $dados['entidade']->denominacao; ?></h6>
                                </li>
                            @endif
                            <li class="list-group-item rad ">
                                <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-phone"></i></h6>
                                <h6 class="text-muted" style="float:right !important">+258 <?php echo $dados['entidade']->celular; ?></h6>
                            </li>
                            <li class="list-group-item rad ">
                                <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-envelope"></i></h6>
                                <h6 class="text-muted" style="float:right !important"><?php echo $dados['entidade']->email; ?></h6>
                            </li>
                            <li class="list-group-item rad ">
                                <h6 style="float:left !important"><i class="nav-icon text-muted fa fa-map-marker"></i></h6>
                                <h6 class="text-muted" style="float:right !important"><?php echo $dados['entidade']->bairro; ?>, Av. <?php echo $dados['utilizador']->avenida; ?>, Nr.  <?php echo $dados['utilizador']->numero; ?></h6>
                            </li>
                            </ul>
                        </div>
                    </div>
                    
                   
                    
                </ul>
                </div>
                
            </div>
            <div class="col-sm-7" style="top:20px">
            @foreach($dados['comentarios'] as $comentario)
                <div class="card" style="padding: 15px">
                    <div class="card-tools">
                        <strong style="float:left !important; ">{{$comentario->nome_user}}</strong>
                        <a type="button" data-toggle="modal" data-target="#myModal{{$comentario->idcomentario}}" style="padding-left: 10px;padding-top: 3px">
                        <i class="nav-icon text-muted fa fa-user-circle"></i></a>
                        <!--<input id="comments" type="text" hidden value=<?php echo $comentario->comentario;?>></input>-->
                        @if($comentario->nome_user === Auth::user()->name)
                        <a href="/apagar/<?php echo $comentario->idcomentario; ?>/<?php echo $dados['pessoa_perdida']->idpessoa_perdida; ?>" style="padding-left: 6px;"><i class="nav-icon text-muted fa fa-trash"></i></a>
                        <a onclick="actualizar()" style="padding-left: 6px;"><i class="nav-icon text-muted fa fa-pen"></i></a>
                        @endif
                        <p class="text-muted" style="float:right !important;"><?php $d=strtotime($comentario->created_at); echo date("h:i:sa", $d); ?> (<?php $d=strtotime($comentario->created_at); echo date("d-m-Y", $d); ?>)</p>
                    </div>
                    <p>{{$comentario->comentario}}</p>
                </div>

                <!-- Modal -->
                <div id="myModal{{$comentario->idcomentario}}" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
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
                                        <h5><strong>{{$comentario->nome_user}}</strong></h5>
                                        <h6>{{$comentario->celular}}</h6>
                                        <h6>{{$comentario->email}}</h6>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <form method="POST" action="/comentar">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="text-muted">Comentários</label>
                        <textarea
                        placeholder="Deixe aqui o seu comentário"
                        rows="3"
                        type="text"
                        name="comentario"
                        class="form-control curved"
                        style="border-radius:1rem"
                        required
                        ></textarea>
                    </div>
                    <input hidden required name="user" type="number" value='{{ Auth::user()->id }}'>
                    <input hidden required name="caso" type="number" value="{{ $dados['caso']->idcaso }}">
                </div>
                <button class="btn btn-success" type="submit" style="padding-top: 12px; padding-left: 15px;  padding-right: 15px; border-radius: 0.5rem; position:relative; float:right"><h6 style="color:white;">Comentar</h6></button>
            </form>
               
            </div>
        </div>
        <div class="col-sm-12">
        
        </div>
    </section>
    </div>
    <footer class="main-footer col-md-12" style="position:relative; left:-250px;">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        <i class="nav-icon fa fa-phone-square"></i> Edsongomex@gmail.com | +258 846499514
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="#">SGPP</a>.</strong> All rights reserved.
    </footer>
</div>

    <script type="text/javascript">
        function goBack() {
            window.history.back()
        }
        function actualizar(){
            document.getElementById('comentario').innerHtml = document.getElementById('comments').value;
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

