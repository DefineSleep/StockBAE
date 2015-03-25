<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Fa extends \Eloquent{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fa';
    protected $created_at = 'false';
    protected $updated_at = 'false';
    public $timestamps = 'false';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fa_id','password', 'name', 'email', 'address', 'dob', 'contact_no','start_date','salary/hr', 'ni_no' ,'admin_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

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
