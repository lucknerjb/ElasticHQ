<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClusterDetailsTable extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('cluster_details', function(Blueprint $table)
      {
         $table->increments('id');
         $table->integer('cluster_id')->unsigned()->index();
         $table->text('raw_data');
         $table->text('details');
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
      Schema::drop('cluster_details');
   }

}
