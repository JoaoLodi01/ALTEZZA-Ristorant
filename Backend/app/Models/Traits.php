<?php

namespace App\Models\Traits;

use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait BelongsToCompany
{
    protected static function bootBelongsToCompany()
    {
        static::addGlobalScope(new CompanyScope);

        static::creating(function (Model $model) {
            if (Auth::check() && !$model->company_id) {
                $model->company_id = Auth::user()->current_company_id;
            }
        });
    }
}
