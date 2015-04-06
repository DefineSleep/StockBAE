<?php namespace App\Http\Controllers;

use App\Account;
use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shares_list;
use App\Stock;
use App\Stocks;
use Illuminate\Http\Request;

class SharesListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function index($id)
    {
        /*$shares = Shares_list::all();*/
        $shares = Shares_list::all(['c_id'])->first()
            ->select('shares_list.c_id', 'shares_list.symbol', 'quantity', 'trigger', 'bought_price', 'date_bought', 'client.networth', 'stocks.last_trade_price')
            ->join('client', 'shares_list.c_id', '=', 'client.c_id')
            ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
            ->where('shares_list.c_id', '=', $id)
            ->get();
        /* $sum=  Shares_list::all()->first()
             ->select('shares_list.c_id','shares_list.symbol','quantity','trigger','bought_price','date_bought','client.networth','stocks.last_trade_price')
             ->join('client', 'shares_list.c_id', '=', 'client.c_id')
             ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
             ->where('shares_list.c_id','=', 'sm709')
             ->sum('stocks.last_trade_price');
         $client1 = Client::where('c_id','sm709')->update(['networth'=>'$sum']);*/
        return \View::make('portfolio')->with('shares', $shares);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function networth()
    {
        $c = Shares_list::all(['c_id'])->first()
            ->select('shares_list.c_id', 'shares_list.symbol', 'quantity', 'trigger', 'bought_price', 'date_bought', 'client.networth', 'stocks.last_trade_price')
            ->join('client', 'shares_list.c_id', '=', 'client.c_id')
            ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
            ->where('shares_list.c_id', '=', 'sm709')
            ->get();
        $sum = Shares_list::all()->first()
            ->select('shares_list.c_id', 'shares_list.symbol', 'quantity', 'trigger', 'bought_price', 'date_bought', 'client.networth', 'stocks.last_trade_price')
            ->join('client', 'shares_list.c_id', '=', 'client.c_id')
            ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
            ->where('shares_list.c_id', '=', 'sm709')
            ->sum('stocks.last_trade_price');
        $count = Shares_list::all()->first()
            ->select('shares_list.c_id', 'shares_list.symbol', 'quantity', 'trigger', 'bought_price', 'date_bought', 'client.networth', 'stocks.last_trade_price')
            ->join('client', 'shares_list.c_id', '=', 'client.c_id')
            ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
            ->where('shares_list.c_id', '=', 'sm709')
            ->count();
        /* $sum = Stocks::all()->sum('last_trade_price');*/
        //$ins = Client::all()->first()->where('c_id','=', 'sm709')->update(['networth' => $sum]);
        $client1 = Client::where('c_id', 'sm709')->update(['networth' => '$sum']);
        return \View::make('portfolio')->with('count', $count);
    }

    /**
     * Remove the specified resource from storage.
     *s
     * @param  int $id
     * @return Response
     */
    public function buy()
    {
        $shares = Shares_list::all(['c_id'])->first()
            ->select('shares_list.c_id', 'shares_list.symbol', 'quantity', 'trigger', 'bought_price', 'date_bought', 'client.networth', 'stocks.last_trade_price')
            ->join('client', 'shares_list.c_id', '=', 'client.c_id')
            ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
            ->where('shares_list.c_id', '=', 'sm709')
            ->get();

        /*       $quantity = \Request::input('quantity');
               $price = \Request::input('last_trade_price');
               $symbol = \Request::input('symbol');*/

        $quantity = '5';
        $price = '100';
        $symbol = 'AUV';

        $final_price = $quantity * $price;

        $check_shares_list = Shares_list::all(['c_id'])->first()
            ->select('symbol', 'c_id', 'quantity', 'trigger', 'bought_price', 'date_bought')
            ->where('c_id', '=', 'sm709')
            ->where('symbol', '=', $symbol)
            ->get();

        $checking = $check_shares_list->toArray();

        $acc_balance = Account::all()->first()
            ->select('amount')
            ->where('account_no', '=', '345678987')
            ->get();

        $check_shares_list = array_filter($checking);
        if ($acc_balance[0]['amount'] < $final_price) {

            return \View::make('portfolio')->with('shares', $shares);
        }

        elseif (!empty($check_shares_list)) {
            \DB::update("update shares_list set quantity = quantity+ $quantity  where c_id = 'sm709' AND symbol='$symbol'");
            \DB::update("update account set amount = amount - $final_price  where account_no = '345678987'"); //dis works
            return \View::make('portfolio')->with('shares', $shares);
        } else {
            Shares_list::updateOrCreate(['symbol' => 'AUV', 'c_id' => 'sm709', 'quantity' => '5', 'trigger' => '10', 'bought_price' =>  '25.00' , 'date_bought' => '2015-04-04']);
            return \View::make('portfolio')->with('shares', $shares);
        }
    }
    /*        \DB::update("update shares_list set quantity = quantity+ $quantity  where c_id = 'sm709' AND symbol='$symbol'");
            \DB::update("update account set amount = amount - $final_price  where account_no = '345678987'"); //dis works
            return \View::make('portfolio')->with('shares',$shares);*/


    /*
                if (!empty($check_shares_list)) {*/


    // }


    /*$buy=  Shares_list::all()->first()
        ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
        ->join('client', 'shares_list.c_id', '=', 'client.c_id')
        ->join('account', 'client.account_no', '=', 'account.account_no')
        ->get();*/
    /*$buy=  Shares_list::all();
    $query1=Stock::all()->first()
        ->where('symbol','AUV');//multiple by no_shares to buy
    $query2=Client::all()->first()
        ->join('account', 'client.account_no', '=', 'account.account_no')
        ->where('c_id','sm709');//*/
    /*   if($query1->get('last_trade_price') < $query2->get('account.amount'))
       {*/
    /*        $update1 = Shares_list::updateOrCreate(['symbol' => 'AUV','c_id' => 'sm709','quantity'=> '5','trigger'=>'10','bought_price'=> '25.00','date_bought'=>'2015-04-04']);*/
    /*$update2 = $query2->update(['amount'=>'amount' -  '$query1'] );*/
    /* \DB::table('account')->where('account_no', '345678987')->update(array('amount' => 'amount' -  '$query1'));*/
    /*\DB::update("update Account set amount = amount - 10 where account_no = '345678987'");*/
    // }
    /*        return \View::make('index')->with('buy',$buy); */

}