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


        
            <!--Home page style-->
<div class="row">

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
                    </div>
                   
                    
                        <div class="top-right links">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about">Sobre nós</a></li>
                            <li><a href="#service">Concursos</a></li>
                            <li><a href="#portfolio">Publicidades</a></li>
                            <li><a href="#contact">Contactos</a></li>
                            <li><a href="{{ route('register') }}">Registar-se</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </div>
                    
                            
                        
                    </div>
                        
                    </div><!-- /.navbar-collapse --> 
                </div> 

            </nav>
            </div>
<div class="row">

            <div class="container col-sm-11" style="">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Registar pessoa perdida</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form @submit.prevent="publicarCaso">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label class="text-muted">Apelido</label>
                <input
                  placeholder="Apelido"
                  v-model="form.apelido"
                  type="text"
                  name="apelido"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('apelido') }"
                />
                <has-error :form="form" field="apelido"></has-error>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label class="text-muted">Nome</label>
                <input
                  placeholder="Nome"
                  v-model="form.nome"
                  type="text"
                  name="nome"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('nome') }"
                />
                <has-error :form="form" field="nome"></has-error>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label class="text-muted">Outros nomes</label>
                <input
                  placeholder="Opcional"
                  v-model="form.nome"
                  type="text"
                  name="outros"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('outros') }"
                />
                <has-error :form="form" field="outros"></has-error>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="text-muted">Data de Nascimento</label>
                <input
                  v-model="form.data_nascimento"
                  type="date"
                  name="data_nascimento"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('data_nascimento') }"
                />
                <has-error :form="form" field="data_nascimento"></has-error>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label class="text-muted">Nacionalidade</label>
                <input
                  placeholder="País"
                  v-model="form.nacionalidade"
                  type="text"
                  name="nacionalidade"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('nacionalidade') }"
                />
                <has-error :form="form" field="nacionalidade"></has-error>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="text-muted">Naturalidade</label>
                <input
                  placeholder="Provincia"
                  v-model="form.naturalidade"
                  type="text"
                  name="naturalidade"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('naturalidade') }"
                />
                <has-error :form="form" field="naturalidade"></has-error>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <label class="text-muted">Genero</label>
              <div class="row">
                <div class="col-sm-6" style="position: relative;float: left">
                  <input
                    value="Masculino"
                    v-model="form.masculino"
                    type="radio"
                    name="masculino"
                    class
                    :class="{ 'is-invalid': form.errors.has('masculino') }"
                  />
                  <label for="masculino" class="text-muted">Masculino</label>
                  <has-error :form="form" field="masculino"></has-error>
                </div>
                <br />
                <div class="col-sm-6" style="position: relative;float: right">
                  <input
                    value="Feminino"
                    v-model="form.feminino"
                    type="radio"
                    name="feminino"
                    class
                    :class="{ 'is-invalid': form.errors.has('feminino') }"
                  />
                  <label for="feminino" class="text-muted">Feminino</label>
                  <has-error :form="form" field="feminino"></has-error>
                </div>
                <br />
              </div>
            </div>

            <div class="col-sm-8">
              <div class="form-group">
                <label for="photo" class="col-sm-10 text-muted">Fotografia</label>
                <input type="file" @change="gravarFoto" name="photo" class="form-input" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="text-muted">Informação adicional</label>
            <textarea
              placeholder="Depoimento da pessoa perdida ou alguma informação adicional"
              rows="6"
              v-model="form.descricao"
              type="text"
              name="descricao"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('descricao') }"
            ></textarea>
            <has-error :form="form" field="descricao"></has-error>
          </div>

          <button type="submit" class="btn btn-primary float-right">Registar</button>
        </div>
        <!-- /.card-body -->
      </form>
    </div>
  </div>
</div>

<div class="row">
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
