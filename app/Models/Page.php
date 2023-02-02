<?php

namespace App\Models;

use App\Traits\ModelGetters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    use ModelGetters;

    protected $appends = ['title'];

    protected $casts = [
        'name' => 'array',
    ];
}
