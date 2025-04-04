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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date('date_demande');
            $table->date('date_visite')->nullable();
            //
            $table->string('origine');
            $table->string('autre_origine')->nullable();
            //
            //
            $table->string("type_besoin");
            $table->string("autre_type_besoin")->nullable();
            $table->string("categorie_besoin")->nullable();
            $table->string("autre_categorie_besoin")->nullable();
            $table->string("nature_service")->nullable();
            $table->string("marchandise")->nullable();
            //
            $table->string("commercial_name")->nullable();
            //
            $table->string("type_cadence");
            $table->string("autre_type_cadence")->nullable();
            //
            $table->text("detail")->nullable();
            //
            $table->unsignedBigInteger("client_id")->nullable();
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade");
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
