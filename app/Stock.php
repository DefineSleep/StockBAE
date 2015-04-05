<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stocks';
/*    protected $created_at = 'false';
    protected $updated_at = 'false';*/
    public $timestamps = 'false';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['symbol','name','last_trade_price','last_trade_price', 'last_trade_date','last_trade_time','change_price','change_percentage','days_high','days_low','volume','stock_exchange'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function shares_list()
    {
        return $this->hasMany('App\Shares_list');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transactions');
    }
}
