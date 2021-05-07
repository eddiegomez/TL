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
        </style>
        
  
  @section('content')
            <!--About-->
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

            <section  class="teams roomy-80" style="padding-top: 20px !important;">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <a onclick="goBack()"><button class="btn-primary" style="background-color: #008CBA; padding-top: 7px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative;"><h6 style="color:white;"><i class="nav-icon fa fa-arrow-left"></i> Voltar</h6></button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                
                    <div class="col-sm-5">
                        <div class="img">
                            <img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>" alt="Fjords" width="100%" height="auto !important">
                        </div>
                        <div class="product-thumbs" tabindex="1" style="padding: 0px; padding-top: 15px; outline: none;">
						<div class="product-thumbs-track col-sm-12" style="padding: 0px; padding-top: 15px;">
							<div class="pt col-sm-4"><img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>" alt=""></div>
							<div class="pt col-sm-4" ><img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>" alt=""></div>
							<div class="pt col-sm-4" ><img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>" alt=""></div>
						</div>
					    </div>
                    </div>
                    <div class="col-sm-7" style="padding-top: 40px;">
                        <div class="row br">
                            <div class="col-sm-2 titulo"><h3 class="titulo h5e"><i class="nav-icon fa fa-user"></i></h3></div>
                            <div class="col-sm-10 dados"><h3 class="dados"><strong><?php echo $pessoa_perdida->nome; ?> <?php echo $pessoa_perdida->apelido; ?></strong></h3></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-calendar"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php $d=strtotime($pessoa_perdida->data_nascimento); echo date("d/m/Y", $d) ; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-map"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php echo $pessoa_perdida->nacionalidade; ?> - <?php echo $pessoa_perdida->naturalidade; ?> </strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-pencil"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php $d=strtotime($pessoa_perdida->data_desaparecimento); echo date("d/m/Y", $d) ; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-user-plus"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php echo $utilizador->nome_user; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-phone"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong>+258 <?php echo $utilizador->celular; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-envelope"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php echo $utilizador->email; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-map-marker"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php echo $utilizador->provincia; ?> - <?php echo $utilizador->bairro; ?>, <?php echo $utilizador->avenida; ?>, Nr.  <?php echo $utilizador->numero; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><?php echo $pessoa_perdida->obs ?? '...';  ?></h5></div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
            <section  class="teams roomy-80" style="padding-bottom: 0px; top: 100px;position:relatative">
            <footer id="contact" class="footer action-lage bg-black">
                <!--<div class="action-lage"></div>-->
                <div class="container">
                    <div class="row">
                        <div class="widget_area">
                            <div class="col-md-4">
                                <div class="widget_item widget_about">
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-location-arrow"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Localização</h6>
                                            <p>Av. Julius Nyerere, N.1024</p>
                                            <p><strong>Moçambique</strong>-Maputo</p>
                                        </div>
                                    </div>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-phone"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Celular :</h6>
                                            <p>+258 84 6499514</p>
                                            <p>+258 87 4007858</p>
                                        </div>
                                    </div>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-envelope-o"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Email:</h6>
                                            <p>Edsongomex@gmail.com</p>
                                        </div>
                                    </div>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-4">
                                <div class="widget_item widget_newsletter sm-m-top-50">
                                    <h5 class="text-white">Comente</h5>
                                    <form class="form-inline m-top-30">
                                        <div class="form-group">
                                            
                                            <input type="email" class="form-control" placeholder="Enter you Email">
                                            <button type="submit" class="btn text-center"><i class="fa fa-arrow-right"></i></button>
                                        </div>

                                    </form>
                                   
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-4">
                            <div class="widget_brand m-top-40">
                                        <a href="" class="text-uppercase">SGPP</a>
                                        <p>Uma forma inovadora de trabalhar.</p>
                                    </div>
                                    <ul class="list-inline m-top-20">
                                        <li>-  <a href=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href=""><i class="fa fa-behance"></i></a></li>
                                        <li><a href=""><i class="fa fa-dribbble"></i></a>  - </li>
                                    </ul>

                            </div>
                        </div>
                    </div>
                </div>
                
            </footer>
            </section>
           

            
        </div>
    <script type="text/javascript">
        function goBack() {
            window.history.back()
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
