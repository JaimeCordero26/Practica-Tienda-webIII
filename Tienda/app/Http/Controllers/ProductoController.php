<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Muestra el listado de productos, ordenando descendente por id.
    public function index()
    {
        // Eloquent: consulta ordenada y trae todos los registros.
        $productos = Producto::orderBy('id', 'desc')->get();
        // Envía los datos a la vista 'productos.index' compactando la variable.
        return view('productos.index', compact('productos'));
    }

    // Guarda un nuevo producto validando la entrada.
    public function store(Request $request)
    {
        // Validación: nombre obligatorio (máx 120), precio numérico (> 0).
        $request->validate([
            'nombre' => 'required|string|max:120',
            'precio' => 'required|numeric|min:0.01'
        ]);

        // Creación usando asignación en masa (permitida por $fillable).
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio
        ]);

        // Redirige de vuelta al índice.
        return redirect()->route('productos.index');
    }

    // Alterna el estado 'adquirido' de un producto por id.
    public function toggle($id)
    {
        // findOrFail lanza 404 si no existe el registro.
        $producto = Producto::findOrFail($id);
        // Negación booleana para alternar el valor.
        $producto->adquirido = !$producto->adquirido;
        // Persiste el cambio en la BD.
        $producto->save();

        // Redirige al listado.
        return redirect()->route('productos.index');
    }
}
