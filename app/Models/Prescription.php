<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescription extends Model
{
    protected $fillable = [
        'medical_note_id',
        'doctor_id',
        'pdf_path',
        'expires_at'
    ];
    protected $dates = ['expires_at'];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function note(): BelongsTo
    {
        return $this->belongsTo(MedicalNote::class);
    }
}
