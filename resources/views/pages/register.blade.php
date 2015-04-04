@extends('layouts.authentication')

@section('content')
   <!-- START panel-->
   <div data-toggle="play-animation" data-play="fadeIn" data-offset="0" class="panel panel-dark panel-flat">
      <div class="panel-heading text-center mb-lg">
         <a href="/">
            <img src="/assets/img/dashboard/logo.png" alt="Image" class="block-center img-rounded">
         </a>
      </div>
      <div class="panel-body">
         {!! Form::open(['url' => '/register', 'method' => 'post']) !!}
            <div class="form-group has-feedback">
               <input class="form-control" type="text" name="account" placeholder="Account Name">
               <span class="fa fa-group form-control-feedback text-muted"></span>
            </div>
            <div class="form-group has-feedback">
               <input class="form-control" type="text" name="name" placeholder="Your Name">
               <span class="fa fa-user form-control-feedback text-muted"></span>
            </div>
            <div class="form-group has-feedback">
               <input class="form-control" type="text" name="email" placeholder="E-mail address">
               <span class="fa fa-envelope form-control-feedback text-muted"></span>
            </div>
            <div class="form-group has-feedback">
               <input class="form-control" type="password" name="password" placeholder="Your password">
               <span class="fa fa-lock form-control-feedback text-muted"></span>
            </div>
            <div class="form-group has-feedback">
               <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm your password">
               <span class="fa fa-lock form-control-feedback text-muted"></span>
            </div>
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-block btn-primary">Register</button>
         {!! Form::close() !!}
      </div>
   </div>
   <!-- END panel-->
@stop
