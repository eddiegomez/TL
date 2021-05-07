<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SGPP</title>

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
  
    </script>
    </head>
    </head>
    <body>

        <div class="culmn">
            <!--Home page style-->


            <nav class="navbar navbar-default bootsnav navbar-fixed white">

                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->


                <div class="container"> 
                    <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div> 

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="#brand">
                            <img src="/imagens/logo.png" class="logo" alt="" style="width:350px;position:relative;top:-20px">
                            <!--<img src="assets/images/footer-logo.png" class="logo logo-scrolled" alt="">-->
                        </a>

                    </div>
                    <!-- End Header Navigation -->

                    <!-- navbar menu -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="row">
                    <div class="row hidden">
                    @if (Route::has('login'))
                            @auth
                            <li><a href="{{ url('/home') }}">Home</a></li>
                            @else
                                <i><a href="{{ route('login') }}">Login</a></i>

                                @if (Route::has('register'))
                                   <i><a href="{{ route('register') }}">Register</a></i>
                                @endif
                            @endauth
                    @endif
                    </div>
                   
                    
                        <div class="top-right links">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about">Sobre nós</a></li>
                            <li><a href="#casos">Casos</a></li>
                            <li><a href="#centros">Centros de Acolhimento</a></li>
                            <li><a href="#contact">Contactos</a></li>
                            <li><a href="{{ route('register') }}">Registar-se</a></li>
                            <li><a href="{{ route('login') }}">Entrar</a></li>
                            </ul>
                        </div>
                            
                   
                            
                        
                    </div>
                        
                    </div><!-- /.navbar-collapse -->
                </div> 

            </nav>
            <!--About-->
            <section id="about" class="teams roomy-80" style="background-color:#f2f2ff;padding-top: 100px; padding-bottom: 45px">
                <div class="container">
                    <div class="row">
                        <div class="page-top-info" style="height:50px">
                            <div class="container">
                            <div class="col-sm-11">
                                <h4>Pessoas perdidas</h4>
                                <div class="site-pagination" style="display:inline">
                                    <a href="/">Home</a> /
                                    <a href="/desaparecidos">Pessoas perdidas</a> /
                                    <a onclick="#">Detalhes da pessoa perdida</a>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <a onclick="goBack()"><button class="btn-primary" style="background-color: #008CBA; padding-top: 7px; padding-left: 15px;  padding-right: 15px;border-radius: 0.5rem; position:relative;"><h6 style="color:white;"><i class="nav-icon fa fa-arrow-left"></i></h6></button></a></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section><!-- End off Team & Skill section -->

            <section  class="teams roomy-80" style="padding-top: 50px !important;">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                
                    <div class="col-sm-5">
                        <div class="img">
                            <a target="_self" href="/detalhes/<?php echo $pessoa_perdida->idpessoa_perdida; ?>">
                                <img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>" alt="Fjords" width="100%" height="auto !important">
                            </a>
                        </div>
                        <div class="product-thumbs" tabindex="1" style="padding: 0px; padding-top: 15px; outline: none;">
						<div class="product-thumbs-track col-sm-12" style="padding: 0px; padding-top: 15px;">
							<div class="pt col-sm-4"><img src="/imagens/pessoas_perdidas/<?php echo $pessoa_perdida->foto; ?>"" alt=""></div>
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
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-home"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php echo $pessoa_perdida->denominacao; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-phone"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong>+258 <?php echo $pessoa_perdida->celular; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-envelope"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php echo $pessoa_perdida->email; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"><h5 class="titulo h5e"><i class="nav-icon fa fa-map-marker"></i></h5></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><strong><?php echo $pessoa_perdida->provincia; ?> - <?php echo $pessoa_perdida->bairro; ?>, <?php echo $pessoa_perdida->avenida; ?>, Nr.  <?php echo $pessoa_perdida->numero; ?></strong></h5></div>
                        </div>

                        <div class="row br">
                            <div class="col-sm-2 titulo"></div>
                            <div class="col-sm-10 dados"><h5 class="dados"><?php echo $pessoa_perdida->obs ?? '...';  ?></h5></div>
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
                <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80">
                    <div class="col-md-12">
                        <p class="wow fadeInRight" data-wow-duration="1s">
                            Made with 
                            <i class="fa fa-heart"></i>
                             
                            2020. All Rights Reserved
                        </p>
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
    </body>

</html>
