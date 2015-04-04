<?php

namespace ElasticHQ\Commands;

use DB;
use ElasticHQ\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use ElasticHQ\Domain\Accounts\Account;
use ElasticHQ\Domain\Users\User;

class RegisterUserCommand extends Command implements SelfHandling {
   public $options;
   // protected $userRepository;
   // protected $userMailer;

   /**
    * Create a new command instance.
    *
    * @return void
    */
   public function __construct($options)
   {
      $this->name = $options['name'];
      $this->email = $options['email'];
      $this->password = $options['password'];
      $this->account = $options['account'];
   }

   /**
    * Execute the command.
    *
    * @return void
    */
   public function handle() {
      // Begin a transaction
      DB::beginTransaction();

      $account = Account::create([
         'name' => $this->account,
         'status' => 'active'
      ]);

      // Add the user
      $user = new User([
         'name' => $this->name,
         'email' => $this->email,
         'password' => $this->password,
         'status' => 'active'
      ]);
      $user = $account->addUser($user);

      DB::commit();

      return $user;
   }
}
