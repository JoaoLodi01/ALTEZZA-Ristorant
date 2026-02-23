<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $fillable = [
        'description',
        'lauch_type',
        'allow_installments',
        'max_installments',
        'card_fee',
        'interest_fee',
        'active',
        'company_id',
    ];
}
