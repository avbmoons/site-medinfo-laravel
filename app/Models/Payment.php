<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Statuses\PaymentStatus;
use App\Models\Subjects\Patient;
use App\Models\Types\PaymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Patient $patient
 * @property PaymentType $type
 * @property Service $service
 * @property PaymentStatus $status
 */
class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'description'
    ];

    function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    function type(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }
    function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    function status(): BelongsTo
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    public $timestamps = true;
}
