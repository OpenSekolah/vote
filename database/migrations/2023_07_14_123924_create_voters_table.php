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
        Schema::create('voters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('vote_id');
            $table->string('token', 100);
            $table->smallInteger('sequence')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('vote_id')->references('id')->on('votes')->onDelete('cascade');
            $table->unique(['token', 'vote_id'], 'tokvotid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voters');
    }
};
