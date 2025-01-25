<?php

use App\Models\courseManagment;
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
        Schema::create('lesson_managments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video')->nullable();
            $table->string('content')->nullable();
            $table->foreignIdFor(courseManagment::class)->constrained()->onDelete('cascade');
            $table->time('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_managments');
    }
};
