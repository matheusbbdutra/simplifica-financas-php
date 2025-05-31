<?php

namespace App\Finance\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use App\Finance\Infrastructure\Persistence\Models\AccountModel;
use App\User\Infrastructure\Persistence\Models\UserModel;

class CreditCardModel extends Model
{
    protected $table = 'credit_cards';

    protected $fillable = [
        'name',
        'limit_total',
        'limit_available',
        'account_id',
        'user_id',
    ];

    public function account()
    {
        return $this->belongsTo(AccountModel::class, 'account_id');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
