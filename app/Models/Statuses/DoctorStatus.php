<?php
declare(strict_types=1);

namespace App\Models\Statuses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $description
 * @property string $name
 */
class DoctorStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description'
    ];
    public $timestamps = true;
}
