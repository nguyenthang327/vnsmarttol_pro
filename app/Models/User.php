<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    public const GROUP_MEMBER = 0;
    public const GROUP_COLLABORATOR = 1;
    public const GROUP_AGENCY = 2;
    public const GROUP_DISTRIBUTOR = 3;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'email_verified_at',
        'password',
        'api',
        'cash',
        'collaborator',
        'ip',
        'device',
        'cheat',
        'identity_website',
        'remember_token',
        'status',
        'spin_count',
        'full_name',
        'all_money',
        'avatar',
        'facebook',
        'phone',
        'ugroup',
        'reason'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
}
