<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'position_id',
        'role',
        'position_id',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roleDescription(): Attribute
    {
        return Attribute::make(fn() => $this->role ? RoleEnum::getDescription((string) $this->role) : null);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function batchUsers():HasOne
    {
        return $this->hasOne(BatchUser::class);
    }

    // public function hasRole($role)
    // {
    //     return $this->role === $role;
    // }

}