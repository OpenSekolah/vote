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
        Schema::create('candidate_votes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('vote_id');
            $table->uuid('voter_id');
            $table->uuid('candidate_id');
            $table->smallInteger('point')->default(1);
            $table->timestamps();
            $table->foreign('vote_id')->references('id')->on('votes')->onDelete('cascade');
            $table->foreign('voter_id')->references('id')->on('voters')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_votes');
    }
};
