<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePermissionFieldGroupPermissions extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('group_permissions', function(Blueprint $table)
      {
         $table->dropColumn('permission_id');
         $table->string('permission', 128)->after('group_id');
         $table->dropUnique('group_permissions_group_id_permission_id_unique');
         $table->unique(['group_id', 'permission']);
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('group_permissions', function(Blueprint $table)
      {
         $table->dropColumn('permission');
         $table->integer('permission_id')->unsigned()->after('group_id');
         $table->unique(['group_id', 'permission_id']);
         $table->dropUnique('group_permissions_group_id_permission_unique');
      });
   }

}
