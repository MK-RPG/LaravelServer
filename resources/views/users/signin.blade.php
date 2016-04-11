@extends('layouts.main')

@section('content')

	<section id="signin-form">
        <h1>My account</h1>
        {{ Form::open(array('url'=>'users/signin')) }}
            <p>
                {{ HTML::image('img/email.gif', 'Email Address') }}
                {{ Form::text('email') }}
            </p>
            <p>
                {{ HTML::image('img/password.gif', 'Password') }}
                {{ Form::password('password') }}
            </p>

            {{ Form::button('Sign In', array('type'=>'submit', 'class'=>'secondary-cart-btn')) }}
        {{ Form::close() }}
    </section><!-- end signin-form -->
    <section id="signup">
        <h3>Don't have an account?</h3>

        {{ HTML::link('users/newaccount', 'CREATE NEW ACCOUNT', array('class'=>'default-btn')) }}
    </section><!--- end signup -->

@stop