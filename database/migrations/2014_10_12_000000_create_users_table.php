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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('device_name',50)->nullable();
            $table->enum('role',['admin','employee','doctor','user'])->default('user');
            $table->integer('code')->nullable();
            $table->timestamp('code_expired_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_online')->default(false);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->enum('gender',['female','male'])->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('image')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('experience_years')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('specialization')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();




        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
