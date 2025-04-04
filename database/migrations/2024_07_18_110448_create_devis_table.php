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
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->string('n_devis')->unique();
            //
            $table->date('date');
            $table->float('prix_hors_taxe');
            $table->string('taux_tva');
            $table->float('autre_taux_tva')->nullable();

            // Remise 1
            $table->float('remise_1');
            $table->date('date_remise_1');
            $table->string('detail_remise_1')->nullable();

            // Remise 2
            $table->float('remise_2')->nullable();
            $table->date('date_remise_2')->nullable();
            $table->string('detail_remise_2')->nullable();

            // Remise 3
            $table->float('remise_3')->nullable();
            $table->date('date_remise_3')->nullable();
            $table->string('detail_remise_3')->nullable();

            // Remise 4
            $table->float('remise_4')->nullable();
            $table->date('date_remise_4')->nullable();
            $table->string('detail_remise_4')->nullable();

            // Remise 5
            $table->float('remise_5')->nullable();
            $table->date('date_remise_5')->nullable();
            $table->string('detail_remise_5')->nullable();
            //
            $table->string('mode_envoi');
            $table->string('autre_mode_denvoi_devis')->nullable();
            //
            $table->enum('etat', ['signeé', 'non signeé', 'en attente de réflexion'])->default('signeé');
            //
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            //
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
