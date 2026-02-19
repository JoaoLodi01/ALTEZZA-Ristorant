<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRolePermission extends Model
{
    protected $fillable = [
        'company_id',
        'role',
        'permisison_id'
    ];
}
