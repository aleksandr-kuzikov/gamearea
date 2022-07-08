<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kind;

class Animal extends Model
{
    use HasFactory;

    protected $attributes = [
        'age' => 0,
        'size' => 1,
    ];

    protected $hidden = [
        'id',
        'updated_at',
        'created_at'
    ];

    protected $appends = [
        'kind'
    ];

    public function getKindAttribute() {
        return Kind::firstWhere('id', $this->kind_id)->kind;
    }

    public function kind() {
        return $this->belongsTo(Kind::class);
    }
}
