<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_list extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fa_id','c_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function fa()
    {
        return $this->belongsTo('App\Fa');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
