<?php

declare(strict_types=1);

namespace App\Models\Documents;

use App\Models\Drug;
use App\Models\Subjects\Doctor;
use App\Models\Subjects\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id;
 * @property Carbon $created_date;
 * @property Carbon $valid_until_date;
 * @property string $barcode;
 * @property Doctor $doctor
 * @property Patient $patient
 * @property Drug $drug
 */
class Receipt extends Model
{
    use HasFactory;

    protected $table = 'receipts';

    protected $attributes = [
        'valid_until_date' => '2099-01-01',
    ];

    protected $fillable = [
        'id',
        'name',
        'barcode',
        'patient_id',
        'doctor_id',
        'drug_id',
        'status',
    ];

    function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class);
    }

    public $timestamps = true;
}
