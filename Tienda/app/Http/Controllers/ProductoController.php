<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->get();
        return view('productos.index', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:120',
            'precio' => 'required|numeric|min:0.01'
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio
        ]);

        return redirect()->route('productos.index');
    }

    public function toggle($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->adquirido = !$producto->adquirido;
        $producto->save();

        return redirect()->route('productos.index');
    }
}
