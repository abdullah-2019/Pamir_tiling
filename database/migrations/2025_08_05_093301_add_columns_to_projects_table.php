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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('client')->nullable();
            $table->string('location')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('featured_image')->nullable();
            $table->enum('status', ['completed', 'in_progress', 'planned'])->default('completed');
            $table->boolean('is_featured')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'description',
                'client',
                'location',
                'completion_date',
                'featured_image',
                'status',
                'is_featured'
            ]);
        });
    }
};
