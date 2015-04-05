<?php

namespace ElasticHQ\Domain\Groups;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {
   protected $table = 'groups';
   protected $fillable = ['name'];

   public function account() {
      return $this->belongsTo('ElasticHQ\Domain\Accounts\Account');
   }

   public function group_permissions() {
      return $this->hasMany('ElasticHQ\Domain\GroupPermissions\GroupPermission');
   }
}
