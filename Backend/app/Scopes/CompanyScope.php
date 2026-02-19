<?php

namespace App\Scopes;

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
        if (!Auth::check()) {
            return;
        }

        $companyId = Auth::user()->current_company_id;

        if ($companyId) {
            $builder->where(
                $model->qualifyColumn('company_id'),
                $companyId
            );
        }
    }
}
