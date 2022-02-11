<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Auth\Entities\User;

class Media extends Model
{
    use HasFactory;

    protected $casts = [
        'files' => 'json',
        'meta' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
