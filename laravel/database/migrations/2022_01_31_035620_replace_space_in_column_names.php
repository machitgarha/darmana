<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReplaceSpaceInColumnNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('`year of birth`', 'birth_year');
            $table->renameColumn('`mounth of birth`', 'birth_month');
        });

        Schema::table('illness', function (Blueprint $table) {
            $table->renameColumn('`name of illness`', 'name');
        });

        Schema::table('treatments', function (Blueprint $table) {
            $table->renameColumn('`name of treatment`', 'name');
            $table->renameColumn('`date of treatment`', 'date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('birth_year', '`year of birth`');
            $table->renameColumn('birth_month', '`mounth of birth`');
        });

        Schema::table('illness', function (Blueprint $table) {
            $table->renameColumn('name', '`name of illness`');
        });

        Schema::table('treatments', function (Blueprint $table) {
            $table->renameColumn('name', '`name of treatment`');
            $table->renameColumn('date', '`date of treatment`');
        });
    }
}
