<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToClusters extends Migration {

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('clusters', function(Blueprint $table)
      {
         $table->string('slug', 32)->after('name')->nullable();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('clusters', function(Blueprint $table)
      {
         $table->dropColumn('slug');
      });
   }

}
