<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;

return new class extends Migration
{
    /**
     * Task model.
     * 
     * @property string $title
     * @property string $idToken
     * @property string $content
     * @property string $status
     * @property int $category
     * @property int $weight
     * @property int $reps
     * @property int $sets
     * @property int $restTime
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('idToken')->unique();
            $table->string('content', 1000)->nullable();
            $table->enum('status', Task::getAvailableStatuses());
            $table->integer('category');
            $table->integer('weight')->nullable();
            $table->integer('reps');
            $table->integer('sets');
            $table->integer('restTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
