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
        Schema::table('modeles', function (Blueprint $table) {
            $table->string('reference')->nullable();
            $table->bigInteger('n_client')->nullable();
            $table->string('conditions')->nullable();
            $table->string('RC')->nullable();
            $table->bigInteger('IF')->nullable();
            $table->string('ICE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->dropColumn(['reference','n_client','conditions','RC','IF','ICE']);
        });
    }
};
