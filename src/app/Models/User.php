<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Relationship with Order model
     */
    public function orders() {
        return $this->hasMany(Orders::class);
    }
}
