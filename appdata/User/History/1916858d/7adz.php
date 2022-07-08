<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kind;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index() 
    {
        return Animal::all();
    }

    public function show($name) {
        $animal = Animal::firstWhere('name', $name);
        if ($animal) 
            return $animal;
        
            return [
                "status" => "404"
            ];
    }

    public function create(Request $request) {

        // $animal = new Animal();
        // $animal->kind = Kind::firstWhere('kind', $request->kind);
        // $animal->name = $request->name;
        // $animal->save();

        $animal = Kind::firstWhere('kind', $request->kind)->animals()->create([
            "name"  => $request->name
        ]);

        return [
            "error" => null,
            "data"  => [
                "id"    => $animal->id,
                "name"  => $animal->name,
                "kind"  => $animal->kind->kind,
                "age"   => $animal->age,
                "size"  => $animal->size
            ]
        ];
    }

    public function age(Request $request) {

        $animal = Animal::firstWhere('name', $request->name);
        $animal->age = $animal->age + 1;
        $kind = $animal->kind;
        $new_size = $animal->size + $kind->grow_factor;
        $animal->size = $new_size > $kind->max_size ? $kind->max_size : $new_size;

        return [
            "error" => null,
            "data"  => [
                "id"    => $animal->id,
                "name"  => $animal->name,
                "kind"  => $animal->kind->kind,
                "age"   => $animal->age,
                "size"  => $animal->size
            ]
        ];
    }
}
