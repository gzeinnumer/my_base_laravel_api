<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('more', function (Blueprint $table) {
            $table->foreign(['id_paging'], 'more_ibfk_1')->references(['id'])->on('paging');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('more', function (Blueprint $table) {
            $table->dropForeign('more_ibfk_1');
        });
    }
};
