<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('allowances', function (Blueprint $table) {
            $table->foreign('passport_id')
                ->references('id')
                ->on('passports')
                ->onUpdate('RESTRICT')
                ->onDelete('cascade');

            $table->foreign('unemployed_id')
                ->references('id')
                ->on('unemployeds')
                ->onUpdate('RESTRICT')
                ->onDelete('cascade');
        });

        Schema::table('curriculum_vitaes', function (Blueprint $table) {
            $table->foreign('unemployed_id')
                ->references('id')
                ->on('unemployeds')
                ->onDelete('cascade');
        });

        Schema::table('job_vacancies', function (Blueprint $table) {
            $table->foreign('employer_id')
                ->references('id')
                ->on('employers')
                ->onDelete('cascade');
        });

        Schema::table('job_offers', function (Blueprint $table) {
            $table->foreign('vacancy_id')
                ->references('id')
                ->on('job_vacancies')
                ->onDelete('cascade');
            $table->foreign('unemployed_id')
                ->references('id')
                ->on('unemployeds')
                ->onDelete('cascade');
        });

        Schema::table('unemployeds', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });

        Schema::table('employers', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');

            $table->foreign('allowance_id')
                ->references('id')
                ->on('allowances')
                ->onDelete('cascade');

        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('unemployed_id')
                ->references('id')
                ->on('unemployeds')
                ->onDelete('cascade');

        });

        $employer = \App\Models\Employer::factory()->create([ 'user_id' => function(){
            return User::factory()->create(['type' => 'employer'])->id;
        }]);

        \App\Models\JobVacancy::factory()->count(5)->create(['employer_id' => $employer->id, ]);

        \App\Models\Unemployed::factory()->count(2)->create();
        \App\Models\Employer::factory()->count(5)->create();
        \App\Models\CurriculumVitae::factory()->count(5)->create();
        \App\Models\JobVacancy::factory()->count(5)->create();
        \App\Models\Allowance::factory()->count(3)->create();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
