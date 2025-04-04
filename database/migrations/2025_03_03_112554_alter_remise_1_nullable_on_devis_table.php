<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRemise1NullableOnDevisTable extends Migration
{
    public function up()
    {
        Schema::table('devis', function (Blueprint $table) {
            $table->float('remise_1')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('devis', function (Blueprint $table) {
            $table->float('remise_1')->nullable(false)->change();
        });
    }
}
