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

        Schema::create('suite_sponsor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suite_id')->constrained()->nullable();
            $table->foreign('suite_id')->references('id')->on('suites')->cascadeOnDelete();
            $table->unsignedBigInteger('sponsor_id')->cascadeOnDelete();
            $table->foreign('sponsor_id')->references('id')->on('sponsors');
            $table->string('sponsor_name');
            $table->decimal('sponsor_price');
            $table->dateTime('sponsor_start');
            $table->dateTime('sponsor_end');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suite_sponsor');
    }
};
