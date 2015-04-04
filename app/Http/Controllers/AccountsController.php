<?php

namespace ElasticHQ\Http\Controllers;

use Input;
use View;
use Redirect;
use Response;
use ElasticHQ\Commands\RegisterUserCommand;

class AccountsController extends BaseController {
   public function store() {
      $commandOptions = [
         'name' => Input::get('name'),
         'account' => Input::get('account'),
         'email' => Input::get('email'),
         'password' => Input::get('password')
      ];

      $user = $this->dispatch(
         new RegisterUserCommand($commandOptions)
      );

      $this->setLoggedInUser($user);

      return Redirect::intended('/dashboard');

      echo '<pre>';
      print_r($account);
      die;
   }
}
