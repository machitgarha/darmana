<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteProvidingTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providing_traetment', function (Blueprint $table) {
            $table->integer('snt')->unsigned()->primary();//--> snt=seriyal number treatment
            $table->foreign('snt')->references('snot')->on('treatments')->onDelete('cascade') ;
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('user_id')->on('users') ;
            $table->tinyInteger('point')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_illness', function (Blueprint $table) {
            $table->dropForeign('snt');
            $table->dropForeign('id') ;
        });
        Schema::dropIfExists('providing_traetment');
    }
}
