<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('name', 25); // --> VARCHAR(size)  name(string)
            $table->integer('user_id')->unsigned()->unique()->primary();
            $table->string('Temperament',10) ; //---> mazaj(string)
            $table->smallInteger('year of birth'); //--> year(int)
            $table->tinyInteger('mounth of birth'); //--> mounth(int)
            $table->string('country', 15);
            $table->string('city',15) ;
            $table->char('sex', 1); //--> sex(char) ex: sex(f) or sex(m)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
