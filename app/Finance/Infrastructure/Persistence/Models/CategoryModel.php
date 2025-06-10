<?php

namespace App\Finance\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use App\User\Infrastructure\Persistence\Models\UserModel;

class CategoryModel extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
