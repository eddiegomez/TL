<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="<?php echo asset('assets/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/bootsnav.css')?>">

        <!--For Plugins external css-->
        <link rel="stylesheet" href="<?php echo asset('assets/css/plugins.css')?>" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="<?php echo asset('assets/css/style.css')?>">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="<?php echo asset('external/css/style.css')?>">

    </head>
    <body>

<div class="row">
<div class="wrapper" id="app">
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
                            <li><router-link to="/profileGestor" class="nav-link">Sobre nós</router-link></li>
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
            </div>

            <div class="row" style="position:relative;top:120px">
            <div class="container">
            <p>
            <router-link to="/foo"> Go to foo</router-link>
            </p>

            <router-view></router-view>
            </div>
            </div>
            </div>

    <script src="<?php echo asset('assets/js/vendor/jquery-1.11.2.min.js')?>"></script>
    <script src="<?php echo asset('assets/js/bootsnav.js')?>"></script>
    </body>

</html>