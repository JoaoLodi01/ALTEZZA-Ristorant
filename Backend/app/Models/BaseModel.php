<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;
use App\Support\CompanyContext;

abstract class BaseModel extends Model
{
    protected static function booted()
    {
        // 1. Aplica o filtro automático por empresa
        static::addGlobalScope(new CompanyScope);

        // 2. Preenche company_id automaticamente ao criar
        static::creating(function ($model) {

            // Só define se o campo existir na tabela
            if (empty($model->company_id) && CompanyContext::get()) {
                $model->company_id = CompanyContext::get();
            }
        });
    }
}
