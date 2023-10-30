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
        Schema::create('voter_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('voter_id');
            $table->string('user_agent', 255)->nullable()->default(null);
            $table->ipAddress('ip_address')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('voter_id')->references('id')->on('voters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voter_logs');
    }
};
