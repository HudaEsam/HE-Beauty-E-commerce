<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <h1 class="h2 pb-4">{{trans('message.Categories')}}</h1>
            <ul class="list-unstyled templatemo-accordion">
                {{-- <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Makeup
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="{{route('show.category',['category' => 'FACE'])}}">FACE</a></li>
                        <li><a class="text-decoration-none" href="{{route('show.category',['category' => 'EYES'])}}">EYES</a></li>
                        <li><a class="text-decoration-none" href="{{route('show.category',['category' => 'LIPS'])}}">LIPS</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Sale
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Sport</a></li>
                        <li><a class="text-decoration-none" href="#">Luxury</a></li>
                    </ul>
                </li> --}}
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        {{trans('message.Products')}}
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Foundation</a></li>
                        <li><a class="text-decoration-none" href="#">Conceler</a></li>
                        <li><a class="text-decoration-none" href="#">Powder</a></li>
                        <li><a class="text-decoration-none" href="#">Eyeshadow</a></li>
                        <li><a class="text-decoration-none" href="#">Mascara</a></li>
                        <li><a class="text-decoration-none" href="#">Lashes</a></li>
                        <li><a class="text-decoration-none" href="#">Liquid Lipstick</a></li>
                        <li><a class="text-decoration-none" href="#">Lip liner</a></li>
                        <li><a class="text-decoration-none" href="#">Lip Gloss</a></li>


                    </ul>
                </li>
            </ul>
        </div>
       

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3">{{trans('message.All')}}</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="{{route('show.category',['category' => 'FACE'])}}">FACE</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none" href="{{route('show.category',['category' => 'EYES'])}}">EYES</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none" href="{{route('show.category',['category' => 'LIPS'])}}">LIPS</a>
                        </li>
                    </ul>
                </div>
                {{-- <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div> --}}
            </div>

            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                   
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="{{asset("storage/$product->image")}}">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    {{-- <li><a class="btn btn-success text-white" href="{{url("User.oneProduct/$product->id")}}"><i class="far fa-heart"></i></a></li> --}}
                                    <li><a class="btn btn-success text-white mt-2" href="{{url("User.oneProduct/$product->id")}}"><i class="far fa-eye"></i></a></li>
                                    {{-- <li><a class="btn btn-success text-white mt-2" href="{{url("User.myCart")}}"><i class="fas fa-cart-plus"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{url("User.singleProduct")}}" class="h3 text-decoration-none">{{$product->name}}</a>
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
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">{{$product->price}}</p>
                            <form action="{{url("myCart")}}" method="post"></form>
                        </form>
                        @include("success");
                            
                        </div>
                      
                    </div>
                    
                </div>

                @endforeach
                
            </div>
           
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->