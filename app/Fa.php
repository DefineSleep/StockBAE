<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fa_id', 'name', 'email', 'address', 'dob', 'contact_no', 'ni_no'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function client_list()
    {
        return $this->hasMany('App\Client_list');
    }
    public function meeting()
    {
        return $this->hasMany('App\Meeting');
    }
}
