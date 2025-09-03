<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'ad_id'
    ];

    protected $casts = [
        'ad_id' => 'int'
    ];

    public function ad() {

        return $this->belongsTo(Ad::class);

    }
}
