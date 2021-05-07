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
                        <a href="/desaparecidos">Pessoas Perdidas</a> /
                        <a onclick="#">Meus registos</a> 
                    </div>
                </div>
            </div>
        </div><!-- End off row -->
    </div><!-- End off container -->
</section><!-- End off Team & Skill section -->
<div class="container"> 

<section  class="teams roomy-80" style="position:relative; top:-20px;padding-top: 0px !important;">
    <div class="row">
        @foreach ($pessoas_perdidas as $pessoa_perdida)
            <div class="col-sm-4"style="">
            
                <div class="img">
                <div
                class="col-sm-12"
                style="background-color:#3C8DBC; height:4px; position:relative"
                ></div>
                <a target="_self" href="/detalhes/<?php echo $pessoa_perdida->idpessoa_perdida; ?>">
                    <img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>" alt="Fjords" width="300" style="height:300px">
                </a>
                
                <ul class="list-group" style="width:100%">
                    <li class="list-group-item rad ">
                        <h4 style="text-align: center"><strong><?php echo $pessoa_perdida->nome; ?> <?php echo $pessoa_perdida->apelido; ?></strong></h4>
                    </li>
                    <li class="list-group-item rad ">
                        <h6 style="float:left !important"><i class="nav-icon fa fa-calendar"></i></h6>
                        <h6 style="float:right !important"><?php $d=strtotime($pessoa_perdida->created_at); echo date("d/m/Y", $d) ; ?></h6>
                    </li>
                </ul>
                <center style="margin-top: 20px; padding-bottom: 12px">
                    <a href="/detalhes/<?php echo $pessoa_perdida->idpessoa_perdida; ?>">
                        <button class="btn-primary" style="background-color: #008CBA; padding-top: 7px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative; bottom: 5px">
                            <h6 style="color:white;"><i class="nav-icon fa fa-info-circle"></i></h6>
                        </button>
                    </a>
                    @if($pessoa_perdida->estado == 1)
                        <a href="/desfecho/<?php echo $pessoa_perdida->idpessoa_perdida; ?>">
                            <button class="btn-primary" style="background-color: #00cc00; padding-top: 7px; padding-left: 15px;  padding-right: 15px; border-radius: 0.5rem; position:relative; bottom: 5px">
                                <h6 style="color:white;"><i class="nav-icon fa fa-eye-slash"></i></h6>
                            </button>
                        </a>
                    @endif
                    @if($pessoa_perdida->estado == 0)
                        <a href="/activar/<?php echo $pessoa_perdida->idpessoa_perdida; ?>">
                            <button class="btn-primary" style="background-color: #00cc00; padding-top: 7px; padding-left: 15px;  padding-right: 15px; border-radius: 0.5rem; position:relative; bottom: 5px">
                                <h6 style="color:white;"><i class="nav-icon fa fa-eye"></i></h6>
                            </button>
                        </a>
                    @endif
                    <a href="/editar/<?php echo $pessoa_perdida->idpessoa_perdida; ?>">
                        <button class="btn-primary" style="background-color: #595959; padding-top: 7px; padding-left: 15px;  padding-right: 15px; border-radius: 0.5rem; position:relative; bottom: 5px">
                            <h6 style="color:white;"><i class="nav-icon fa fa-pen"></i></h6>
                        </button>
                    </a>
                </center>
                </div>
            </div>
        @endforeach
        
    </div>
    @if(count($pessoas_perdidas)==0)
    <div class="row">
        <div class="col-md-12">
            <center>
                <img src="/imagens/vazio1.png" style="width:490px"/>
                <h2><strong style="color:rgb(120,120,120)">Nenhum registo encontrado</strong></h2>
                <a href="/reg_pessoa_perdida"><button class="btn btn-primary" style="margin-top:10px">Registar</button></a>
            </center>
        </div>
    </div>
    @endif
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
@endsection
<script>
function gravarFoto(){
    window.alert('testes');
}
function goBack() {
    window.history.back()
}
</script>