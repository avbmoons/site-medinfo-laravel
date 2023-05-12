<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $rules_url
 * @property Meeting[] $meetings
 */
class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'rules_url'
    ];

    function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
    function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }
    public $timestamps = true;
}
