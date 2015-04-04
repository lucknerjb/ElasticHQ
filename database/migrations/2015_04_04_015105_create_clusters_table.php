<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClustersTable extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('clusters', function(Blueprint $table)
      {
         $table->increments('id');
         $table->integer('account_id')->unsigned()->index();
         $table->string('name', 254)->nullable();
         $table->string('endpoint', 254);
         $table->string('port', 10);
         $table->string('username', 254)->nullable();
         $table->string('password', 254)->nullable();
         $table->boolean('use_ssl')->default(false);
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
      Schema::drop('clusters');
   }

}
