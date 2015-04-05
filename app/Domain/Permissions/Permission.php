<?php

namespace ElasticHQ\Domain\Permissions;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
   protected $table = 'permissions';
   protected $fillable = ['name', 'description', 'status'];

   public function account() {
      return $this->hasMany('ElasticHQ\Domain\GroupPermissions\GroupPermission');
   }
}
