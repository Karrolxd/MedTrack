<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Icd11Code extends Model
{
    protected $table      = 'icd11_codes';
    protected $primaryKey = 'code';
    public $incrementing  = false;
    protected $keyType    = 'string';

    public function notes(): HasMany
    {
        return $this->hasMany(MedicalNote::class, 'diagnosis_icd11', 'code');
    }
}
