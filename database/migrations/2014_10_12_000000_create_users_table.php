<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('member');
            //1.c
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });

        User::create(['id' => 1, 'name' => 'Kiss Pista', 'email' => 'kispista@gmail.com', 'password' => 'abc123', 'member' => 1]);
        User::create(['id' => 2, 'name' => 'Nagy Ferenc', 'email' => 'nagyfeco@gmail.com', 'password' => '123abc', 'member' => 0]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
