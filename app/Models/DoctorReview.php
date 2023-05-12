<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Subjects\Doctor;
use App\Models\Subjects\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id;
 * @property string $title
 * @property string $text
 * @property float $rank
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Patient $patient
 * @property Doctor $doctor
 */
class DoctorReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'text',
        'rank'
    ];
    function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public $timestamps = true;
}
