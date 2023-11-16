<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('serving_queue', function (Blueprint $table) {
            $table->id();
            $table->integer('queue_number');
            // queue_number isn't the serving queue number the real serving queue number is the id, queue_number is just a random values to populate the table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serving_queue');
    }
};
