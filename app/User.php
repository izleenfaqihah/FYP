<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'employee_number', 'employee_phone', 'employee_address', 'role', 'password',
    ];

    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function employee(){
        return $this->hasMany(Employee::class);
    }

    public function tasks(){
        return $this->hasMany('App\Task','user_id');
    }

    public static function sendWelcomeEmail($user)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($user);
      
      // Send email
      Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
        $m->from('info@architect.com', 'Sistem Pengurusan Projek Arkitek');
        $m->to($user->email, $user->name)->subject('Welcome to Sistem Pengurusan Projek Arkitek');
      });
    }

}
