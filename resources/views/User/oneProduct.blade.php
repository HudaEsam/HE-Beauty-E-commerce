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
    <!-- Start Top Nav -->
    {{-- <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav> --}}
    <!-- Close Top Nav -->


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
                            <a class="nav-link" href="{{url("register")}}">{{trans("message.Register")}}</a>
                        </li> 
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
                        {{-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span> --}}
                    </a>
                    {{-- <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a> --}}
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
<!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{asset("storage/$product->image")}}" alt="" id="">
                    </div>
                 
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                     <div class="card">
                        <div class="card-body">  
                            </a><h1 class="h2">{{$product->name}}</h1>
                            <p class="h3 py-2">{{$product->price}}</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">{{trans("message.Rating 4.8 | 36 Comments")}}</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>{{trans("message.Brand")}}</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>HE</strong></p>
                                </li>
                            </ul>

                            <h6>{{trans("message.Description")}}</h6>
                            <p>{{$product->desc}}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>{{trans("message.Avaliable Quantity")}}</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$product->quantity}}</strong></p>
                                </li>
                 

                            <form action="{{url("User.myCart/$product->id")}}" method="post">
                                @csrf
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="col-md-6" class="form-control qty-input" value="1">

                                
                                   
                                </div>
                            </div>
                                        
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                {{trans("message.Quantity")}}
                                              <input type="hidden" name="numQuantity" id="" value="1">
                                          </li>
                                          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                          <script>
                                           $(document).ready(function() {
                                             $('#btn-plus').click(function() {
                                               var value = parseInt($('#var-value').text());
                                               value++;
                                               $('#var-value').text(value);
                                               $('input[name=numQuantity]').val(value);
                                             });
                                             $('#btn-minus').click(function() {
                                               var value = parseInt($('#var-value').text());
                                               value--;
                                               $('#var-value').text(value);
                                               $('input[name=numQuantity]').val(value);
                                             });
                                           });
                                          </script>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    {{-- <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                    </div> --}}
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">{{trans("message.Add To Cart")}}</button>
                                    </div>
                                </div>
                            </form>
                            @include("success");


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>