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
        Schema::create('m_api_response', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method', 45)->nullable();
            $table->string('end_point', 45)->nullable();
            $table->integer('response_number');
            $table->string('title', 100)->nullable();
            $table->string('message', 500);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_api_response');
    }
};
