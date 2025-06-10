<?php

namespace App\User\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use App\Finance\Infrastructure\Persistence\Models\AccountModel;
use App\Finance\Infrastructure\Persistence\Models\CreditCardModel;
use App\Finance\Infrastructure\Persistence\Models\SubCategoryModel;
use App\Finance\Infrastructure\Persistence\Models\TransactionModel;
use App\Finance\Infrastructure\Persistence\Models\TransactionTypeModel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class UserModel extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function accounts()
    {
        return $this->hasMany(AccountModel::class, 'user_id');
    }

    public function creditCards()
    {
        return $this->hasMany(CreditCardModel::class, 'user_id');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategoryModel::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(TransactionModel::class, 'user_id');
    }

    public function transactionTypes()
    {
        return $this->hasMany(TransactionTypeModel::class, 'user_id');
    }
}
