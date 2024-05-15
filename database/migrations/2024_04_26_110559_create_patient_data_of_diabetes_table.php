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
        Schema::create('patient_data_of_diabetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('gender', ['female', 'male']);
            $table->integer('age');
            $table->enum('hypertension', ['have', 'Do not have']);
            $table->enum('heart_disease', ['have', 'Do not have']);
            $table->enum('smoking_history', ['former', 'No info', 'never']);
            $table->float('bmi');
            $table->float('height');
            $table->float('weight');
            $table->float('HbA1c_level');
            $table->integer('blood_glucose_level');
            $table->enum('diabetes_type', ['normal','type1', 'type2']);
            $table->softDeletes();
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
        Schema::dropIfExists('patient_data_of_diabetes');
    }
};

