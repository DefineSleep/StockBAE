<?php namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shares_list;
use App\Stocks;
use Illuminate\Http\Request;

class SharesListController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$shares = Shares_list::all();
		return \View::make('stocktable')->with('shares',$shares);
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
	public function investments()
	{
        //
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function networth()
	{
        $c  = Shares_list::all(['c_id'])->first()
            ->select('shares_list.c_id','shares_list.symbol','quantity','trigger','bought_price','date_bought','client.networth','stocks.last_trade_price')
            ->join('client', 'shares_list.c_id', '=', 'client.c_id')
            ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
            ->where('shares_list.c_id','=', 'sm709')
            ->get();

        $sum=  Shares_list::all()->first()
            ->select('shares_list.c_id','shares_list.symbol','quantity','trigger','bought_price','date_bought','client.networth','stocks.last_trade_price')
            ->join('client', 'shares_list.c_id', '=', 'client.c_id')
            ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
            ->where('shares_list.c_id','=', 'sm709')
            ->sum('stocks.last_trade_price');

        $count=  Shares_list::all()->first()
            ->select('shares_list.c_id','shares_list.symbol','quantity','trigger','bought_price','date_bought','client.networth','stocks.last_trade_price')
            ->join('client', 'shares_list.c_id', '=', 'client.c_id')
            ->join('stocks', 'shares_list.symbol', '=', 'stocks.symbol')
            ->where('shares_list.c_id','=', 'sm709')
            ->count();

        $portfolio_data = array(
            'count'  => $count,
            'sum'   => $sum
        );
       /* $sum = Stocks::all()->sum('last_trade_price');*/
        //$ins = Client::all()->first()->where('c_id','=', 'sm709')->update(['networth' => $sum]);
        return \View::make('portfolio')->with('portfolio_data',$portfolio_data);
       // return \View::make('portfolio')->with('count',$count);
	}

	/**
	 * Remove the specified resource from storage.
	 *s
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
