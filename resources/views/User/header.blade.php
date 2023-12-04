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
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
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