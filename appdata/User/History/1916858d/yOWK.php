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


        $animal = Animal::firstWhere('name', $name);
        
        return $animal;
    }

    public function create(Request $request) {
        $validated = $request->validate([
            'kind' => 'bail|required|exists:kinds',
            'name' => 'required'
        ]);

        $animal = Kind::firstWhere('kind', $request->kind)->animals()->create([
            "name"  => $request->name
        ]);

        return $animal;
    }

    public function age(Request $request) {
        $validated = $request->validate([
            'name' => 'bail|required|exists:animals'
        ]);

        $animal = Animal::firstWhere('name', $request->name);
        $kind = $animal->kind;
        $new_age = $animal->age + 1;
        $animal->age = $new_age > $kind->max_age ? $kind->max_age : $new_age;
        $new_size = $animal->size + $kind->growth_factor;
        $animal->size = $new_size > $kind->max_size ? $kind->max_size : $new_size;

        $animal->save();

        return $animal;
    }

    public function destroyAll() {
        $affected = Animal::whereNotNull('id')->delete();
        return ['affected' => $affected];
    }
}
