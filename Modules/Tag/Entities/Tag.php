<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $casts = [
        'meta' => 'json'
    ];
}
