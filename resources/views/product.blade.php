@extends('layout.app')


@section('content')
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Shop</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== SHOP PART START ======-->

    <section id="shop-page" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-top-search">
                        <div class="shop-bar">
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="shop-grid-tab" data-toggle="tab" href="#shop-grid" role="tab" aria-controls="shop-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a id="shop-list-tab" data-toggle="tab" href="#shop-list" role="tab" aria-controls="shop-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                                </li>

                            </ul> <!-- nav -->
                        </div><!-- shop bar -->

                    </div> <!-- shop top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="shop-grid" role="tabpanel" aria-labelledby="shop-grid-tab">
                    <div class="row justify-content-center">
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="single-publication mt-30 text-center">
                                <div class="image">
                                    <img src="{{$product->image}}" alt="Publication">
                                    <div class="add-cart">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content pt-20">
                                    <h5 class="book-title"><a href="#">{{$product->name}}</a></h5>

                                    <div class="price-btn d-flex align-items-center justify-content-between">
                                        <div class="price pt-20">
                                            <span class="discount-price">NGN{{number_format($product->price + 1000)}}</span>
                                            <span class="normal-price">NGN{{number_format($product->price)}}</span>
                                        </div>
                                        <div class="button pt-10">
                                            <a href="{{route('product.single', ['slug'=>$product->slug])}}" class="main-btn"><i class="fa fa-cart-plus"></i> Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- single publication -->
                        </div>
@endforeach

                    </div> <!-- row -->
                </div>

            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12 pagination justify-content-center mt-50">


                        {{ $products->links() }}

                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES PART ENDS ======-->
    @endsection