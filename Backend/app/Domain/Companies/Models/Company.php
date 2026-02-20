<?php

namespace App\Domain\Companies\Models;

use App\Domain\Users\Models\User;
use App\Models\BaseModel;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends BaseModel
{
    protected $fillable = [
        'legal_name',
        'trade_name',
        'document_number',
        'email',
        'phone',
        'plan_id',
        'is_active',
        'trial_ends_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'trial_ends_at' => 'datetime',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['role', 'status'])
            ->withTimestamps();
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
