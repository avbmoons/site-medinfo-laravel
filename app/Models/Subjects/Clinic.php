<?php

declare(strict_types=1);

namespace App\Models\Subjects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $gps_coordinates
 * @property array $working_modes
 * @property Organization $organization
 */
class Clinic extends Model
{
    use HasFactory;

    protected $table = 'clinics';

    protected $attributes = [
        'organization_id' => 1,
    ];

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'email',
        'gps_coordinates',
        'working_modes',
        'organization_id',
        'organization_types_id',
        'status',
    ];

    function cardByPatients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
    function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }


    public $timestamps = true;
}
