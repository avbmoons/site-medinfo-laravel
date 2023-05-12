<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Documents\SickList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    function diagnosis(): HasMany
    {
        return $this->hasMany(SickList::class);
    }
}
