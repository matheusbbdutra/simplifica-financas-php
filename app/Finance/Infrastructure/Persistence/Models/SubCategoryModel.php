<?php

namespace App\Finance\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use App\Finance\Infrastructure\Persistence\Models\CategoryModel;
use App\User\Infrastructure\Persistence\Models\UserModel;

class SubCategoryModel extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'name',
        'category_id',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
