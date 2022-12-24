<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSerialToSkillOrTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skill_or_technologies', function (Blueprint $table) {
            if (!Schema::hasColumn('skill_or_technologies', 'serial')){
                $table->string('serial')->nullable()->after('slug');
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
        Schema::table('skill_or_technologies', function (Blueprint $table) {
            $table->dropColumn(['serial']);
        });
    }
}
