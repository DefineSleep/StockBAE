<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <!-- highcharts js -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
    <script src="http://code.highcharts.com/stock/highstock.js"></script>
    <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>

    <!-- TODO: Add a favicon -->
    <link rel="shortcut icon" href="http://localhost/StockBAE/public/images/ico/fab.ico">

    <title>StockBAE - Company Profile</title>

    <!--Page loading plugin Start -->
    <link rel="stylesheet" href="http://localhost/StockBAE/public/css/plugins/pace.css">
    <script src="http://localhost/StockBAE/public/js/pace.min.js"></script>
    <!--Page loading plugin End   -->

    <!-- Plugin Css Put Here -->
    <link href="http://localhost/StockBAE/public/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://localhost/StockBAE/public/css/plugins/lightGallery.css">
    <!--[if gt IE 8]> <link href="http://localhost/StockBAE/public/css/ie/ie9-gallery.css" rel="stylesheet" type="text/css"> <!--![endif]-->

    <link href="http://localhost/StockBAE/public/css/plugins/shuffle.css" rel="stylesheet">

    <!-- Plugin Css End -->
    <!-- Custom styles Style -->
    <link href="http://localhost/StockBAE/public/css/style.css" rel="stylesheet">
    <!-- Custom styles Style End-->

    <!-- Responsive Style For-->
    <link href="http://localhost/StockBAE/public/css/responsive.css" rel="stylesheet">
    <!-- Responsive Style For-->

    <!-- Custom styles for this template -->
    <script src="http://localhost/StockBAE/public/js/lib/modernizr.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{-- Highcharts data--}}
    <script type="text/javascript">
        var quoteData = [];
        $(function() {
            var url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.historicaldata%20where%20symbol%20%3D%20%22YHOO%22%20and%20startDate%20%3D%20%222014-09-11%22%20and%20endDate%20%3D%20%222015-03-10%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=&";
            $.getJSON(url, function(data){
                $.each(data.query.results.quote, function(index, value) {
                    var theTime = value.Date;
                    var milliTime = new Date(theTime);
                    milliTime = milliTime.getTime();
                    var results = [milliTime, parseFloat(value.Low),parseFloat(value.High)];
                    quoteData.push(results);
                })
                createChart(quoteData);
            });
            //setTimeout("createChart()", 1000);
        });
        function createChart(data) {
            quoteData = quoteData.reverse();
            console.log('quoteData', quoteData);
            // Create the chart
            window.chart = new Highcharts.StockChart({
                chart : {
                    renderTo : 'stockgraph'
                },
                rangeSelector : {
                    selected : 1
                },
                title : {
                    text : 'Market Trends'
                },
                series : [{
                    name : 'AAPL',
                    data : data,
                    tooltip: {
                        valueDecimals: 2
                    }
                }]
            });
        }
    </script>
