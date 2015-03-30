<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'account';
    protected $created_at = 'false';
    protected $updated_at = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_no','amount'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    public function client()
    {
        return $this->hasOne('App\Client');
    }

}
