<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfectedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infected_person', function (Blueprint $table) {
            $table->integer('id_person')->unsigned() ;
            $table->foreign('id_person')->references('user_id')->on('users')->onDelete('cascade') ;
            $table->integer('sni_person')->unsigned();
            $table->foreign('sni_person')->references('snoi')->on('illness')->onDelete('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infected_person', function (Blueprint $table) {
            $table->dropForeign('id_person');
            $table->dropForeign('sni_person');
        });
        Schema::dropIfExists('infected_person');
    }
}
