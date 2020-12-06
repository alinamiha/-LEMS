<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unemployed_id');
            $table->date('birthday');
            $table->string('citizenship');
            $table->unsignedBigInteger('passport_id');
            $table->string('registration_address')->nullable();
            $table->string('factual_address')->nullable();
            $table->string('education_degree');
            $table->string('name_education')->nullable();
            $table->string('last_work_place')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('allowances');
    }
}
