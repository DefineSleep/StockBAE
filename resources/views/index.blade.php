@for($i = 0; $i<count($shares);$i++)

    <p>{{ $shares[$i]}}<p>

 {{--   <p>{{ $someArray[$i]['symbol'] }}
        {{ $someArray[$i]['name'] }}
        {{ $someArray[$i]['change_percentage'] }}
        {{ $someArray[$i]['change']}}
        {{ $someArray[$i]['days_high'] }}
        {{ $someArray[$i]['days_low'] }}
        {{ $someArray[$i]['last_trade_price'] }}
        {{ $someArray[$i]['last_trade_time'] }}
        {{ $someArray[$i]['last_trade_date'] }}
        {{ $someArray[$i]['volume'] }}
        {{ $someArray[$i]['stock_exchange'] }}
    <p>--}}

@endfor