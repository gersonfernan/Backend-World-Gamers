<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telefono', 'bio', 'gustos', 'imagen', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }

    public function notificaciones(){
        return $this->hasMany(Notificacion::class);
    }

    public function megustas(){
        return $this->hasMany(MeGusta::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function favoritos(){
        return $this->hasMany(Favorito::class);
    }

    public function amistades(){
        return $this->hasMany(Amistad::class);
    }

    public function mensajes(){
        return $this->hasMany(Mensaje::class);
    }
}

