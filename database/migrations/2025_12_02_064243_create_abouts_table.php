<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
$table->string('name');
$table->json('description');
$table->string('email');
$table->string('phone');
$table->string('facebook_link');
$table->string('upwork_link');
$table->string('linkedin_link');
$table->string('whatsapp_link');
$table->string('github_link');
$table->timestamps();//
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
