<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    use HasFactory;

    protected $table = 'mueble';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'material',
        'precio'
    ];

    protected $guarded = [
        
    ];
}
