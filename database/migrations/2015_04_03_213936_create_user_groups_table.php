<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupsTable extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('user_groups', function(Blueprint $table)
      {
         $table->increments('id');
         $table->integer('user_id')->unsigned()->index();
         $table->integer('permission_id')->unsigned()->index();
         $table->timestamps();

         $table->unique(['user_id', 'permission_id']);
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::drop('user_groups');
   }

}
