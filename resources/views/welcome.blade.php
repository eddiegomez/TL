<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Concursos</title>

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

    </head>
    <body>
         <!-- Preloader -->
         <div id="loading"  style="background-color:#1E90FF">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div><!--End off Preloader -->


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
                            <li><a href="#service">Casos</a></li>
                            <li><a href="#portfolio">Centros de Acolhimento</a></li>
                            <li><a href="#contact">Contactos</a></li>
                            <li><a href="{{ route('register') }}">Registar-se</a></li>
                            <li><a href="{{ route('login') }}">Entrar</a></li>
                            </ul>
                        </div>
                            
                   
                            
                        
                    </div>
                        
                    </div><!-- /.navbar-collapse -->
                </div> 

            </nav>

            <!--Home Sections-->

            <section id="home" class="home bg-black fix"  style="height:0px">
                <div class="overlay" style="background-image:url('/imagens/covers/1.png'); fixed;"></div>
                <div class="container" >
                    <div class="row">
                        <div class="main_home text-center">
                            <div class="col-md-12">
                                <div class="hello">
                                    <div class="slid_item">
                                        <div class="home_text ">
                                            <h1 class=""  style="color:white">Pessoas Perdidas</h1>
                                            <h5 class="text-white text-uppercase">Busque por pessoas perdidas de forma facil, rápida e eficiente.</h5>
                                        </div>
                                    </div><!-- End off slid item -->

                                </div>
                            </div>

                        </div>


                        

                    </div><!--End off row-->
                </div><!--End off container -->
            </section> <!--End off Home Sections-->

            <!--About-->
            <section id="about" class="teams roomy-80">
                <div class="container">
                    <div class="row">
                        <div class="main_teams_content fix">
                            <div class="col-md-7">
                                <div class="teams_item">
                                    <div class="head_title">
                                        <h2 class="text-uppercase"> <strong>Sobre </strong>Nós</h2>
                                    </div>
                                    <p><strong>SGPP </strong> é um projecto que visa dinamizar o <strong>processo de busca de pessoas perdidas  </strong>. Este</p>


                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="teams_item text-center sm-m-top-50">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="/imagens/team-logo-2.jpg" alt="" class="img-circle" />
                                            <h4 class="m-top-20">SOFT<strong>MOZ</strong></h4>
                                            <div class="separator"></div>
                                            <ul class="list-inline">
                                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                            </ul>
                                        </div><!-- End off col-md-4 -->
                                        
                                        <div class="col-sm-6">
                                            <img src="" alt="" class="img-circle" />
                                            <h4 class="m-top-20">UEM</strong></h4>
                                            <div class="separator"></div>
                                            <ul class="list-inline">
                                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                            </ul>
                                        </div><!-- End off col-md-4 -->
                                    </div>
                                </div>
                            </div><!-- End off col-md-6 -->
                        </div><!-- End off main Team -->
                    </div><!-- End off row -->
                </div><!-- End off container -->
            </section><!-- End off Team & Skill section -->
 <!--Business Section-->
 <section id="service" class="service bg-grey roomy-70">
                <div class="container">
                    <div class="row">
                        <div class="main_service">
                            <div class="col-md-6">
                                <div class="service_slid">
                                    <div class="slid_shap bg-yellow" style="background-color:#1E90FF"></div>
                                    <div class="service_slid_item text-center">
                                        <div class="service_slid_text">
                                            <span class="icon icon icon-tools text-black"></span>
                                            <h5 class="text-black m-top-20">Publique um concurso</h5>
                                        </div>
      
                                        <div class="service_slid_text"  style="height:85px">
                                            <img src="/imagens/cadeira.jpg" class="logo" alt=""  style="height:190px">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="service_item sm-m-top-50">
                                    <div class="head_title">
                                        <h2 class="text-uppercase"><strong>Concursos</strong></h2>
                                    </div>
                                    <div class="service_content">
                                        <h3>Faça uso da plataforma para publicar <strong>concursos</strong> garantindo que os potenciais clientes tenham acesso ao mesmo em tempo real, facilitando a comunicação entre ambos</strong> </h3>

                                        <a href="home2" class="btn btn-default m-top-40">Publicar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End off Business section -->



            <section id="portfolio" class="portfolio margin-top-120">

<!-- Publicidade-->
<div class="container">
    <div class="row">
        <div class="main-portfolio roomy-80">

            <div class="col-md-4">
                <div class="head_title text-left sm-text-center wow fadeInDown">
                    <h2>Publicidades</h2>
                </div>
            </div>

            <div class="col-md-8">
                <div class="filters-button-group text-right sm-text-center">
                    <button class="btn button is-checked" data-filter="*">Todas</button>
                    <button class="btn button" data-filter=".transition">Material de Escritório</button>
                    <button class="btn button" data-filter=".alkali">Veículos</button>
                </div>
            </div>



            <div style="clear: both;"></div>

            <div class="grid text-center">

                <div class="grid-item transition metal ium">
                    <img alt="" src="/imagens/cadeira.jpg">
                    <div class="grid_hover_area text-center">
                        <div class="girid_hover_text m-top-110">
                            <h4 class="text-white">Cadeira Giratória MB-C730</h4>
                            <p class="text-white">Base cromada-Travel Max</p>
                            <a href="/imagens/cadeira.jpg" class="btn btn-primary popup-img">Ver detalhes</a>
                        </div>
                    </div><!-- End off grid Hover area -->
                </div><!-- End off grid item -->

    
                <div class="grid-item alkali">
                    <img alt="" src="/imagens/carro.png">
                    <div class="grid_hover_area text-center">
                        <div class="girid_hover_text m-top-50">
                            <h4 class="text-white">Aluger de Viaturas</h4>
                            <p class="text-white">Auto-carros, Ligeiros, camioes,e mais</p>
                            <a href="/imagens/carro.png" class="btn btn-primary popup-img">Ver detalhes</a>
                        </div>
                    </div><!-- End off grid Hover area -->
                </div><!-- End off grid item -->

                <div class="grid-item alkali ar" >
                    <img alt="" src="/imagens/STSML2.jpg">
                    <div class="grid_hover_area text-center">
                        <div class="girid_hover_text m-top-50">
                            <h4 class="text-white">STSML</h4>
                            <p class="text-white">Serviços de Reboque e Mecanica</p>
                            <a href="/imagens/STSML2.jpg" class="btn btn-primary popup-img">Ver detalhes</a>
                        </div>
                    </div><!-- End off grid Hover area -->
                </div><!-- End off grid item -->

                
            </div>



            <div style="clear: both;"></div>


        </div>
    </div>
</div><!-- Portfolio container end -->
</section><!-- End off portfolio section -->


            <footer id="contact" class="footer action-lage bg-black p-top-80">
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
                                        <a href="" class="text-uppercase">CONCURSOS </a>
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
                             
                            2019. All Rights Reserved
                        </p>
                    </div>
                </div>
            </footer>




        </div>

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
