<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('short_title');
            $table->string('full_title');
            $table->string('short_desc');
            $table->string('full_desc');
            $table->string('slug');
            $table->foreignId('category_id')->constrained('categories');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('link');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
