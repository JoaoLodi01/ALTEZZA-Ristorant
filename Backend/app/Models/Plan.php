<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'max_users',
        'max_branches',
        'features',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'max_users' => 'integer',
        'max_branches' => 'integer',
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Empresas que utilizam esse plano
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
