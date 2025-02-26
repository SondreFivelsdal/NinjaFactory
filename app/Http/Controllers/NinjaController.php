<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ninja;
use App\Models\Dojo;

class NinjaController extends Controller
{
    public function index() {
        // route --> /sondre/
        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);
        
        return view('sondre.index', ["ninjas" => $ninjas]);
    }

    public function show(Ninja $ninja) {
        // route --> /sondre/{id}
        $ninja->load('dojo');
        
        return view('sondre.show', ["ninja" => $ninja]);
    }

    public function create() {
        // route --> /sondre/create
        $dojos = Dojo::all();

        return view('sondre.create', ['dojos' => $dojos]);
    }

    public function store(Request $request) {
        // route --> /sondre/ (POST)
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:1000',
            'dojo_id' => 'required|exists:dojos,id',
        ]);

        Ninja::create($validated);

        return redirect()->route('ninjas.index')->with('success', 'Ninja Created');
    }

    public function destroy(Ninja $ninja) {

        $ninja->delete();

        return redirect()->route('ninjas.index')->with('success', 'Ninja Deleted!'); 
    }
}

