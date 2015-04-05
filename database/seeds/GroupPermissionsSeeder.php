<?php

use ElasticHQ\Domain\Permissions\Permission;
use ElasticHQ\Domain\Groups\Group;
use ElasticHQ\Domain\GroupPermissions\GroupPermission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GroupPermissionsSeeder extends Seeder {

   public function run()
   {
      DB::statement('truncate table group_permissions');

      $perms = Config::get('ehq.group_perms');

      // Admin group
      $groups = Group::where(['account_id' => 0])->get();

      foreach($groups as $group) {
         $groupPerms = $perms[$group->name];
         foreach($groupPerms as $groupPerm) {
            GroupPermission::create([
               'group_id' => $group->id,
               'permission' => $groupPerm
            ]);
         }
      }
   }

}
