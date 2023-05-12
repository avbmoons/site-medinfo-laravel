<?php
declare(strict_types=1);

namespace App\Models\Statuses;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 */
class PaymentStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public $timestamps = true;
}
