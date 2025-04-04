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
            //
            $table->text('mode_paiement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('docdevis', function (Blueprint $table) {
            //
            $table->dropColumn('mode_paiement');
        });
    }
};
