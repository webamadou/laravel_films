<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable()->default(null);
            $table->text('description');
            $table->date('release_date');
            $table->integer('rating',false,true);
            $table->integer('ticket_price',false,true);
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('genre_id');
            $table->mediumText('photo');

            $table->foreign('country_id', 'country_id_unique')
                ->references('id')->on('countries')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('genre_id', 'genre_id_unique')
                ->references('id')->on('genres')
                ->onDelete('no action')
                ->onUpdate('no action');

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
        Schema::dropIfExists('films');
    }
}
