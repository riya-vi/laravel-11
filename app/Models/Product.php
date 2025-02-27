<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public $timestamps = true;
    protected $fillable = [ 
        'name',
        'quantity',
        'price',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id')->withDefault([
            'name' => 'user name' ,
        ]) ;
    }
}
