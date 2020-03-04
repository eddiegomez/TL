@extends('layouts.app')

@section('content')

    <!-- CONTENT
    ================================================== -->
    <div class="container">
      <div class="row justify-content-center" style="position:relative; top:75px">
        <div class="col-12 col-md-5 col-xl-4 my-5">
          

          <!-- Heading -->
          <a class="navbar-brand" href="#brand">
                            <img src="/imagens/logo.png" class="logo" alt="" style="width:350px;position:relative;top:-20px">
                            <!--<img src="assets/images/footer-logo.png" class="logo logo-scrolled" alt="">-->
                        </a>
            
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <p class="text-muted">Email</p>

              <!-- Input -->
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="nome@exemplo.com"  value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="row">
                <div class="col">
                      
                  <!-- Label -->
                  <p class="text-muted">Senha</p>

                </div>
                <div class="col-auto">
                  
                 
                @if (Route::has('password.request'))
                  <a class="form-text small text-muted" href="{{ route('password.request') }}">
                    {{ __('Esqueceu-se da senha??') }}
                  </a>
                @endif

                </div>
              </div> <!-- / .row -->

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                <!-- Icon -->
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>

              </div>
            </div>

            <!-- Submit -->
            <button class="btn btn-lg btn-block btn-primary mb-3">
              Entrar
            </button>
            

            <!-- Link -->
            <div class="text-center">
              <small class="text-muted text-center">
                Ainda não possui uma conta? <a href="sign-up.html">Registe-se</a>.
              </small>
            </div>
            
          </form>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->
  </body>

@endsection