</head>
<body class="">
<!--Navigation Top Bar Start-->
<nav class="navigation">
    <div class="container-fluid">
        <!--Logo text start-->
        <div class="header-logo">
            <a href="info" title="">
                <h1>StockBae</h1>
            </a>
        </div>
        <!--Logo text End-->
        <div class="top-navigation">
            <!--Collapse navigation menu icon start -->
            <div class="menu-control hidden-xs">
                <a href="javascript:void(0)">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="search-box">
                <ul>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                            <span class="fa fa-search"></span>
                        </a>

                        <div class="dropdown-menu  top-dropDown-1">
                            <h4>Search</h4>

                            <form>
                                <input type="search" placeholder="what you want to see ?">
                            </form>
                        </div>

                    </li>
                </ul>
            </div>

            <!--Collapse navigation menu icon end -->
            <!--Top Navigation Start-->

            <ul>
                <li class="dropdown">
                    <!--All task drop down start-->

                    <div class="dropdown-menu right top-dropDown-1">
                        <h4>All Task</h4>
                        <ul class="goal-item">
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="goal-user-image">
                                        <img class="rounded"
                                             src="http://localhost/StockBAE/public/images/userimage/avatar3-80.png"
                                             alt="user image"/>
                                    </div>
                                    <div class="goal-content">
                                        Wordpress Theme
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar ls-light-blue-progress six-sec-ease-in-out"
                                                 aria-valuetransitiongoal="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="goal-user-image">
                                        <img class="rounded"
                                             src="http://localhost/StockBAE/public/images/userimage/avatar2-80.png"
                                             alt="user image"/>
                                    </div>
                                    <div class="goal-content">
                                        PSD Designe
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar ls-red-progress six-sec-ease-in-out"
                                                 aria-valuetransitiongoal="40"></div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="goal-user-image">
                                        <img class="rounded"
                                             src="http://localhost/StockBAE/public/images/userimage/avatar1-80.png"
                                             alt="user image"/>
                                    </div>
                                    <div class="goal-content">
                                        Wordpress PLugin
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar ls-light-green-progress six-sec-ease-in-out"
                                                 aria-valuetransitiongoal="60"></div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="only-link">
                                <a href="javascript:void(0)">View All</a>
                            </li>
                        </ul>
                    </div>
                    <!--All task drop down end-->
                </li>
                <li class="dropdown">
                    <!--Notification drop down start-->
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                        <span class="fa fa-bell-o"></span>
                        <span class="badge badge-red">6</span>
                    </a>

                    <div class="dropdown-menu right top-notification">
                        <h4>Notification</h4>
                        <ul class="ls-feed">
                            <li>
                                <a href="javascript:void(0)">
                                        <span class="label label-red">
                                            <i class="fa fa-check white"></i>
                                        </span>
                                    Sample Data
                                    <span class="date">Just now</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                        <span class="label label-light-green">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </span>
                                    Sample Data
                                    <span class="date">30 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                        <span class="label label-lightBlue">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                    Sample Data
                                    <span class="date">45 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                        <span class="label label-lightBlue">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    Sample Data
                                    <span class="date">50 min</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                        <span class="label label-red">
                                            <i class="fa fa-bell"></i>
                                        </span>
                                    Sample Data
                                    <span class="date">1 hr</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                        <span class="label label-blue">
                                            <i class="fa fa-briefcase"></i>
                                        </span>
                                    Sample Data
                                    <span class="lightGreen"></span>
                                    <span class="date">5 hrs</span>
                                </a>
                            </li>
                            <li class="only-link">
                                <a href="javascript:void(0)">View All</a>
                            </li>
                        </ul>
                    </div>
                    <!--Notification drop down end-->
                </li>
                <li class="dropdown">
                    <!--Email drop down start-->
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                        <span class="fa fa-envelope-o"></span>
                        <span class="badge badge-red">3</span>
                    </a>

                    <div class="dropdown-menu right email-notification">
                        <h4>Email</h4>
                        <ul class="email-top">
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="email-top-content">
                                        John Doe
                                        <div>Sample Mail 1</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="email-top-content">
                                        John Doe
                                        <div>Sample Mail 2</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="email-top-content">
                                        John Doe
                                        <div> Sample Mail 4</div>
                                    </div>
                                </a>
                            </li>
                            <li class="only-link">
                                <a href="mail.html">View All</a>
                            </li>
                        </ul>
                    </div>
                    <!--Email drop down end-->
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-power-off"></i>
                    </a>
                </li>

            </ul>
            <!--Top Navigation End-->
        </div>
    </div>
