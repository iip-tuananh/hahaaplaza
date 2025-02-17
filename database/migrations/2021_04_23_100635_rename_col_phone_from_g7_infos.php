<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColPhoneFromG7Infos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('g7_infos', function (Blueprint $table) {
            $table->renameColumn('phone', 'mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('g7_infos', function (Blueprint $table) {
            $table->renameColumn('mobile', 'phone');
        });
    }
}
