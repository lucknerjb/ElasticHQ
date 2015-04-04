<?php

namespace ElasticHQ\Http\Controllers;

use Input;
use Auth;
use Redirect;
use Session;
use Flash;

class SessionsController extends BaseController {
   public function store()
   {
      $email = Input::get('email');
      $password = Input::get('password');

      if (Auth::attempt(array('email' => $email, 'password' => $password))) {
         $user = Auth::user();

         // Redirect to correct dashboard based on role
         // if ($user->hasRole('admin')) {
         //    return Redirect::intended('/admin');
         // }
         // else if ($user->hasRole('student')) {
         //    return Redirect::intended('/dashboard');
         // } else {
         //    // Not a valid role, log them out
         //    return $this->logout();
         // }

         return Redirect::intended('/dashboard');
      } else{
         Flash::error('Login failed. Invalid email or password');
         return Redirect::back()->withInput();
      }
   }

   public function destroy() {
      Auth::logout();
      return Redirect::to('/');
   }
}
