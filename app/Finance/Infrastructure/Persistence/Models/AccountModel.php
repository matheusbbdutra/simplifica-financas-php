<?php

namespace App\Finance\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use App\User\Infrastructure\Persistence\Models\UserModel;

class AccountModel extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'name',
        'balance',
        'created_at',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
