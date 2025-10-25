<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda Laravel</title>
    <style>
        body { font-family: Arial; max-width: 720px; margin: 24px auto; }
        table { width: 100%; border-collapse: collapse; }
        td, th { border: 1px solid #ddd; padding: 8px; }
        form { margin: 16px 0; }
        .ok { color: green; font-weight: bold; }
        .btn { padding: 6px 10px; text-decoration: none; border: 1px solid #555; border-radius: 6px; }
    </style>
</head>
<body>
    <h1>Inventario simple - Laravel</h1>
    
    <form method="POST" action="{{ route('productos.store') }}">
        @csrf
        <label>Nombre: <input name="nombre" required></label>
        <label>Precio: <input name="precio" type="number" step="0.01" required></label>
        <button type="submit">Agregar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Adquirido</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ number_format($producto->precio, 2) }}</td>
                <td>{!! $producto->adquirido ? '<span class="ok">Sí</span>' : 'No' !!}</td>
                <td>
                    <a class="btn" href="{{ route('productos.toggle', $producto->id) }}">Toggle</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
