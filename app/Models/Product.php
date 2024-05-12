<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'product';

    protected $fillable = ['name_product', 'price', 'image'];

    protected $guarded = [
        'id',
    ];

    public function checkout()
    {
        return $this->hasMany(Checkout::class, 'id_product', 'id');
    }
}
