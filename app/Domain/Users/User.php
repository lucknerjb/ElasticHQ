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
   protected $appends = ['groups_list', 'group_ids', 'permissions'];

   protected function setPasswordAttribute($password) {
      $this->attributes['password'] = Hash::make($password);
   }

   public function account() {
      return $this->belongsTo('ElasticHQ\Domain\Accounts\Account');
   }

   public function groups() {
      return $this->belongsToMany('ElasticHQ\Domain\Groups\Group', 'user_groups');
   }

   public function getPermissionsAttribute() {
      $groups = $this->groups;
      $list = [];

      foreach($groups as $group) {
         foreach($group->group_permissions as $perm) {
            $list[] = $perm->permission;
         }
      }

      return array_unique($list);
   }

   public function getGroupsListAttribute() {
      $groups = $this->groups;
      $list = [];

      foreach($groups as $group) {
         $list[] = $group->name;
      }

      return $list;
   }

   public function getGroupsIdsAttribute() {
      $groups = $this->groups;
      $list = [];

      foreach($groups as $group) {
         $list[] = $group->id;
      }

      return $list;
   }

   public function can($perm) {
      foreach($this->groups as $group) {
         if ($group->name === 'admin') {
            return true;
         }
      }

      if (in_array($perm, $this->permissions)) {
         return true;
      }

      return false;
   }
}
