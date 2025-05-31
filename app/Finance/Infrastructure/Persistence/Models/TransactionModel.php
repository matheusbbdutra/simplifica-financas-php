<?php

namespace App\Finance\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use App\Finance\Infrastructure\Persistence\Models\AccountModel;
use App\Finance\Infrastructure\Persistence\Models\CategoryModel;
use App\Finance\Infrastructure\Persistence\Models\SubCategoryModel;
use App\Finance\Infrastructure\Persistence\Models\CreditCardModel;
use App\User\Infrastructure\Persistence\Models\UserModel;

class TransactionModel extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'description',
        'amount',
        'due_date',
        'paid_at',
        'is_effected',
        'category_id',
        'subcategory_id',
        'account_id',
        'is_recurring',
        'installment_number',
        'total_installments',
        'credit_card_id',
        'type_id',
        'user_id',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'paid_at' => 'datetime',
        'is_effected' => 'boolean',
        'is_recurring' => 'boolean',
        'amount' => 'float',
        'installment_number' => 'integer',
        'total_installments' => 'integer',
        'category_id' => 'integer',
        'subcategory_id' => 'integer',
        'credit_card_id' => 'integer',
        'type_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function account()
    {
        return $this->belongsTo(AccountModel::class, 'account_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategoryModel::class, 'subcategory_id');
    }

    public function creditCard()
    {
        return $this->belongsTo(CreditCardModel::class, 'credit_card_id');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
