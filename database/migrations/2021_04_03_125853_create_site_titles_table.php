<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_titles', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
//            home page
            $table->string('h_title_1')->nullable();
            $table->string('h_title_2')->nullable();
            $table->string('h_title_3')->nullable();
            $table->string('h_title_4')->nullable();
            $table->string('h_title_5')->nullable();
            $table->string('h_title_6')->nullable();
            $table->string('h_title_7')->nullable();
            $table->string('h_title_8')->nullable();
            $table->string('location')->nullable();
            $table->string('subscribe')->nullable();
//            footer section
            $table->string('f_home')->nullable();
            $table->string('f_our_services')->nullable();
            $table->string('f_on_emergency')->nullable();
            $table->string('f_address')->nullable();
//            service page
            $table->string('s_title_1')->nullable();
            $table->string('s_title_2')->nullable();
            $table->string('s_title_3')->nullable();
//            about us page
            $table->string('a_title_1')->nullable();
//            career page
            $table->string('c_title_1')->nullable();
            $table->string('c_title_2')->nullable();
            $table->string('c_title_3')->nullable();
//            career description page
            $table->string('c_d_title_1')->nullable();
//            blog page
            $table->string('b_title_1')->nullable();
            $table->string('b_title_2')->nullable();
            $table->string('b_title_3')->nullable();
            $table->string('b_title_4')->nullable();
            $table->string('b_title_5')->nullable();
            $table->string('b_title_6')->nullable();
//            blog description page
            $table->string('b_d_title_1')->nullable();
            $table->string('b_d_title_2')->nullable();
            $table->string('b_d_title_3')->nullable();
//            faq page
            $table->string('faq_title_1')->nullable();
            $table->string('faq_title_2')->nullable();
            $table->string('faq_title_3')->nullable();
//            under construction page
            $table->string('uc_title_1')->nullable();
//            how we work page
            $table->string('hww_title_1')->nullable();
//            contact us page
            $table->string('contact_title_1')->nullable();

            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('site_titles');
    }
}
