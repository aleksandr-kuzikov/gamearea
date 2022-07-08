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

    protected $appends = [
        'kind'
    ];

    protected $visible = [
        'name',
        'age',
        'size',
        'kind'
    ];

    public function getKindAttribute() {
        return $this->animal_kind->kind;
    }

    public function animalKind() {
        return $this->belongsTo(Kind::class);
    }
}
