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
        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facture_id')->nullable();
            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');
            //
            $table->string("mode");
            //
            $table->float("montant");
            //
            $table->date("date_paiement");
            //
            $table->string("numero_cheque")->nullable();
            //
            $table->string("numero_remise")->nullable();
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payements');
    }
};
