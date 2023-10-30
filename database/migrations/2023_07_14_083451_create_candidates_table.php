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
        Schema::create('candidates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('vote_id');
            $table->string('name', 150);
            $table->text('address')->nullable()->default(null);
            $table->text('vision')->nullable()->default(null);
            $table->text('mission')->nullable()->default(null);
            $table->string('photo', 255)->nullable()->default(null);
            $table->smallInteger('sequence')->default(0);
            $table->bigInteger('number_of_votes')->default(0);
            $table->timestamps();
            $table->foreign('vote_id')->references('id')->on('votes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
