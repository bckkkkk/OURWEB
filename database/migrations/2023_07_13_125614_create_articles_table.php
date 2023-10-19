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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
			$table->string('title');
			$table->text('content');
			$table->text('summary');
			$table->text('image')->nullable();
			$table->date('start_time');
            $table->date('end_time');
            $table->date('start_time_event');
            $table->date('end_time_event');
            $table->boolean('send_already') -> default(0);
            $table->integer('maximum')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
