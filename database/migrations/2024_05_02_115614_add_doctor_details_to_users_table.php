<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('specialization')->nullable()->after('image');
            $table->integer('experience_years')->nullable()->after('specialization');
            $table->text('qualifications')->nullable()->after('experience_years');
            $table->float('amount')->nullable()->after('qualifications');
            $table->string('currency')->nullable()->default('USD')->after('amount');
            $table->json('availabilities')->nullable()->after('currency');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('specialization');
            $table->dropColumn('experience_years');
            $table->dropColumn('qualifications');
            $table->dropColumn('amount');
            $table->dropColumn('currency');
            $table->dropColumn('availabilities');
        });
    }
};
