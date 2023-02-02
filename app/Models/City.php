<?php

namespace App\Models;

use App\Traits\ModelGetters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    use ModelGetters;

    protected $appends = ['title'];

    protected $fillable = ['name', 'ref'];

    protected $casts = [
        'name' => 'array'
    ];

    public function oblast()
    {
        return $this->belongsTo(Oblast::class);
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
