<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialTransaction extends Model
{
    protected $fillable = [
        'description',
        'module',
        'type',
        'origin_type',
        'origin_id',

        'amount_original',
        'amount_interest',
        'amount_fine',
        'amount_fees',
        'amount_discount',
        'amount_addition',
        'amount_liquid',

        'installment_number',
        'installment_quantity',

        'group_id',
        'parent_id',

        'payment_method_id',
        'due_date',
        'paid_at',

        'status',
        'canceled_at',

        'user_created',
        'user_canceled',
        'user_paid',
        
        'company_id',
    ];
}
