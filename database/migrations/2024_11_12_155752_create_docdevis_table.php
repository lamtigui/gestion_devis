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
        Schema::create('docdevis', function (Blueprint $table) {
            $table->id();
            $table->string('societe')->nullable();
            $table->boolean('partenaires_img')->nullable()->default(false);
            $table->string('nom_client')->nullable();
            $table->string('titre')->nullable();
            $table->string('prestation')->nullable();
            $table->text('details')->nullable();
            $table->text('politique')->nullable();
            $table->foreignId('devis_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docdevis');
    }
};
