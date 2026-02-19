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
        'status',
        'permission_id'
    ];

    protected $casts = [
        'role' => CompanyRole::class,
    ];
}
