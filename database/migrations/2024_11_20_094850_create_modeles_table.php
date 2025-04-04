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
        Schema::create('modeles', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('societe');
            $table->boolean('afficher_partenaires')->nullable();
            $table->integer('n_devis')->nullable();
            $table->string('titre')->nullable();
            $table->string('prestation')->nullable();
            $table->text('details')->nullable();
            $table->text('politique')->nullable();
            $table->string('mode_paiement')->nullable();
            $table->string('nom_client')->nullable();
            $table->integer('quantité')->nullable();
            $table->float('prix_unitaire')->nullable();
            $table->float('remise_1')->nullable();
            $table->float('remise_2')->nullable();
            $table->float('remise_3')->nullable();
            $table->float( 'remise_4')->nullable();
            $table->integer('tva')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modeles');
    }
};
