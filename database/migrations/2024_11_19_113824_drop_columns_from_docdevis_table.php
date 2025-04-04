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
        Schema::table('docdevis', function (Blueprint $table) {
            $table->dropColumn(['quantite', 'prix_unitaire']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('docdevis', function (Blueprint $table) {
            $table->integer('quantite')->nullable();
            $table->integer('prix_unitaire')->nullable();
        });
    }
};
