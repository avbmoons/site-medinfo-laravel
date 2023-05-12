<?php

declare(strict_types=1);

namespace App\Models\Documents;

use App\Models\Diagnosis;
use App\Models\Subjects\Doctor;
use App\Models\Subjects\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $description
 * @property Carbon $created_date
 * @property Carbon $valid_until_date
 * @property Doctor $doctor
 * @property Patient $patient
 */
class SickList extends Model
{
    use HasFactory;

    protected $table = 'sick_lists';

    protected $fillable = [
        'id',
        'description',
        'valid_until_date',
        'diagnosis_id',
        'receipt_id',
        'patient_id',
        'doctor_id',
    ];
    protected $casts = [
        'valid_until_date' => 'datetime',
    ];

    function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    function diagnosis(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class);
    }
    function receipt(): BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }

    public $timestamps = true;
}
