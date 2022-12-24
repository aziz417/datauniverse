<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSmallTextToUserExpectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_expectations', function (Blueprint $table) {
            if (!Schema::hasColumn('user_expectations', 'small_text')){
                $table->string('small_text')->nullable()->after('quantity');
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
        Schema::table('user_expectations', function (Blueprint $table) {
            $table->dropColumn(['small_text']);
        });
    }
}
