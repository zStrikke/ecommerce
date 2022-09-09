<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    // 05:44 de la manana.
    // Cuando el id no es un numero que se pueda autoincrementar no se porque al hacer queries se convierte a 0.
    // con esto nos quitamos el problema. Pero no el dolor de cabeza.
    public $incrementing = false;

    /*
    * https://laravel.com/docs/8.x/eloquent#primary-keys  (╥╯⌒╰╥๑)
    In addition, Eloquent assumes that the primary key is an incrementing integer value, which means that 
    Eloquent will automatically cast the primary key to an integer. If you wish to use a non-incrementing 
    or a non-numeric primary key you must define a public $incrementing property on your model that is set to false:
    */

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }
}
