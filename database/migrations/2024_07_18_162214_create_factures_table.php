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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('n_facture')->unique();
            $table->string("alternative")->nullable();
            $table->date("date_facture");
            $table->string('client_name')->nullable();
            $table->string('etableur_name');
            $table->string('emmeteur_name');
            $table->date('date_validation')->nullable();
            $table->string('type_validation')->nullable();
            $table->string('autre_type_validation')->nullable();
            $table->string('type_service_validation')->nullable();
            $table->string('autre_type_service')->nullable();
            $table->float("remise")->default(0);
            $table->integer('status')->default(3);
            $table->float('taux_tva')->nullable();
            $table->float('autre_taux_tva')->nullable();
            $table->float('mantant_ht')->nullable();
            //
            $table->string('numero_livraison')->nullable();
            $table->date('date_livraison')->nullable();
            //
            $table->unsignedBigInteger('devis_id')->nullable();
            //
            //
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            //

            $table->foreign('devis_id')->references('id')->on('devis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
