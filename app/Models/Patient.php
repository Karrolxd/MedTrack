<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientsFactory> */
    use HasFactory;

    protected $casts = [
        'encrypted_medical_json' => 'encrypted:array',
        'dob'                    => 'date',
    ];
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'pesel',
        'phone',
        'date_of_birth',
        'sex',
        'encrypted_medical_json'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

}
