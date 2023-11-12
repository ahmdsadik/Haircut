<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('stylist_id')->constrained()->cascadeOnDelete();
            $table->timestamp('appointment_at')->nullable();
            $table->enum('status', [1, 2, 3, 4])->default(1)->comment('1 => scheduled, 2 => in-progress, 3 => completed, 4 => cancelled');
            $table->timestamps();

//            $table->unique(['date', 'time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
