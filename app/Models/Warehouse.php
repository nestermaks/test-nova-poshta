<?php

namespace App\Models;

use App\Traits\ModelGetters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    use ModelGetters;

    protected $appends = ['title'];

    protected $fillable = ['name', 'ref'];

    protected $casts = [
        'name' => 'array'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
