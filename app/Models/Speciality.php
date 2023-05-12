<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Subjects\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Speciality extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public $timestamps = true;
}
