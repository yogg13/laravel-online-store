<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Checkout extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'checkout';

    protected $fillable = ['id_user', 'id_product', 'amount'];

    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    public function confirmation()
    {
        return $this->hasMany(Confirmation::class, 'id_checkout', 'id');
    }
}
