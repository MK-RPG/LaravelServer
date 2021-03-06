@extends('layouts.main')
@section ('play-button')
<li class="li"><a href="/game"><img src="/img/play.png">Play</a></li>
@stop
@section('content')

	<div id="shopping-cart">
    <h1>Shopping Cart</h1>

    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <table border="1">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>

            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    {{ HTML::image($product->image, $product->name, array('width'=>'65', 'height'=>'37'))}} 
                    {{ $product->name }}
                </td>
                <td>${{ $product->price }}</td>
                <td>
                    {{ $product->quantity }}
                </td>
                <td>
                    ${{ $product->price }} 
                    <a href="/store/removeitem/{{ $product->identifier }}">
                        {{ HTML::image('img/remove.png', 'Remove product') }}
                    </a>
                </td>
            </tr>
            @endforeach
            
            <tr class="total">
                <td colspan="5">
                    Subtotal: ${{ Cart::total() }}<br />
                    <span>TOTAL: ${{ Cart::total() }}</span><br />

                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="office@shop.com"> 
                    <input type="hidden" name="item_name" value="eCommerce Store Purchase"> 
                    <input type="hidden" name="amount" value="{{ Cart::total() }}">
                    <input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
                    <input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                    {{ HTML::link('/store', 'Continue Shopping', array('class'=>'secondary-cart-btn')) }}
                    <input type="submit" value="Pay With PAYPAL" class="secondary-cart-btn">

                </td>
            </tr>
        </table>
    </form>
</div><!-- end shopping-cart -->

@stop