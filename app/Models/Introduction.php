<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Introduction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'text',
        'author_id',
    ];

    public function author(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
