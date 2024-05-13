<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Cart extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'cart';

    protected $fillable = ['id_user', 'id_product', 'quantity'];

    protected $guarded = [
        'id',
    ];
}
