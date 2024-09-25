<?php

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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('bookNo');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->string('title');
            $table->string('author');
            $table->string('category');
            $table->integer('quantity');
            $table->decimal('price', 8, 2); // Adjust precision as needed
            $table->string('file')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_available')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
