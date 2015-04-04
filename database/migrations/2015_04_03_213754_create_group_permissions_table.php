<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPermissionsTable extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('group_permissions', function(Blueprint $table)
      {
         $table->increments('id');
         $table->integer('group_id')->unsigned()->index();
         $table->integer('permission_id')->unsigned()->index();
         $table->timestamps();

         $table->unique(['group_id', 'permission_id']);
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::drop('group_permissions');
   }

}
