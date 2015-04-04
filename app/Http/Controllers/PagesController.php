<?php

namespace ElasticHQ\Http\Controllers;

class PagesController extends BaseController {
   public function login() {
      $page = 'login';
      return view('pages.login', compact('page'));
   }

   public function register() {
      $page = 'register';
      return view('pages.register', compact('page'));
   }
}
