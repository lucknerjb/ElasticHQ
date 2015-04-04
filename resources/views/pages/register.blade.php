@extends('layouts.authentication')

@section('content')
   <div class="login-wrapper">
      <a href="/">
         <img class="logo" src="/assets/img/dashboard/logo-white.png" alt="logo" />
      </a>

      <div class="box">
         <div class="content-wrap">
         <h6>Register</h6>
            {!! Form::open(['path' => '/register', 'method' => 'post']) !!}
               <input class="form-control" type="text" name="account" placeholder="Account Name">

               <input class="form-control" type="text" name="name" placeholder="Your Name">

               <input class="form-control" type="text" name="email" placeholder="E-mail address">

               <input class="form-control" type="password" name="password" placeholder="Your password">

               <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm your password">

               <button class="btn-glow primary login">Create My Account</button>
            {!! Form::close() !!}
         </div>
      </div>

      <div class="no-account">
         <p>Already have an account?</p>
         <a href="/login">Login</a>
      </div>
   </div>
@stop
