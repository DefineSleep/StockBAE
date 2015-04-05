<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Client extends \Eloquent{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client';
/*    protected $created_at = 'false';
    protected $updated_at = 'false';*/
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['c_id','password', 'name', 'email', 'address', 'dob', 'account_no','ni_no', 'contact_no' ,'net_worth'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function shares_list()
    {
        return $this->hasMany('App\Shares_list');
    }


    public function client_list()
    {
        return $this->hasOne('App\Client_list');
    }
    public function meeting()
    {
        return $this->hasMany('App\Meeting');
    }
}
