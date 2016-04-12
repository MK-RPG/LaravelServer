@extends('layouts.main')

@section('content')

	<div id="search-results">

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

	</div><!-- end search-results -->

@stop