<?php
namespace Modules\Option\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $casts = [
        'meta' => 'json'
    ];
}
