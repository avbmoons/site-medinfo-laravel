<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Subjects\Doctor;
use App\Models\Subjects\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $description
 * @property string $result
 * @property array $written_entities
 * @property VideoCall[] $videoCalls
 */
class Meeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'description',
        'result',
        'written_entities',
        'address'
    ];

    function videoCalls(): HasMany
    {
        return $this->hasMany(VideoCall::class);
    }
    function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    protected $casts = [
        'written_entities' => 'array',
    ];
    public $timestamps = true;
}
