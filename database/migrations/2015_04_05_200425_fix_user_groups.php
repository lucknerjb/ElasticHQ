<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixUserGroups extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('user_groups', function(Blueprint $table)
      {
         $table->renameColumn('permission_id', 'group_id');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('user_groups', function(Blueprint $table)
      {
         $table->renameColumn('group_id', 'permission_id');
      });
   }

}
