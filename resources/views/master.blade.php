<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>UnionVD</title>
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link  href="{{ asset('vendor/css/clean-blog.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/"> {{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse " id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Contact</a>
                        </li>
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/welcome') }}">Welcome :{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class=" nav-link text-danger"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <hr>
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a target="_blank" href="https://www.facebook.com/DTN.VienDong">
                                <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; THCteam 2020</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/js/clean-blog.min.js')}}"></script>
        <script>
            $(document).ready(function(){
            var _token = $('input[name="_token"]').val();
            oldpost('', _token);
            function oldpost(id="", _token)
            {
              $.ajax({
                url:"{{ route('homepage.oldpost') }}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data)
                {
                  $('#load_more_button').remove();
                  $('#post_data').append(data);
                }
              })
            }
            $(document).on('click', '#load_more_button', function(){
                var id = $(this).data('id');
                $('#load_more_button').html('<b>Loading...</b>');
                oldpost(id, _token);
              });
            });
        </script>
    </body>
</html>