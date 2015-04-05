<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meeting';
/*    protected $created_at = 'false';
    protected $updated_at = 'false';*/
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['meeting_no', 'fa_id', 'c_id', 'date', 'time', 'notes'];

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
    public function transactions()
    {
        return $this->hasMany('App\Transactions');
    }
}

