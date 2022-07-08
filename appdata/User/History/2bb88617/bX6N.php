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
        'kind_name'
    ];

    protected $visible = [
        'name',
        'age',
        'size',
        'kind_name'
    ];

    protected $fillable = ['name'];

    public function getKindNameAttribute() {
        return $this->kind->kind;
    }

    public function kind() {
        return $this->belongsTo(Kind::class);
    }
}
