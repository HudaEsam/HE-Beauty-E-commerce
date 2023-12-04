<!DOCTYPE html>
<html lang="{{trans("message.lang")}}" dir="{{trans("message.dir")}}">

<head>
    <title>HE Shop - Product Detail Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset("assets")}}/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets")}}/img/favicon.ico">

    <link rel="stylesheet" href="{{asset("assets")}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("assets")}}/css/templatemo.css">
    <link rel="stylesheet" href="{{asset("assets")}}/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset("assets")}}/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets")}}/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset("assets")}}/css/slick-theme.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>
<body>
      <!-- Header -->
      <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="{{url("redirect")}}">
                HE
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("redirect")}}">{{trans("message.Home")}}</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("User.shop")}}">{{trans("message.Shop")}}</a>
                        </li>
                        @if (session()->has("lang")&&session()->get("lang")=="ar")
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("change/en")}}">{{trans("message.English")}}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("change/ar")}}">{{trans("message.Arabic")}}</a>
                        </li>
                        @endif
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("dashboard")}}">{{trans("message.Login")}}</a>
                        </li>  
                        @endguest
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("dashboard")}}">{{trans("message.Logout")}}</a>
                        </li> 
                        @endauth
                       
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
</body>

</html>   