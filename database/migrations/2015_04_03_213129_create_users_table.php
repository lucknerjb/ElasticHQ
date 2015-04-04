<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('users', function(Blueprint $table)
      {
         $table->increments('id');
         $table->integer('account_id')->unsigned()->index();
         $table->string('name', 32);
         $table->string('email', 255)->unique();
         $table->string('password', 64);
         $table->string('status', 16)->default('active')->index();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::drop('users');
   }

}
