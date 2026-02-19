<?php

namespace App\Models;

use App\Enums\CompanyRole;
use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'role',
    ];

    protected $casts = [
        'role' => CompanyRole::class,
    ];
}
