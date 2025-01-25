<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\courseManagment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quiz_managments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(courseManagment::class)->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('number_of_questions');
            $table->double('passing_score');
            $table->double('total_marks');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_managments');
    }
};
