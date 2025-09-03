<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'price',
        'location',
        'condition',
        'slug',
        'created_by',
        'updated_by',
        'deleted_by',
        'user_id',
    ];

    protected $casts = [
        'price' => 'int',
        'created_by' => 'int',
        'updated_by' => 'int',
        'deleted_by' => 'int',
        'category_id' => 'int',
        'user_id' => 'int',
    ];

    // override the function used to set the route name based on a model column
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
