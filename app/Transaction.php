<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';
/*    protected $created_at = 'false';
    protected $updated_at = 'false';*/
    public $timestamps = false;




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['trans_id','trans_type','date','time', 'symbol','quantity','meeting_no'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function stocks()
    {
        return $this->belongsTo('App\Stocks');
    }

    public function meetings()
    {
        return $this->belongsTo('App\Meeting');
    }
}