</nav>
<!--Navigation Top Bar End-->
<section id="main-container">


    <section id="left-navigation">
        <!--Left navigation user details start-->
        <div class="user-image">
            <img src="http://localhost/StockBAE/public/images/userimage/avatar2-80.png" alt=""/>

        </div>

        <!--Left navigation user details end-->

        <!--Phone Navigation Menu icon start-->
        <div class="phone-nav-box visible-xs">
            <a class="phone-logo" href="profile.html" title="">
                <h1>StockBae</h1>
            </a>

            <div class="clearfix"></div>
        </div>
        <!--Phone Navigation Menu icon start-->

        <!--Left navigation start-->
        <ul class="mainNav">
            <li>
                <a href="profile">
                    <i class="fa fa-dashboard"></i> <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="portfolio">
                    <i class="fa fa-dashboard"></i> <span>Client Portfolio</span>
                </a>
            </li>
            <li>
                <a href="calendar">
                    <i class="fa fa-dashboard"></i> <span>Calender</span>
                </a>
            </li>
            <li>
                <a href="fa">
                    <i class="fa fa-dashboard"></i> <span>Financial Advisors</span>
                </a>
            </li>
            <li>
                <a href="client">
                    <i class="fa fa-dashboard"></i> <span>Clients</span>
                </a>
            </li>
        </ul>
        <!--Left navigation end-->
    </section>

    <!--Left navigation section end-->


    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header">Company Profile</h3>
                        <!--Top header end -->

                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-home"></i></a></li>
                            <li><a href="#">Company Profile</a></li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <div class="col-md-12">
                    <div class="row filter">
                        <div class="col-md-12 ls-gallery-paddingless-wrap">
                            <div class="row ls-gallery-filter-wrap">
                                <div class="col-md-6 ls-gallery-paddingless-wrap">
                                    <!-- ls Gallery Filter wrapper Start-->

                                    <!-- ls Gallery Filter wrapper Finished-->
                                </div>
                                <div class="col-md-6 ls-gallery-paddingless-wrap">
                                    <!-- ls Gallery Search And Sort wrapper Start-->
                                    <div class="ls-gallery-search">
                                        <input class="filter__search js-shuffle-search" type="search"
                                               placeholder="Search Item.."/>
                                        <!-- Sort Start -->

                                        <!-- Sort Finish -->
                                    </div>

                                </div>

                                {{--<a id="modal-67078" href="#modal-container-67078" role="button" class="btn"
                                   data-toggle="modal">Launch demo modal</a>--}}

                                <div class="modal fade" id="modal-container-67078" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    Buy Shares for Apple(AAPL) - $99.00
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <label class="control-label">Account Balance </label><br>
                                                <p style="text-align: right">
                                                    $100000
                                                </p>

                                                <div class="form-control">
                                                    {{--<div class="input-group">--}}
                                                            {{--<div class="input-group-addon">Account Balance</div>
                                                            <input type="text" class="form-control" id="cur_bal" value="2342093" disabled>--}}
                                                    <div class="input-group">
                                                        <label class="control-label">Enter Amount </label>
                                                        <input placeholder="200000" class="form-control" value="" type="text"
                                                               name="no_shares" id="no_shares"/>
                                                    </div>

                                                    {{--</div>--}}
                                                   {{-- <div class="input-group">
                                                        <div class="input-group-addon">Enter Amount</div>
                                                        <input type="text" class="form-control" id="cur_bal" value="2342093" disabled>
                                                    </div>--}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="buy-share-button">

                                    <a id="modal-67078" href="#modal-container-67078" role="button"
                                       class="btn ls-light-green-btn"
                                       data-toggle="modal">Buy Shares</a>
                                    <a id="modal-67078" href="#modal-container-67078" role="button"
                                       class="btn btn-warning"
                                       data-toggle="modal">Sell Shares</a>
                                    <!--<button id="Sell Shares" type="button" class="btn ls-red-btn">Destroy</button>-->
                                </div>

                                <br><br>


                                <!-- imgbit -->

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="graph-img">
                                            {{--<img src="http://localhost/StockBAE/public/images/chart.png" alt=""/>--}}
                                            <div id="stockgraph" style="height: 400px; min-width: 310px"></div>
                                        </div>
                                    </div>
                                    @for($i = 0; $i<count($someArray);$i++)
                                        @if($someArray[$i]['symbol']== "AAPL")
                                            <div class="col-md-3">
                                                <table class="table">
                                                    <tr>
                                                        <td>Symbol</td>
                                                        <td>{{ $someArray[$i]['symbol'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Name</td>
                                                        <td>{{ $someArray[$i]['name'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Last Trade Price</td>
                                                        <td>{{ $someArray[$i]['last_trade_price'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Last Trade Date</td>
                                                        <td>{{ $someArray[$i]['last_trade_date'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Last Trade Time</td>
                                                        <td>{{ $someArray[$i]['last_trade_time'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>

                                                </table>
                                            </div>

                                            <div class="col-md-3">
                                                <table class="table">
                                                    <tr>
                                                        <td>Change Price</td>
                                                        <td> {{ $someArray[$i]['change']}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Change Percentage</td>
                                                        <td>{{ $someArray[$i]['change_percentage'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Days High</td>
                                                        <td>  {{ $someArray[$i]['days_high'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Days Low</td>
                                                        <td> {{ $someArray[$i]['days_low'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Volume</td>
                                                        <td>  {{ $someArray[$i]['volume'] }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Stock Exchange</td>
                                                        <td>    {{ $someArray[$i]['stock_exchange'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>

                                                </table>
                                            </div>

                                            <div class="col-md-1"></div>

                                            @endif
                                            @endfor
                                                    <!-- imgbit end -->

                                            <br><br>


                                            <div class="ls-user-info col-md-6 col-sm-7">
                                                <div class="ls-user-text">

                                                    <p>Apple Inc. is an American multinational corporation headquartered in
                                                        Cupertino, California, that designs, develops, and sells consumer
                                                        electronics, computer software, online services, and personal
                                                        computers.</p>

                                                </div>
                                            </div>
                                </div>
                            </div>

                        </div>
                        <!-- Main Content Element  End-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page main section end -->
    <!--Right hidden  section start-->
    <section id="right-wrapper">
        <!--Right hidden  section close icon start-->
        <div class="close-right-wrapper">
            <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
        </div>
        <!--Right hidden  section close icon end-->

        <!--Tab navigation start-->
        <ul class="nav nav-tabs" id="setting-tab">
            <li class="active"><a href="#chatTab" data-toggle="tab"><i class="fa fa-comment-o"></i> Chat</a></li>
            <li><a href="#settingTab" data-toggle="tab"><i class="fa fa-cogs"></i> Setting</a></li>
        </ul>
        <!--Tab navigation end -->
    </section>
    <!--Right hidden  section end -->

</section>

<!--Layout Script start -->
<script type="text/javascript" src="http://localhost/StockBAE/public/js/color.js"></script>
<script type="text/javascript" src="http://localhost/StockBAE/public/js/lib/jquery-1.11.min.js"></script>
<script type="text/javascript" src="http://localhost/StockBAE/public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost/StockBAE/public/js/multipleAccordion.js"></script>

<!--easing Library Script Start -->
<script src="http://localhost/StockBAE/public/js/lib/jquery.easing.js"></script>
<!--easing Library Script End -->

<!--Nano Scroll Script Start -->
<script src="http://localhost/StockBAE/public/js/jquery.nanoscroller.min.js"></script>
<!--Nano Scroll Script End -->

<!--switchery Script Start -->
<script src="http://localhost/StockBAE/public/js/switchery.min.js"></script>
<!--switchery Script End -->

<!--bootstrap switch Button Script Start-->
<script src="http://localhost/StockBAE/public/js/bootstrap-switch.js"></script>
<!--bootstrap switch Button Script End-->

<!--easypie Library Script Start -->
<script src="http://localhost/StockBAE/public/js/jquery.easypiechart.min.js"></script>
<!--easypie Library Script Start -->

<!--bootstrap-progressbar Library script Start-->
<script src="http://localhost/StockBAE/public/js/bootstrap-progressbar.min.js"></script>
<!--bootstrap-progressbar Library script End-->

<script type="text/javascript" src="http://localhost/StockBAE/public/js/pages/layout.js"></script>
<!--Layout Script End -->

<!--Gallery Plugin Start-->
<!-- Shuffle! -->
<script type="text/javascript" src="http://localhost/StockBAE/public/js/gallery/shuffle.js"></script>
<!-- Syntax highlighting via Prism -->
<script type="text/javascript" src="http://localhost/StockBAE/public/js/gallery/prism.js"></script>
<script>var site_url = "fickle-2.html";</script>
<script type="text/javascript" src="http://localhost/StockBAE/public/js/gallery/page.js"></script>
<script type="text/javascript" src="http://localhost/StockBAE/public/js/gallery/evenheights.js"></script>
<!--Gallery Plugin Finish-->
<script type="text/javascript" src="http://localhost/StockBAE/public/js/lightGallery.js"></script>
<!-- Gallery Js Call Start -->
<script type="text/javascript" src="http://localhost/StockBAE/public/js/pages/demo.gallery.js"></script>
<!-- Gallery Js Finish -->



</body>

</html>s