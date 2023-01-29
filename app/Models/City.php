<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ref'];

    protected $casts = [
        'name' => 'array'
    ];

    public function oblast()
    {
        return $this->belongsTo(Oblast::class);
    }

    public function warehoused()
    {
        return $this->hasMany(Warehouse::class);
    }
}
