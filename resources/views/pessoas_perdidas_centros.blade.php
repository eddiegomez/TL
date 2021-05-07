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
                                    <a onclick="#">Pessoas perdidas</a> 
                                </div>
                            </div>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section><!-- End off Team & Skill section -->
            <div class="col-sm-2" style="padding-top: 0px;position:relative; top:-10px">
            <ul class="list-group" style="width:100%">
                <a href="/desaparecidos">
                <li class="list-group-item rad">
                    <span class="badge"><?php echo $qtd['qtd_perdidas']; ?></span>
                    Pessoas perdidas
                </li>
                </a>
                <a href="#">
                <li class="list-group-item rad active">
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
                <li class="list-group-item rad">
                    <span class="badge"><i class="nav-icon fa fa-search"></i></span>
                    Filtrar
                </li>
                </a>
                </ul>
                
            </div>
            <div class="col-sm-10" style="position:relative; top:-30px">
            @foreach ($pessoas_perdidas as $pessoa_perdida)
                <div class="col-sm-3"style="">
                    <div class="img">
                    <div
                    class="col-sm-12"
                    style="background-color:#3C8DBC; height:4px; position:relative"
                    ></div>
                    <a target="_self" href="/detalhes/<?php echo $pessoa_perdida->idpessoa_perdida; ?>">
                        <img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>" alt="Fjords" width="300" style="height:300px">
                    </a>
                    <h3 style="text-align: center"><strong><?php echo $pessoa_perdida->nome; ?> <?php echo $pessoa_perdida->apelido; ?></strong></h3>
                    <h6 style="text-align: center"><i class="nav-icon fa fa-home"></i> <?php echo $pessoa_perdida->denominacao; ?></h6>
                    <div class="desc" style="position:relative;top: -12px"><i class="nav-icon fa fa-calendar"></i>
                    <?php 
                            if(date("d", strtotime($pessoa_perdida->reg))==date("d") && date("m", strtotime($pessoa_perdida->reg))==date("m")){
                                if(date("h", strtotime($pessoa_perdida->reg))==date("h")){
                                    if(date("i", strtotime($pessoa_perdida->reg))==date("i")){
                                        "Agora mesmo";
                                    }else{
                                        $dif=date("i")-date("i", strtotime($pessoa_perdida->reg));
                                        echo $dif." minutos atrás";
                                    }
                                }else{
                                    $dif=date("h")-date("h", strtotime($pessoa_perdida->reg));
                                    if($dif==1)
                                        echo "A ".$dif." hora atrás";
                                    else
                                        echo "A ".$dif." horas atrás";
                                }
                            }
                            else{
                                echo date("d/m/Y", strtotime($pessoa_perdida->reg));
                            } 
                        ?>
                    </div>
                    <center><a href="/detalhes/<?php echo $pessoa_perdida->idpessoa_perdida; ?>"><button class="btn-primary" style="background-color: #008CBA; padding-top: 7px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative; bottom: 5px"><h6 style="color:white;"><i class="nav-icon fa fa-eye"></i></h6></button></a>
                    <button class="btn-primary"  data-toggle="modal" data-target="#myModal{{$pessoa_perdida->idpessoa_perdida}}" style="background-color: #00cc00; padding-top: 7px; padding-left: 15px;  padding-right: 15px; border-radius: 0.5rem; position:relative; bottom: 5px"><h6 style="color:white;"><i class="nav-icon fa fa-home"></i></h6></button>
                    </center>
                    </div>
                </div>
                <!-- Modal -->
                <div id="myModal{{$pessoa_perdida->idpessoa_perdida}}" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="row">
                                    <center> 
                                        <a href="#">
                                            <img
                                            :src="'/imagens/company.jpg'"
                                            class="profile-user-img img-responsive img-circle"
                                            style="height: 78px;width: 78px;"
                                            />
                                        </a>
                                        <h6 style="position:relative; padding-top: 6px">
                                        <h5><strong>{{$pessoa_perdida->denominacao}}</strong></h5>
                                        <h6>{{$pessoa_perdida->celular}}</h6>
                                        <h6>{{$pessoa_perdida->email}}</h6>
                                        <h6>{{$pessoa_perdida->provincia}}-{{$pessoa_perdida->avenida}}, N {{$pessoa_perdida->numero}}</h6>
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
        @endsection
    <script type="text/javascript">
     
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
