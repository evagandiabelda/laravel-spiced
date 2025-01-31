<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Spice;
use Illuminate\Http\Request;

class SpiceController extends Controller
{
    // Mostrar todos los spices
    public function index()
    {
        $spices = Spice::all();
        return view('spices.index', compact('spices'));
    }

    // Mostrar un solo spice
    public function show(string $id)
    {
        $spice = Spice::findOrFail($id);
        return view('spices.show', compact('spice'));
    }
}
