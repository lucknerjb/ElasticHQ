@extends('layouts.authentication')

@section('content')
   <!-- START panel-->
   <div data-toggle="play-animation" data-play="fadeIn" data-offset="0" class="panel panel-dark panel-flat">
      <div class="panel-heading text-center">
         <a href="/">
            <img src="/assets/img/dashboard/logo.png" alt="Image" class="block-center img-rounded">
         </a>
      </div>
      <div class="panel-body">
         {!! Form::open(['url' => '/login', 'method' => 'post', 'class' => 'mb-lg']) !!}
            <div class="text-right mb-sm">
               <a href="/register" class="text-muted">Need to Signup?</a>
            </div>

            <div class="form-group has-feedback">
               <input type="email" name="email" placeholder="E-mail address" class="form-control">
               <span class="fa fa-envelope form-control-feedback text-muted"></span>
            </div>

            <div class="form-group has-feedback">
               <input class="form-control" type="password" name="password" placeholder="Your password">
               <span class="fa fa-lock form-control-feedback text-muted"></span>
            </div>

            <div class="clearfix">
               <div class="pull-right">
                  <a href="#" class="text-muted">Forgot your password?</a>
               </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Login</button>
         {!! Form::close() !!}
      </div>
   </div>
   <!-- END panel-->
@stop
