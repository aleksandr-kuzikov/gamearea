<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kind;
use App\Models\Animal;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    public function index() 
    {
        return Animal::all();
    }

    public function show($name) {
        $validated = Validator::make(['name' => $name], [
            'name' => 'bail|required|exists:animals'
        ])->validated();


        $animal = Animal::firstWhere('name', $validated['name']);
        
        return $animal;
    }

    public function create(Request $request) {
        $validated = $request->validate([
            'kind' => 'bail|required|exists:kind',
            'name' => 'required'
        ]);

        $animal = Kind::firstWhere('kind', $validated->kind)->animals()->create([
            "name"  => $validated->name
        ]);

        return $animal;
    }

    public function age(Request $request) {
        $validated = $request->validate([
            'name' => 'bail|required|exists:animals'
        ]);

        $animal = Animal::firstWhere('name', $validated->name);
        $animal->age = $animal->age + 1;
        $kind = $animal->kind;
        $new_size = $animal->size + $kind->growth_factor;
        $animal->size = $new_size > $kind->max_size ? $kind->max_size : $new_size;

        $animal->save();

        // return $animal;
        return response()->json($animal);
    }
}
