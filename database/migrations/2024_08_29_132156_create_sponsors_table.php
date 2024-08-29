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

        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->time('period');
            $table->decimal('price');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
         Schema::table('suite_sponsor', function (Blueprint $table) {
             $table->dropForeign('suite_sponsor_sponsor_id_foreign');
             $table->dropColumn('sponsor_id');
             // $table->dropIfExists('sponsors');
         });
       
    }
};
