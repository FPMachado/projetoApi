<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_list', function (Blueprint $table) {
            $table->id('movie_id');
            $table->integer('user_id');
            $table->decimal('note', 2, 1);
            $table->string('name');
            $table->date('release_date');
            $table->string('synopsis')->nullable();
            $table->string('assisted_in')->nullable();
            $table->string('img_src')->nullable();
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
        Schema::dropIfExists('personal_list');
    }
}
