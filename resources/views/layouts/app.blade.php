<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <style>
    .wizard-navbar > ul li a span {
    background-color: #eeeeee;
    border-radius: 50%;
    color: #898b8f;
    display: block;
    height: 40px;
    left: 50%;
    line-height: 40px;
    margin-left: -20px;
    margin-top: -50px;
    position: absolute;
    text-align: center;
    transition: all 300ms ease-in-out 0s;
    -webkit-transition: all 300ms ease-in-out 0s;
    -o-transition: all 300ms ease-in-out 0s;
    -moz-transition: all 300ms ease-in-out 0s;
    width: 40px;
    z-index: 5;
    display: none;
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('membership/home') }}">
                        <small>{{ str_replace('_',' ',config('app.name', 'Laravel')) }}</small>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('bower_components/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <?php //$gejala = []; ?>
    <script>
     $(document).ready(function () {
          // Form Wizard
          if ($.isFunction($.fn.bootstrapWizard))
          {

              $(".validate-form-wizard").each(function (i, formwizard)
              {
                  var $this = $(formwizard);
                  var $progress = $this.find(".steps-progress div");

                  var $validator = $this.validate({
                     
                  });

                  // Validation
                  var checkValidaion = function (tab, navigation, index)
                  {
                      if ($this.hasClass('validate'))
                      {
                          var $valid = $this.valid();
                          if (!$valid) {
                              $validator.focusInvalid();
                              return false;
                          }
                      }

                      return true;
                  };

                  $this.bootstrapWizard({
                      tabClass: 'wizard-steps',
                      onNext: checkValidaion,
                      onTabClick: checkValidaion,
                      onTabShow: function ($tab, $navigation, index)
                      {
                          $tab.removeClass('completed');
                          $tab.prevAll().addClass('completed');
                          $tab.nextAll().removeClass('completed');
                      }
                  });
              });



          }
     });
     </script>

</body>
</html>
