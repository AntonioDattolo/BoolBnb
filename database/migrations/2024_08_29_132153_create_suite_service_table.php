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

        Schema::create('suite_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suite_id');
            $table->foreign('suite_id')->references('id')->on('suites')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('suite_service');
        Schema::table('suite_service', function (Blueprint $table) {
            $table->dropForeign('suite_service_suite_id_foreign');
            $table->dropColumn('suite_id');
                  
        });
    }
};
