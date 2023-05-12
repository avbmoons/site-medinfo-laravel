<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Subjects\Clinic;
use App\Models\Subjects\Pharmacy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrganizationType extends Model
{
    use HasFactory;

    protected $table = 'organization_types';

    protected $fillable = [
        'id',
        'organizationType',
        'description',
        'status',
    ];

    function clinics(): HasMany
    {
        return $this->hasMany(Clinic::class);
    }
    function pharmacies(): HasMany
    {
        return $this->hasMany(Pharmacy::class);
    }
    public $timestamps = true;
}
