<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSerialToClientAndProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_and_products', function (Blueprint $table) {
            if (!Schema::hasColumn('client_and_products', 'serial')){
                $table->integer('serial')->nullable()->after('type');
            };
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_and_products', function (Blueprint $table) {
            $table->dropColumn(['serial']);
        });
    }
}
