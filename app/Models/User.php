<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function adminlte_profile_url() {
        return '/profile';
    }

    public function adminlte_image() {
        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);
        $hasImage = public_path('/media/images/profile/'.(strtolower(str_replace(" ", "", $user['registration'])))).'.jpg';

        if(file_exists($hasImage)) {
            return '/media/images/profile/'.(strtolower(str_replace(" ", "", $user['registration']))).'.jpg';
        }
        else {
            return '/media/images/profile/profile.jpg';
        }    
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'registration',
        'admin',
        'logistic',
        'concierge'
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
}
