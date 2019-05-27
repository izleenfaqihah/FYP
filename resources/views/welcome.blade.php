<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ARCHITECT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/events') }}">Home</a>
                    @else
                        <!-- <a href="#">Login</a> -->

                        <!-- <div class="dropdown">
                            <button class="dropbtn">LOGIN 
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="{{ route('login') }}">Employee Login</a>
                              <a href="{{ route('admin.login') }}">Admin Login</a>
                            </div>
                          </div>  -->

                          <div class="dropdown" style="padding-right: 80px">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><strong>LOGIN</strong>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="{{ route('login') }}">Employee Login</a></li>
                              <li><a href="{{ route('admin.login') }}">Admin Login</a></li>
                            </ul>
                          </div>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"></a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- <div class="content">
                <div class="title m-b-md">
                    ARCHITECT
                </div>
            </div> -->

            <section style="background-image: url('/images/img_6.jpg'); width: 1500px; height: 700px; background-size:100%;">
              <div class="container">
                <div class="row align-items-center text-center justify-content-center">
                  <div class="col-md-8">
                    <h1 style="color: white"><strong>We have a passion in creating new and unique spaces</strong></h1>
                  </div>
                </div>
              </div>

              <div class="container-fluid">
               <div class="row">
                <div class="col" style="padding-top: 30px">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-center"><strong>PERFECTLY DESIGN</strong></h5>
                      <p class="card-text">All organizations are perfectly designed to get the results they are now getting. If we want different results, we must change the way we do things.</p>
                    </div>
                  </div>
                </div>

                <div class="col" style="padding-top: 30px">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-center"><strong>CAREFULLY PLANNED</strong></h5>
                      <p class="card-text">If something fails despite being carefully planned, carefully designed, and conscienctiously executed, that failure often bespeaks underlying change and, with it, opportunity.</p>
                    </div>
                  </div>
                </div>

              <div class="col" style="padding-top: 30px">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title text-center"><strong>SMARTLY EXECUTE</strong></h5>
                    <p class="card-text">There's no shortage of remarkable ideas, what's missing is the the will to execute them. A good plan execute now, is better than a perfect plan next week.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
            </section>

            


        </div>
        
    </body>
</html>
