<?php

namespace App\Scopes;

use App\Support\CompanyContext;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class CompanyScope implements Scope
{
    /**
    * @param \Illuminate\Database\Eloquent\Builder $builder
    * @param \Illuminate\Database\Eloquent\Model $model
    */

    public function apply(Builder $builder, Model $model): void
    {
        $companyId = CompanyContext::get();

        if ($companyId) {
            $builder->where('company_id', $companyId);
        }
    }
}
