<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory, HasUuids;

    protected $table = 'user';

    protected $fillable = [
        'name_user',
        'email',
        'password',
    ];

    protected $guarded = [
        'id',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'cart', 'id_user')->withPivot('id', 'image', 'name_product', 'quantity', 'price')->withTimestamps();
    }

    public function checkout()
    {
        return $this->hasMany(Cart::class, 'id_user', 'id');
    }

    public function confirmation()
    {
        return $this->hasMany(Confirmation::class, 'id_user', 'id');
    }

}
