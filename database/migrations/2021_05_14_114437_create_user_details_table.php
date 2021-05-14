<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->string("user_address");
            $table->string("user_contact_number");
            $table->string("user_elementary")->default("none");
            $table->string("user_highschool")->default("none");
            $table->string("user_college")->default("none");
            $table->string("user_resume")->default("none");
            $table->string("user_cv")->default("none");
            $table->string("user_current_job")->default("none");
            $table->string("user_previous_job")->default("none");
            $table->string("user_language")->default("English, Filipino");
            $table->string("user_hobbies")->default("none");
            $table->string("user_motto")->default("none");
            $table->string("user_bio")->default("none");
            $table->string("user_talents")->default("none");
            $table->string("user_website")->default("none");
            $table->string("user_religion")->default("none");
            $table->string("user_birthday")->default("none");
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
        Schema::dropIfExists('user_details');
    }
}
