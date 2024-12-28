<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fund extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function isProtected()
    {
        return in_array($this->id, [1, 2]);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

}
