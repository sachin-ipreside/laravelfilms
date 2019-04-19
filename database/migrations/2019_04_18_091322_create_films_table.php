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
    protected $flm_films = 'films';
    public function up()
    {
        Schema::create($this->flm_films, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('slug',100);
            $table->longText('description');
            $table->string('realease_date');
            $table->string('rating');
            $table->string('ticket_price');
            $table->string('country');
            $table->string('genre');
            $table->string('photo');
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
        Schema::dropIfExists($this->flm_films);
    }
}
