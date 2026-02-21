<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;
use App\Support\CompanyContext;

abstract class BaseModel extends Model
{
    protected static function booted()
    {
       static::bootCompanyScope();
       static::bootCompanyCreating();
    }

    protected static function bootCompanyScope()
    {
        if (static::hasCompanyColumn()){
            static::addGlobalScope(new CompanyScope);
        }
    }

    protected static function bootCompanyCreating()
    {
        static::creating(function ($model) {
            if (static::hasCompanyColumn() && CompanyContext::get()) {
                $model->company_id = CompanyContext::get();
            }
        });
    }

    protected static function hasCompanyColumn(): bool
    {
        return in_array('company_id', (new static)->getFillable()) || (new static)->isFillable('company_id');
    }
}
