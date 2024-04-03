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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('device_name',50)->nullable();
            $table->string('password');
            $table->enum('role',['admin','employee','doctor','user'])->default('user');
            $table->integer('code')->nullable();
            $table->timestamp('code_expired_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('gender',['female','male'])->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('image')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('experience_years')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('specialization')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
