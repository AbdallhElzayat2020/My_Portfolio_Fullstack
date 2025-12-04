<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->longText('short_title');
            $table->longText('full_title');
            $table->longText('short_desc');
            $table->longText('full_desc');
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
