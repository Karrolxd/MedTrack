<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedicalNote extends Model
{
    protected $fillable = [
        'appointment_id',
        'doctor_id',
        'diagnosis_icd10',
        'anamnesis',
        'therapy',
        'encrypted_json'
    ];
    protected $casts = [
        'encrypted_json'=>'encrypted:array'
    ];

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function prescription(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }

    public function icd11(): BelongsTo
    {
        return $this->belongsTo(Icd11Code::class, 'diagnosis_icd11', 'code');
    }
}
