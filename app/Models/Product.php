<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        protected $fillable = ['category_id', 'naziv', 'opis', 'cijena', 'kolicina', 'izvor', 'slika'];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }

        public function country()
        {
            return $this->belongsTo(Country::class);
        }

        protected function casts(): array
        {
            return [
                'cijena' => 'decimal:2',
                'kolicina' => 'integer',
            ];
        }
    }
