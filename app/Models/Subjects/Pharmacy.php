<?php

declare(strict_types=1);

namespace App\Models\Subjects;

use App\Models\Drug;
use App\Models\Subjects\Organizations\PharmacyOrganization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $gps_coordinates
 * @property array $working_modes
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Organization $organization
 */
class Pharmacy extends Model
{
    use HasFactory;

    protected $table = 'pharmacies';

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
        'organization_types_id',
        'status',
    ];

    function drugs(): BelongsToMany
    {
        return $this->belongsToMany(Drug::class);
    }
    function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    protected $casts = [
        'working_modes' => 'array',
    ];



    public $timestamps = true;
}
