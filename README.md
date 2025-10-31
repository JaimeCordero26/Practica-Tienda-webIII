# Mini-Inventario con Laravel (Linux)

Este repositorio contiene un mini-inventario desarrollado en **Laravel**.  
Permite **listar**, **agregar** y **alternar** productos (campo `adquirido`) dentro de una base de datos MySQL.

---

## 📁 Estructura del repositorio

```
.
├── Evidencias/              # Carpeta donde se guardan las capturas de pantalla
├── Tienda/                  # Carpeta del proyecto Laravel
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── tests/
│   ├── artisan
│   ├── composer.json
│   ├── package.json
│   └── README.md
└── README.txt               # Este archivo
```

---

## ⚙️ Requisitos del sistema

- Linux (Ubuntu, Debian o similar)
- PHP 8.1+
- Composer 2.x
- MySQL o MariaDB
- Node.js y NPM (para assets con Vite)
- Git

---

## 🧩 Instalación y configuración

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/JaimeCordero26/Practica-Tienda-webIII.git
   cd tienda-laravel/Tienda
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Copiar archivo de entorno y configurar base de datos**
   ```bash
   cp .env.example .env
   ```
   Edita el archivo `.env` con tus credenciales MySQL:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tienda
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generar la clave de aplicación**
   ```bash
   php artisan key:generate
   ```

5. **Ejecutar las migraciones**
   ```bash
   php artisan migrate
   ```

6. **(Opcional) Ejecutar seeders o factories**
   ```bash
   php artisan db:seed
   ```

7. **Levantar el servidor de desarrollo**
   ```bash
   php artisan serve
   ```
   Accede desde el navegador a:  
   👉 `http://127.0.0.1:8000/productos`

8. **Compilar assets con Vite (si se usan estilos o JS personalizados)**
   ```bash
   npm install
   npm run dev
   ```

---

## 🧮 Funcionalidad principal

| Acción | Método | Ruta | Descripción |
|--------|--------|------|--------------|
| Listar productos | GET | `/productos` | Muestra todos los productos |
| Agregar producto | POST | `/productos` | Inserta un nuevo registro |
| Alternar “Adquirido” | POST | `/productos/{id}/toggle` | Cambia el estado del producto |

---

## 📜 Ejemplo de rutas (`routes/web.php`)
```php
use App\Http\Controllers\ProductoController;

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::post('/productos/{id}/toggle', [ProductoController::class, 'toggle'])->name('productos.toggle');
```

---

## 🧠 Notas importantes

- El sistema utiliza Eloquent ORM para todas las operaciones con base de datos.
- Las validaciones se realizan directamente en el controlador mediante `$request->validate()`.
- El campo `adquirido` se alterna dinámicamente usando `findOrFail` y un cambio booleano.

---

## 🧪 Pruebas manuales sugeridas

1. Insertar al menos **3 productos** desde el formulario.
2. Alternar el campo **adquirido** varias veces y verificar los cambios en la base de datos.
3. Consultar con:
   ```sql
   SELECT * FROM productos;
   ```
4. Validar que el campo `adquirido` se muestre correctamente en la vista (`Sí/No`).

---

## 🚀 Publicación en GitHub

```bash
git init
git add .
git commit -m "Proyecto Mini-Inventario Laravel (Linux)"
git branch -M main
git remote add origin https://github.com/JaimeCordero26/Practica-Tienda-webIII.git
git push -u origin main
```

---

## 📂 Evidencias

La evidencias están en un docx dentro de la carpeta evidences:

```
Evidencias/
```

---

## 👨‍💻 Autor

**Alejandro Cordero**  
Estudiante de ITI-621 — Tecnología y Sistemas Web III  
Universidad Técnica Nacional (UTN)
