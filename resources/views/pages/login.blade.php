@extends('layouts.authentication')

@section('content')
   <div class="login-wrapper">
      <a href="/">
         <img class="logo" src="/assets/img/dashboard/logo-white.png" alt="logo" />
      </a>

      <div class="box">
         <div class="content-wrap">
         <h6>Log in</h6>
            {!! Form::open(['path' => '/login', 'method' => 'post']) !!}
               <input class="form-control" type="text" name="email" placeholder="E-mail address">
               <input class="form-control" type="password" name="password" placeholder="Your password">
               <a href="#" class="forgot">Forgot password?</a>
               <button class="btn-glow primary login">Login</button>
            {!! Form::close() !!}
         </div>
      </div>

      <div class="no-account">
         <p>Don't have an account?</p>
         <a href="/register">Register</a>
      </div>
   </div>
@stop
