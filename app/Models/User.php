<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * Escopo local para aplicar um filtro de busca no nome ou e-mail.
     *
     * Permite que a consulta seja filtrada por registros cujo campo `name` ou `email`
     * contenha o termo de pesquisa informado. A função também faz o escape dos caracteres
     * `%` e `_` para evitar comportamentos indesejados no LIKE do SQL.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search  Termo a ser buscado nos campos `name` e `email`
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . addcslashes($search, '%_') . '%')
                ->orWhere('email', 'like', '%' . addcslashes($search, '%_') . '%');
        });
    }
}
