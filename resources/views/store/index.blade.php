@extends('layouts.main')

@section('top-navigation')
 
@stop

@section('promo')
	<section id="promo">

{{--        {{ HTML::image('img/rsz.jpg', 'Promotional Ad')}}--}}
    </section><!-- promo -->
@stop

@section('content')

    <div id="view-cart" style="margin-left: 620px;">
        <a href="store/cart" class="cart-view"><img src="img/blue-cart.png">View Cart</a>
    </div><!-- end view-cart -->

	<h2>All Products</h2>
    <div id="products">
    	@foreach($products as $product)
        <div class="product">
            <a href="/store/view/{{ $product->id }}">
            	{{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
            </a>

            <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

            <p>{{ $product->description }}</p>
            <p>
                {{ Form::open(array('url'=>'store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}
                <button type="submit" class="cart-btn">
                    <span class="price">{{ $product->price }}</span> 
                    {{ HTML::image('img/white-cart.gif', 'Add to Cart') }} 
                    ADD TO CART
                </button>
                {{ Form::close() }}
            </p>
        </div>
        @endforeach
    </div><!-- end products -->

@stop