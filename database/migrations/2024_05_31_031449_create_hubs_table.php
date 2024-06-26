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
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->string('title')->unique();
            $table->longText('description')->nullable();
            $table->string('token')->unique();
            $table->string('url');
            $table->text('qr');
            $table->tinyInteger('status')->default(1);
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->date('expiration_at')->nullable()->useCurrentOnUpdate();
            $table->timestamp('published_at')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubs');
    }
};
