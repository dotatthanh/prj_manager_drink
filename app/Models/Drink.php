<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $fillable = [
    	'code',
    	'name',
    	'description',
    	'avatar',
    	'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
