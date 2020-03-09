<?php $__env->startSection('content'); ?>

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
            
          <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <p class="text-muted">Email</p>

              <!-- Input -->
              <input type="email" name="email" id="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="nome@exemplo.com"  value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
              <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
              <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="row">
                <div class="col">
                      
                  <!-- Label -->
                  <p class="text-muted">Senha</p>

                </div>
                <div class="col-auto">
                  
                 
                <?php if(Route::has('password.request')): ?>
                  <a class="form-text small text-muted" href="<?php echo e(route('password.request')); ?>">
                    <?php echo e(__('Esqueceu-se da senha??')); ?>

                  </a>
                <?php endif; ?>

                </div>
              </div> <!-- / .row -->

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password">

                    <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                      </span>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\EDDY\PROJECTOS\trabalho\resources\views/auth/login.blade.php ENDPATH**/ ?>