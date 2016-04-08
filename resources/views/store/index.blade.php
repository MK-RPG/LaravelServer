@extends('layouts.main')

@section('top-navigation')
    <nav class="dropdown">
        <ul>
            <li>
                <a href="#">Shop by Category {{ HTML::image('img/down-arrow.gif', 'Shop by Category') }}</a>
                <ul>
                    {{--@foreach($catnav as $cat)--}}
                    {{--<li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>--}}
                    {{--@endforeach--}}
                </ul>
            </li>
        </ul>
    </nav>

    <div id="search-form">
        {{ Form::open(array('url'=>'store/search', 'method'=>'get')) }}
        {{ Form::text('keyword', null, array('placeholder'=>'Search by keyword', 'class'=>'search')) }}
        {{ Form::submit('Search', array('class'=>'search submit')) }}
        {{ Form::close() }}
    </div><!-- end search-form -->

    <div id="view-cart">
        <a href="store/cart">{{ HTML::image('img/blue-cart.gif', 'View Cart') }} View Cart</a>
    </div><!-- end view-cart -->
@stop

@section('promo')
	<section id="promo">
        <div id="promo-details">
            <h1>Today's Deals</h1>
            <p>Checkout this section of<br />
             products at a discounted price.</p>
            <a href="#" class="default-btn">Shop Now</a>
        </div><!-- end promo-details -->
{{--        {{ HTML::image('img/rsz.jpg', 'Promotional Ad')}}--}}
    </section><!-- promo -->
@stop

@section('content')

	<h2>New Products</h2>
    <hr>
    <div id="products">
    	@foreach($products as $product)
        <div class="product">
            <a href="/store/view/{{ $product->id }}">
            	{{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
            </a>

            <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

            <p>{{ $product->description }}</p>

            <h5>
            	Availability: 
            	{{--<span class="{{ Availability::displayClass($product->availability) }}">
            		{{ Availability::display($product->availability) }}
            	</span>--}}
            </h5>

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