<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_name')->nullable();
            $table->integer('user_id')->nullable()->index();
            $table->integer('country_id')->index()->nullable();
            $table->string('gender')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->integer('country_of_birth')->nullable()->index();
            $table->date('birthday')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->longText('notes')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('street2')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->integer('state_id')->nullable()->index();
            $table->string('work_phone')->nullable();
            $table->string('mobile_phonee')->nullable();
            $table->string('work_email')->nullable();
            $table->string('work_location')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
