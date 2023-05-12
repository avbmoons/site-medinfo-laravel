<?php
declare(strict_types=1);

namespace App\Models\Subjects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $registration_number
 * @property Carbon $founding_date
 * @property Clinic[] $clinics
 * @property Doctor[] $doctorsStudied
 * @property Pharmacy[] $pharmacies
 */
class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'phone',
        'description',
        'registration_number',
        'founding_date',
    ];
    protected $casts = [
        'founding_date' => 'datetime',
    ];

    function clinics(): HasMany
    {
        return $this->hasMany(Clinic::class);
    }
    function doctorsStudied(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
    function pharmacies(): HasMany
    {
        return $this->hasMany(Pharmacy::class);
    }
    public $timestamps = true;

}
