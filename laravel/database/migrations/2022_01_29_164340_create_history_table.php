<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_illness', function (Blueprint $table) {
                $table->integer('sn_owner')->unsigned()->unique() ;
                $table->foreign('sn_owner')->references('snoi')->on('illness')->onDelete('cascade') ;
                $table->integer('id_owner')->unsigned()->unique()->primary() ;
                $table->date('diagnosis');
                $table->date('start_treatment') ;
                $table->string('name_expert',25) ;
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
            $table->dropForeign('sn_owner');
        });
        Schema::dropIfExists('history_illness');
    }
}
