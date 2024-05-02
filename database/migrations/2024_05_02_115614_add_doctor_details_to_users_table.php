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
        });
    }
};
