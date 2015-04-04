<?php

namespace ElasticHQ\Domain\Accounts;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {
   protected $table = 'accounts';
   protected $fillable = ['name', 'status'];

   public function users() {
      return $this->hasMany('ElasticHQ\Domain\Users\User');
   }

   public function addUser($user) {
      return $this->users()->save($user);
   }
}
