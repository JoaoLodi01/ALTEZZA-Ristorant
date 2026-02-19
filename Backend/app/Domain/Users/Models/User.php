<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends BaseModel
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class)
            ->withPivot(['role', 'status'])
            ->withTimestamps();
    }

    public function currentCompany()
    {
        return $this->belongsTo(Company::class, 'current_company_id');
    }
}
