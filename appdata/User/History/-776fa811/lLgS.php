<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    use HasFactory;
    
    protected $hidden = [
        'id',
        'updated_at',
        'created_at'
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
