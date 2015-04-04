<?php

namespace ElasticHQ\Domain\Users;

use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
   use Authenticatable, CanResetPassword;

   protected $table = 'users';
   protected $fillable = ['name', 'email', 'password', 'status'];

   protected function setPasswordAttribute($password) {
      $this->attributes['password'] = Hash::make($password);
   }

   public function account() {
      return $this->belongsTo('ElasticHQ\Domain\Accounts\Account');
   }
}
