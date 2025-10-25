<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'precio', 'adquirido'];
    
    protected $casts = [
        'adquirido' => 'boolean',
        'precio' => 'decimal:2'
    ];
}
