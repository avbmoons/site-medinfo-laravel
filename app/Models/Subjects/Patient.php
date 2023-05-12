<?php

declare(strict_types=1);

namespace App\Models\Subjects;

use App\Models\DoctorReview;
use App\Models\Documents\Receipt;
use App\Models\Documents\SickList;
use App\Models\Meeting;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id;
 * @property string $refresh_token
 * @property string $access_token
 * @property boolean $is_online
 * @property string $name
 * @property string $surname
 * @property string $barcode
 * @property Clinic $medicalCardStoredInClinic
 * @property Receipt[] $receipts
 * @property DoctorReview[] $reviews
 * @property SickList[] $sickLists
 * @property Payment[] $payments
 */
class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $attributes = [
        'refresh_token' => 'refresh_token_here',
        'access_token' => 'access_token_here',
        'is_online' => '1',
        'medical_card_stored_in_clinic_id' => 11,
    ];

    protected $fillable = [
        'id',
        'refresh_token',
        'access_token',
        'is_online',
        'name',
        'surname',
        'barcode',
        'medical_card_stored_in_clinic_id',
        'status',
        'insurance',
    ];

    function medicalCardStoredInClinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
    function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class);
    }
    function reviews(): HasMany
    {
        return $this->hasMany(DoctorReview::class);
    }
    function sickLists(): HasMany
    {
        return $this->hasMany(SickList::class);
    }
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
