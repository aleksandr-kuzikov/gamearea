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

    // protected $hidden = [
    //     'id',
    //     'kind_id',
    //     'kind',
    //     'updated_at',
    //     'created_at'
    // ];

    // protected $appends = [
    //     'kind_name'
    // ];

    protected $visible = [
        'name'
    ];

    public function getKindNameAttribute() {
        return $this->kind->kind;
    }

    public function kind() {
        return $this->belongsTo(Kind::class);
    }
}
