<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShorturlsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // php artisan generate:resource shorturls --fields="long_url:string[255]:unique, short_code:string[6]:index, clicks:integer"
        Schema::create('shorturls', function(Blueprint $table) {
            $table->increments('id');
            $table->string('long_url', 255)->unique();
			$table->string('short_code', 6)->index();
			$table->integer('clicks');
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
        Schema::drop('shorturls');
    }

}
