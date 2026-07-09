<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['naziv', 'regija', 'broj_stanovnika'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
