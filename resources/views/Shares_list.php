<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Shares_list extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shares_list';
    protected $created_at = 'false';
    protected $updated_at = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['symbol','c_id','quantity', 'trigger', 'bough_price', 'date_bought'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function stocks()
    {
        return $this->belongsTo('App\Stocks');
    }

    public function Clientt()
    {
        return $this->belongsTo('App\Client');
    }


}
