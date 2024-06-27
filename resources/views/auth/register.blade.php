

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('images/up.jpeg')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js')}}"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <title>CEAD - Login</title>
</head>
<body>
    <!-- Content -->
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
            <div style=" display:flex; justify-content:center; align-items:center;">
                <div class="card" style="max-width:400px;">
                    <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <span class="app-brand-logo demo">
                            <img src="{{asset('images/up.jpeg')}}" style="width: 100px; height: 100px;"
                             alt="" srcset="">
                        </span>
                        
                    </div>
                    <!-- /Logo -->
                     <div class="text-center pt-2">
                        <h4 class="mb-2">Tutoria - EAD</h4>
                        <p class="mb-4">crie novo usuario para gerir o seu sistema</p>
                     </div>
                    <form id="formAuthentication" class="mb-3" action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" 
                            placeholder="Nome" autofocus="">
                        </div>
                        <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" 
                            placeholder="E-mail" autofocus="">
                        </div>
                        <div class="mb-3 form-password-toggle">
                          <div class="d-flex justify-content-between">
                              <label class="form-label" for="password">Senha</label>
                              {{--<a href="auth-forgot-password-basic.html">
                              <small>Forgot Password?</small>
                              </a>--}}
                          </div>
                          <div class="input-group input-group-merge">
                              <input type="password" id="password" class="form-control" name="password" 
                              placeholder="············" aria-describedby="password">
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-3 form-password-toggle">
                          <div class="d-flex justify-content-between">
                              <label class="form-label" for="password">Senha</label>
                              {{--<a href="auth-forgot-password-basic.html">
                              <small>Forgot Password?</small>
                              </a>--}}
                          </div>
                          <div class="input-group input-group-merge">
                              <input type="password" id="password-confirmation" class="form-control" 
                              name="password_confirmation" 
                              placeholder="confirme a senha" aria-describedby="password-confirmation">
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me">
                            <label class="form-check-label" for="remember-me"> Lembrar </label>
                        </div>
                        </div>
                        <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Entrar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
  

</body>
</html>