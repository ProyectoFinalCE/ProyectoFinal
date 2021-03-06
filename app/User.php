<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido1', 'apellido2', 'nombre_usuario', 'email', 'password', 'telefono', 'imagen', 'direccion_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function producto()
    {
        return $this->hasMany('App\Producto');
    }

    public function direccion()
    {
        return $this->belongsTo('App\Direccion');
    }

    public function producto_favorito()
    {
        return $this->belongsToMany('App\ProductoFavorito');
    }

    public function vendedor()
    {
        return $this->hasMany('App\ProductoVendido');
    }

    public function vendido_a()
    {
        return $this->hasMany('App\ProductoVendido');
    }
    public function mensaje_user()
    {
        return $this->hasMany('App\Mensaje');
    }
    public function mensaje_enviado_por()
    {
        return $this->hasMany('App\Mensaje');
    }

    public function user_conversacion_1(){
        return $this->hasMany('App\Conversacion','usuario_1','id');
    }
    public function user_conversacion_2(){
        return $this->hasMany('App\Conversacion','usuario_2','id');
    }

}
