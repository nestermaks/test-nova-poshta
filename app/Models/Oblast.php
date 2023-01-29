<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oblast extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ref'];

    protected $casts = [
        'name' => 'array'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
