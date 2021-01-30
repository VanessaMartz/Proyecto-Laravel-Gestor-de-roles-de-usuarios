<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\SortableTrait;

class User extends Authenticatable
{
    use Notifiable;
    use SortableTrait;

    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //Los atributos que deben ocultarse para las matrices
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Los atributos que se deben convertir en tipos nativos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    //Array de roles
    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
          return $this->hasAnyRole($roles) || 
                 abort(401, 'This action is unauthorized.');
      }
      return $this->hasRole($roles) || 
             abort(401, 'This action is unauthorized.');
    }
    //Checa múltiples roles
    public function hasAnyRole($roles)
    {
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }
   //Checa un rol
    public function hasRole($role)
    {
      return null !== $this->roles()->where('name', $role)->first();
    }

    public function scopeSearch($q)
    {
        return empty(request()->search) ? $q : $q->where('name', 'like', '%'.request()->search.'%')->orWhere('email', 'like', '%'.request()->search.'%');
    }
}
