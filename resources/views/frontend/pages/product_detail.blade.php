@extends('frontend.layouts.master')
@section('title','E-SHOP || HOME PAGE')
@section('main-content')
<section class="shop single section">
    <div class="container">
        <div class="row"> 
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <!-- Images slider -->
                            <div class="flexslider-thumbnails">
                                
                            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                <ul class="slides" style="width: 1200%; transition-duration: 0.6s; transform: translate3d(-2220px, 0px, 0px);">
                                    {{-- @php
                                       $photos=explode(',',$products->photo);    
                                    @endphp --}}
                                    @foreach ($products as $key=>$product)
                                    <li class="">
                                        {{-- <a class="gallery_img" href="{{$products->photo}}" 
                                        title="{{$products->title}}">
                                    </a> --}}
                                        <img class="d-block w-100" src="{{$products->photo}}" alt="#">
                                    </li>
                                    @endforeach
                                </ul>
                            </div></div>
                            <!-- End Images slider -->
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="product-des">
                            <!-- Description -->
                            <div class="short">
                                <h4>{{$products->title}}</h4>
                                <div class="rating-main">
                                    <ul class="rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                        <li class="dark"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <a href="#" class="total-review">(102) Review</a>
                                </div>
                                <p class="price"><span class="discount">${{number_format($products->price,3)}}</span><s>${{number_format($products->discount,3)}}</s> </p>
                                <p class="description">{!! ($products->description) !!}</p>
                            </div>
                            <!--/ End Description -->
                            <!-- Color -->
                            <div class="color">
                                <h4>Available Options <span>Color</span></h4>
                                <ul>
                                    <li><a href="#" class="one"><i class="ti-check"></i></a></li>
                                    <li><a href="#" class="two"><i class="ti-check"></i></a></li>
                                    <li><a href="#" class="three"><i class="ti-check"></i></a></li>
                                    <li><a href="#" class="four"><i class="ti-check"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Color -->
                            <!-- Size -->
                            <div class="size">
                                <h4>Size</h4>
                                <ul>
                                    <li><a href="#" class="one">S</a></li>
                                    <li><a href="#" class="two">M</a></li>
                                    <li><a href="#" class="three">L</a></li>
                                    <li><a href="#" class="four">XL</a></li>
                                    <li><a href="#" class="four">XXL</a></li>
                                </ul>
                            </div>
                            <!--/ End Size -->
                            <!-- Product Buy -->
                            <div class="product-buy">
                                <div class="quantity">
                                    <h6>Quantity :</h6>
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <a href="{{route('add-to-cart',$products->id)}}" class="btn">Add to cart</a>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                <p class="cat">Category :<a href="#">Clothing</a></p>
                                <p class="availability">Availability : 180 Products In Stock</p>
                            </div>
                            <!--/ End Product Buy -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-info">
                            <div class="nav-main">
                                <!-- Tab Nav -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
                                </ul>
                                <!--/ End Tab Nav -->
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <!-- Description Tab -->
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-des">
                                                    <p>{!! ($products->summary) !!}</p>
                                                </div>
                                                <div class="single-des">
                                                    <p>{!! ($products->description) !!}</p>
                                                </div>
                                                <div class="single-des">
                                                    <h4>Product Features:</h4>
                                                    <ul>
                                                        <li>long established fact.</li>
                                                        <li>has a more-or-less normal distribution. </li>
                                                        <li>lmany variations of passages of. </li>
                                                        <li>generators on the Interne.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Description Tab -->
                                <!-- Reviews Tab -->
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="tab-single review-panel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="ratting-main">
                                                    <div class="avg-ratting">
                                                        <h4>4.5 <span>(Overall)</span></h4>
                                                        <span>Based on 1 Comments</span>
                                                    </div>
                                                    <!-- Single Rating -->
                                                    <div class="single-rating">
                                                        <div class="rating-author">
                                                            <img src="images/comments1.jpg" alt="#">
                                                        </div>
                                                        <div class="rating-des">
                                                            <h6>Naimur Rahman</h6>
                                                            <div class="ratings">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-half-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <div class="rate-count">(<span>3.5</span>)</div>
                                                            </div>
                                                            <p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
                                                        </div>
                                                    </div>
                                                    <!--/ End Single Rating -->
                                                    <!-- Single Rating -->
                                                    <div class="single-rating">
                                                        <div class="rating-author">
                                                            <img src="images/comments2.jpg" alt="#">
                                                        </div>
                                                        <div class="rating-des">
                                                            <h6>Advin Geri</h6>
                                                            <div class="ratings">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                                <div class="rate-count">(<span>5.0</span>)</div>
                                                            </div>
                                                            <p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
                                                        </div>
                                                    </div>
                                                    <!--/ End Single Rating -->
                                                </div>
                                                <!-- Review -->
                                                <div class="comment-review">
                                                    <div class="add-review">
                                                        <h5>Add A Review</h5>
                                                        <p>Your email address will not be published. Required fields are marked</p>
                                                    </div>
                                                    <h4>Your Rating</h4>
                                                    <div class="review-inner">
                                                        <div class="ratings">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/ End Review -->
                                                <!-- Form -->
                                                <form class="form" method="post" action="mail/mail.php">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Your Name<span>*</span></label>
                                                                <input type="text" name="name" required="required" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Your Email<span>*</span></label>
                                                                <input type="email" name="email" required="required" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group">
                                                                <label>Write a review<span>*</span></label>
                                                                <textarea name="message" rows="6" placeholder=""></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group button5">	
                                                                <button type="submit" class="btn">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!--/ End Form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Reviews Tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Start Most Popular -->
<div class="product-area most-popular related-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    @foreach ($products->rel_prods as $item)
                    @if($item->id !=$products->id)
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{route('product.details',$item->slug)}}">
                                <img class="default-img" src="{{$item->photo}}" alt="#">
                                <img class="hover-img" src="images/products/p16.jpg" alt="#">
                                <span class="out-of-stock">Hot</span>
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a title="Add to cart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{route('product.details',$item->slug)}}">{{$item->title}}</a></h3>
                            <div class="product-price">
                                <span class="old">${{number_format($products->price,3)}}</span>
                                <span>${{number_format($products->discount,3)}}</span>
                            </div>
                        </div>
                    </div>  
                    @endif
                    @endforeach
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

@endsection
@push('styles')
@endpush
@push('scripts')
@endpush