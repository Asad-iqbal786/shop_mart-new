@extends('frontend.layouts.master')
@section('title','E-SHOP || HOME PAGE')
@section('main-content')
<section class="product-area shop-sidebar shop section">


<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Categories</h3>
                                <ul class="categor-list">
                                    <li>
                                        @foreach($cat as $cat_info)
                                            <li><a href="{{route('product.cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
                                            </li>
                                        @endforeach
                                    </li>
                                </ul>
                        </div>
                        <!--/ End Single Widget -->

                        <!-- Single Widget Brand Name-->
                        <div class="single-widget category">
                            <h3 class="title">Brand Name</h3>
                            <ul class="categor-list">
                                @foreach ($brand as $item_brand)
                                <li><a href="{{route('product.brand',$item_brand->slug)}}">{{$item_brand->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->

                        
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Recent post</h3>
                            <!-- Single Post -->
                            @foreach ($recent_products as $recent_item)
                            <div class="single-post first">
                                <div class="image">
                                    <img src="{{$recent_item->photo}}" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="{{route('product.details',$recent_item->slug)}}">{{$recent_item->title}}</a></h5>
                                    <p class="price">${{number_format($recent_item->price,2)}}</p>
                                    <ul class="reviews">
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Post -->
                        </div>
                        <!--/ End Single Widget -->

                        <!-- Shop By Price -->
                        <div class="single-widget range">
                            <h3 class="title">Shop by Price</h3>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="width: 26%; left: 24%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 24%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 50%;"></span></div>
                                        <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="check-box-list">
                                <li>
                                    <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
                                </li>
                            </ul>
                        </div>
                        <!--/ End Shop By Price -->
                        
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <!-- Shop Top -->
                       <div class="shop-top">
                        <div class="shop-shorter">
                            <div class="single-shorter">
                                <label>Show :</label>
                                <select style="display: none;">
                                    <option selected="selected">09</option>
                                    <option>15</option>
                                    <option>25</option>
                                    <option>30</option>
                                </select><div class="nice-select" tabindex="0"><span class="current">09</span><ul class="list"><li data-value="09" class="option selected">09</li><li data-value="15" class="option">15</li><li data-value="25" class="option">25</li><li data-value="30" class="option">30</li></ul></div>
                            </div>
                            <div class="single-shorter">
                                <label>Sort By :</label>
                                <select style="display: none;">
                                    <option selected="selected">Name</option>
                                    <option>Price</option>
                                    <option>Size</option>
                                </select><div class="nice-select" tabindex="0"><span class="current">Name</span><ul class="list"><li data-value="Name" class="option selected">Name</li><li data-value="Price" class="option">Price</li><li data-value="Size" class="option">Size</li></ul></div>
                            </div>
                        </div>
                        <ul class="view-mode">
                            <li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
                            <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                       </div>
                        <!--/ End Shop Top -->
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="">
                                    <img class="default-img" src="{{$item->photo}}" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <span class="new">{{$item->condition}}</span>
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" data-quantity="1" data-product-id="{{$item->id}}" href="{{route('add-to-cart',$item->slug)}}" 
                                            id="add_to_cart{{$item->id}}">
                                            Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <p> {{\App\Models\brand::where('id',$item->brand_id)->value('title')}} </p>
                                <h3><a href="{{route('product.details',$item->slug)}}">{{ucfirst($item->title)}}</a></h3>
                                <div class="product-price">
                                    <span>${{number_format($item->price,2)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('styles')
@endpush
@push('scripts')

<script>

</script>



@endpush