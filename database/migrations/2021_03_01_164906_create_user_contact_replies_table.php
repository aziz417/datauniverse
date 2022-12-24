<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserContactRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_contact_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_contact_id')->constrained('user_contacts')->cascadeOnDelete();
            $table->string('reply_subject');
            $table->string('reply_email');
            $table->longText('reply_message');
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_contact_replies');
    }
}
