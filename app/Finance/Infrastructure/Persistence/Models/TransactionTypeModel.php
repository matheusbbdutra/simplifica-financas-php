<?php

namespace App\Finance\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use App\User\Infrastructure\Persistence\Models\UserModel;

class TransactionTypeModel extends Model
{
    protected $table = 'transaction_types';

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
