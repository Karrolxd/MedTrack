<?php

use App\Models\Appointment;
use App\Models\Patient;
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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Appointment::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('uploader_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('path');
            $table->string('mime', 100);
            $table->unsignedBigInteger('size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
