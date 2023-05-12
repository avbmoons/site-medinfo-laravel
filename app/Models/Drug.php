<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Documents\Receipt;
use App\Models\Subjects\Pharmacy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id;
 * @property string $description_url
 * @property Receipt[] $receipts
 */
class Drug extends Model
{
    use HasFactory;

    protected $table = 'drugs';

    protected $attributes = [
        'pharmacies_id' => 1,
    ];

    protected $fillable = [
        'id',
        'name',
        'description_url',
        //'pharmacies_id',
        'status',
    ];

    function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class);
    }
    function pharmacies(): BelongsToMany
    {
        return $this->belongsToMany(Pharmacy::class);
    }

    public $timestamps = true;
}
