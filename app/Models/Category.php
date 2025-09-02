<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id'
    ];

    protected $casts = [
        'parent_id' => 'int'
    ];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
