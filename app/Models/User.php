<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

 //CONFIGURACIONES ADMINLTE
 public function adminlte_image(){
    // recupera la imagen
    $userImagePath = auth()->user()->profile_photo_path; 

    // verifica si existe, ni no tiene devuelve una imagen aleatoria
    if (!$userImagePath) {
        return 'https:picsum.photos/300/300'; // url del ejemplo
    }

    // concatena con APP_URL y storage para mostrar la imagen
    $fullImagePath = env('APP_URL') . '/' . 'storage' . '/' . $userImagePath;

    // url completa
    return $fullImagePath;
}

public function adminlte_desc(){
    // recuperar cuando tengamos roles
    return 'Administrador';
}

public function adminlte_profile_url(){
    // perfil del usuario temporal de jetstream
    return '/user/profile';
}    
}
