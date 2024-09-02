<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('suites', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('room');
            $table->integer('bed');
            $table->smallInteger('bathroom');
            $table->bigInteger('squareM');
            $table->string('address');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('img');
            $table->boolean('visible')->nullable();
            $table->boolean('sponsor')->nullable();
            $table->bigInteger('tot_visuals');
            $table->unsignedBigInteger('user_id')->constrained()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suites');
    }
};
