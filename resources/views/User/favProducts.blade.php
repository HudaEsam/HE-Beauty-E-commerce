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

            <a class="navbar-brand text-success logo h1 align-self-center" href="{{url("")}}">
                HE
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("")}}">{{trans("message.Home")}}</a>
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
                    {{-- <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a> --}}
                    <a class="nav-icon position-relative text-decoration-none" href="{{url("User.myCart")}}">
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
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
           
            <div class="card mb-4 product-wap rounded-0">
                <div class="card rounded-0">
                    <img class="card-img rounded-0 img-fluid" src="{{asset("storage/{$product['image']}")}}">
                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                        <ul class="list-unstyled">
                            {{-- <li><a class="btn btn-success text-white" href="{{url("")}}"><i class="far fa-heart"></i></a></li> --}}
                            {{-- <li><a class="btn btn-success text-white mt-2" href="{{url("User.oneProduct/{$product['product_id']}")}}"><i class="far fa-eye"></i></a></li> --}}
                            {{-- <li><a class="btn btn-success text-white mt-2" href="{{url("User.myCart")}}"><i class="fas fa-cart-plus"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{url("User.favProducts")}}" class="h3 text-decoration-none">{{$product['name']}}</a>
                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                        {{-- <li>M/L/X/XL</li> --}}
                        
                        <li class="pt-2">
                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                        </li>
                    </ul>
                    <li class="list-inline-item">
                        <h6>Price :</h6>
                    </li>
                    <li class="list-inline-item">
                        <p class="text-muted"><strong>{{$product['price']}}</strong></p>
                    </li>
                    <li class="list-inline-item">
                        <h6> Quantity :</h6>
                    </li>
                    <li class="list-inline-item">
                        <p class="text-muted"><strong>{{$product['numQuantity']}}</strong></p>
                    </li>
                        {{-- <ul class="list-unstyled d-flex justify-content-center mb-1">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                        </ul>     --}}
                    
                    <form action="{{url("makeOrder")}}" method="post">
                    @csrf
                    <div class="col d-grid">
                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Make Order</button>
                        <input type="date" name="day" id="">
                    </div>
                </form>
               
                    
                </div>
              
            </div>
            
        </div>

        @endforeach
        
    </div>
</body>

</html>   