<?php

use App\Models\Appointment;
use App\Models\Doctor;
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
        Schema::create('medical_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Appointment::class)->unique()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Doctor::class)->constrained('doctors')->cascadeOnDelete();
            $table->string('diagnosis_icd10',10)->nullable();
            $table->text('anamnesis')->nullable();
            $table->text('therapy')->nullable();
            $table->json('encrypted_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_notes');
    }
};
