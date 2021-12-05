<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="icon" href="{{asset('Backend/main-dashboard/../images/opera.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Errandz</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome Back, {{auth()->user()->firstname.' '.auth()->user()->lastname}}</div>


                @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif
                <div class="card-body">
                Enter Code that is sent to your Email before continuing

                    <form method="POST" action="{{ route('auth.validateotp') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Code    </label>

                            <div class="col-md-6">
                                <input id="email_comfirmation" type="name" class="form-control " name="email_comfirmation" required>

                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Continue') }}
                                </button>
                                </form>
                              
                            
                            </div>

                        </div>

                        <!-- <form method="POST" action="{{ route('auth.resendOtp') }}">
                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                        Resend OTP
                                </button>
                                        </form> -->
                    
                </div>
            </div>
        </div>
    </div>
</div>

        </main>
    </div>
</body>
</html>


