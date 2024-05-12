<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Confirmation extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'confirmation';

    protected $fillable = ['id_user', 'id_checkout', 'proof'];

    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'id_checkout', 'id');
    }
}
