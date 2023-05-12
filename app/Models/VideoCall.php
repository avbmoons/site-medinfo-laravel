<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $speaking_time
 * @property string $url
 * @property Meeting $meeting
 */
class VideoCall extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'speaking_time',
        'url'
    ];

    protected $casts = [
        'speaking_time' => 'timestamp'
    ];

    function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }


    public $timestamps = true;
}
