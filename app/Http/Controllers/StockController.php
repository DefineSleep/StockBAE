<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
class StockController extends Controller
{

    public function display_data()
    {
        $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
        /*$yql_query ="select * from yahoo.finance.quotes where symbol ='GOOG'";*/
        $yql_query = "select * from yahoo.finance.quotes where symbol in ('MSFT','AAPL','GOOG')";
        $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query) . "&env=store://datatables.org/alltableswithkeys";
        $yql_query_url .= "&format=json";
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($session);
        $phpObj = json_decode($json);
        $i = 0;
        $someArray = [];
        if (!is_null($phpObj->query->results)) {
            foreach ($phpObj->query->results as $quotes) {
                while ($i < count($quotes)) {
                    array_push($someArray, [
                        'symbol' => $quotes[$i]->Symbol,
                        'name' => $quotes[$i]->Name,
                        'change_percentage' => $quotes[$i]->Change_PercentChange,
                        'change_price' => $quotes[$i]->Change,
                        'days_high' => $quotes[$i]->DaysHigh,
                        'days_low' => $quotes[$i]->DaysLow,
						'change' => $quotes[$i]->Change,
                        'last_trade_price' => $quotes[$i]->LastTradePriceOnly,
                        'last_trade_time' => $quotes[$i]->LastTradeTime,
                        'last_trade_date' => $quotes[$i]->LastTradeDate,
                        'volume' => $quotes[$i]->Volume,
                        'stock_exchange' => $quotes[$i]->StockExchange,
                    ]);
                    $i++;
                }
            }
        }
        //return View('browsemarket')->with('test', $someArray);
        return \View::make('comp-pro')->with('someArray', $someArray);
        //return View::make('index');
    }
    public function getwiki($stkname){
//               var wiki="/w/api.php?action=query&prop=extracts&format=json&exchars=186&exintro=&explaintext=&exsectionformat=plain&titles="+stkname+"&redirects=&converttitles=";
    }
    public function search_stock()
    {
        $data = \Request::input('stockname');
        $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = "select * from yahoo.finance.quotes  where symbol in". "('" .$data . "')";
        $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query) . "&env=store://datatables.org/alltableswithkeys";
        $yql_query_url .= "&format=json";
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($session);
        $phpObj = json_decode($json);
        $i = 0;
        $someArray = [];
        if (!is_null($phpObj->query->results)) {
            foreach ($phpObj->query->results as $quote) {
                while ($i < count($quote)) {
                    array_push($someArray, [
                        'Symbol' => $quote->symbol,
                        'Name' => $quote->Name,
                        'Change' => $quote->Change,
                        'DaysLow' => $quote->DaysLow,
                        'DaysHigh' => $quote->DaysHigh,
                        'Ask' => $quote->Ask,
                        'Bid' => $quote->Bid,
                        'AverageDailyVolume ' => $quote->AverageDailyVolume ,
                        'Open' => $quote->Open,
                        'PreviousClose' => $quote->PreviousClose,
                        'OneyrTargetPrice' => $quote->OneyrTargetPrice,
                        'EarningsShare' => $quote->EarningsShare,
                        'DaysRange' => $quote->DaysRange,
                        'FiftydayMovingAverage' => $quote->FiftydayMovingAverage,
                        'AverageDailyVolume' => $quote->AverageDailyVolume,
                        'MarketCapitalization' => $quote->MarketCapitalization,
                        'LastTradeWithTime' => $quote->LastTradeWithTime,
                        'LastTradePriceOnly' => $quote->LastTradePriceOnly,
                        'Volume' => $quote->Volume,
                        'StockExchange' => $quote->StockExchange
                    ]);
                    $i++;
                }
            }
        }
        return \View::make('browsemarket/search')->with('someArray', $someArray);
    }
    public function stock_buy()
    {
        /*//insert into the stock database lke this
        $rc_user= new stocks;
        $rc_user->stock_id= 69;
        $rc_user->stock_name= "msft";
        $rc_user->stock_price= 420;
        $rc_user->no_of_stocks= 2;
        $rc_user->fa_id= 111;
        $rc_user->save();
        //insert into the purchase history database lke this
        $rc_user= new purchase_history;
        $rc_user->client_name= "clientdude";
        $rc_user->fa_name= "sonia santa";
        $rc_user->stock_name= "msft";
        $rc_user->date_brought= 2015-02-27;
        $rc_user->save();
        $rc_money=new Registered_Client;
        $rc_money->cash_balance;
        return view('buysell/buy_stock');*/
    }
}