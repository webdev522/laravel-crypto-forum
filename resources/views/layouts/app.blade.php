<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{config('app.url')."assets/font-awesome/css/font-awesome.min.css"}}">
    <link rel="stylesheet" href="{{config('app.url')."assets/css/custom.css"}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    {{--Scripts--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script src="{{config('app.url')."/assets/js/closeReply.js"}}"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{config('app.url')}}assets/amcharts/style.css"	type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">

    <script src="{{config('app.url')}}assets/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="{{config('app.url')}}assets/amcharts/serial.js" type="text/javascript"></script>
    <script src="{{config('app.url')}}assets/amcharts/amstock.js" type="text/javascript"></script>

    <!-- theme files. you only need to include the theme you use.
         feel free to modify themes and create your own themes -->
    <script src="{{config('app.url')}}assets/amcharts/themes/light.js" type="text/javascript"></script>
    <script src="{{config('app.url')}}assets/amcharts/themes/dark.js" type="text/javascript"></script>
    <script src="{{config('app.url')}}assets/amcharts/themes/black.js" type="text/javascript"></script>
    <script src="{{config('app.url')}}assets/amcharts/themes/chalk.js" type="text/javascript"></script>
    <script src="{{config('app.url')}}assets/amcharts/themes/patterns.js" type="text/javascript"></script>

        @if(isset($stats) && isset($forum_threads))
        <script>
    var chartData = generateChartData();

    function generateChartData() {
    var chartData = [];
    var firstDate = new Date( 2012, 0, 1 );
    firstDate.setDate( firstDate.getDate() - 1000 );
    firstDate.setHours( 0, 0, 0, 0 );

    // 1 hour in milliseconds
                @foreach($stats as $stat)
               chartData.push( {
                    "date":'{{$stat->created_at}}',
                    "value": '{{$stat->last}}',
                    "volume":'{{$stat->baseVolume}}'
                } );

                @endforeach
    return chartData;
    }

    var chart = AmCharts.makeChart( "chartdiv", {

    "type": "stock",
    "theme": "light",

    "categoryAxesSettings": {
    "minPeriod": "fff", // set minimum to milliseconds
    "groupToPeriods": [ 'fff', 'ss' ] // specify period grouping
    },

    "dataSets": [ {
    "color": "#38587d",
    "fieldMappings": [ {
    "fromField": "value",
    "toField": "value"
    }, {
    "fromField": "volume",
    "toField": "volume"
    } ],

    "dataProvider": chartData,
    "categoryField": "date"
    } ],


    "panels": [ {
    "showCategoryAxis": false,
    "title": "Value",
    "percentHeight": 70,

    "stockGraphs": [ {
    "id": "g1",
    "valueField": "value",
    "type": "smoothedLine",
    "lineThickness": 2,
    "bullet": "round"
    } ],


    "stockLegend": {
    "valueTextRegular": " ",
    "markerType": "none"
    }
    },

    {
    "title": "Volume",
    "percentHeight": 30,
    "stockGraphs": [ {
    "valueField": "volume",
    "type": "column",
    "cornerRadiusTop": 2,
    "fillAlphas": 1
    } ],

    "stockLegend": {
    "valueTextRegular": " ",
    "markerType": "none"
    }
    }
    ],

    "chartScrollbarSettings": {
    "graph": "g1",
    "usePeriod": "fff",
    "position": "left"
    },

    "chartCursorSettings": {
    "valueBalloonsEnabled": true,
    "categoryBalloonDateFormats": [ {
    "period": "ss",
    "format": "NN:SS"
    }, {
    "period": "fff",
    "format": "NN:SS:QQQ"
    } ]
    },

        "periodSelector": {
            "position": "right",
            "hideOutOfScopePeriods": false,
            "inputFieldsEnabled": false,
            "dateFormat": "DD:MM:YYYY", // date format with milliseconds
            "inputFieldWidth": 150,
            "width":70,
            "periods": [{
                "period": "mm",
                "count": 10,
                "label": "10 minute"
            }, {
                "period": "hh",
                "count": 4,
                "label": "4 hour"
            },
                {
                    "period": "DD",
                    "count": 1,
                    "label": "1 Day"
                }, {
                    "period": "MM",
                    "count": 1,
                    "label": "1 Month"
                }, {
                    "period": "YY",
                    "count": 1,
                    "label": "1 Year"
                },
                {
                "period": "MAX",
                "label": "MAX"
            } ]
        },

    "panelsSettings": {
    "usePrefixes": true
    }
    } );
    </script>
        @elseif(isset($stats))
        <script>
            var chart = AmCharts.makeChart( "chartdiv", {
                "type": "serial",
                "theme": "light",
                "dataDateFormat":"YYYY-MM-DD",
                "valueAxes": [ {
                    "position": "left"
                } ],
                "graphs": [ {
                    "id": "g1",
                    "balloonText": "Open:<b>[[open]]</b><br>Low:<b>[[low]]</b><br>High:<b>[[high]]</b><br>Close:<b>[[close]]</b><br>",
                    "closeField": "close",
                    "fillColors": "#7f8da9",
                    "highField": "high",
                    "lineColor": "#7f8da9",
                    "lineAlpha": 1,
                    "lowField": "low",
                    "fillAlphas": 0.9,
                    "negativeFillColors": "#db4c3c",
                    "negativeLineColor": "#db4c3c",
                    "openField": "open",
                    "title": "Price:",
                    "type": "candlestick",
                    "valueField": "close"
                } ],
                "chartScrollbar": {
                    "graph": "g1",
                    "graphType": "line",
                    "scrollbarHeight": 30
                },
                "chartCursor": {
                    "valueLineEnabled": true,
                    "valueLineBalloonEnabled": true
                },
                "categoryField": "date",
                "categoryAxis": {
                    "parseDates": true
                },
                "dataProvider": [
                        @foreach($stats as $stat)
                    {
                    "date": "{{Carbon\Carbon::parse($stat->created_at)->toDateString()}}",
                    "open": "{{$stat->last}}",
                    "high": "{{$stat->lowestAsk}}",
                    "low": "{{$stat->highestBid}}",
                    "close": "{{$stat->low24hr}}"
                },
                @endforeach
                ],

                "export": {
                    "enabled": true,
                    "position": "bottom-right"
                }
            } );

            chart.addListener( "rendered", zoomChart );
            zoomChart();

            // this method is called when chart is first inited as we listen for "dataUpdated" event
            function zoomChart() {
                // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
                chart.zoomToIndexes( chart.dataProvider.length - 10, chart.dataProvider.length - 1 );
            }
        </script>

        @endif
    @yield('css')
    <style type="text/css">


    </style>
	<script>
        $(document).ready(function () {
            $('#bit_coin').click(function () {
                $('.main2').addClass('hide');
                $('.bit_coin').removeClass('hide');
            });
        });

        function add_fav(id) {
            $.ajax({
                type: "POST",
                url: '{{route('follow')}}',
                data: {id: id,"_token": "{{ csrf_token() }}"},
                success: function( msg ) {

                }
            });

        }

    </script>

</head>
<body>
<script>
    function like(id,type)
    {

        $.ajax({
            method: 'get',
            url: '{{route('like_ajax')}}',
            data: {
                id: id,
                type:type
            },

            success: function(books){
                //toastr.success('liked successfully');
                //location.reload();
            },
            error: function (error) {
                //toastr.error('Error while liking');
            }
        });

    }
</script>
    @include('shared.nav')
    @yield('content')
    @yield('javascript')
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script type="text/javascript">
    $('document').ready(function(){
        $(".reply").click(function(){
            var $this   = $(this)
            var temp=$(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box hide"]');
            if(temp.hasClass('hide')) {
                $(temp).removeClass('hide');
                var $temp = $($(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box"]').children('form').children('div[class="form-group"]').children('div').children());
                if ($temp.next('.note-editor').length === 0) {
                    $temp.summernote('destroy');
                    $temp.summernote('code','');
                }
                else
                {
                    $temp.summernote('destroy');
                    $temp.summernote();

                }
                var $temp = $($(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box"]').children('form').children('button[class="reply-close hide btn btn-danger"]').removeClass('hide'));
            }
        });
        $(".reply-close").click(function(){
            var temp=$(this).parentsUntil('div[class="form-group"]').children('form').children('div[class="form-group"]').children('div').children('textarea');
           // $("temp").val('');
           // console.log(temp);
            $(temp).summernote('destroy');

            var $this   = $(this).closest('div[class="reply-box"]').addClass('hide');
        });
        $(document).on('click', '.colout', function(event){
             console.log($(this));


        });
        $(document).on('click', '.colin', function(event){
             console.log($(this));


        });
        $(".quote").click(function(){
            var $this   = $(this)
            var temp=$(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box hide"]');
            if(temp.hasClass('hide')) {
                $(temp).removeClass('hide');
                var $temp = $($(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box"]').children('form').children('div[class="form-group"]').children('div').children());
                if ($temp.next('.note-editor').length === 0) {
                    var first='<button type="button"  class="colout"  style="width:100%; font-weight:600; padding-left: 10px; border-top-right-radius:5px !important ; border-top-left-radius:5px !important; border:0; text-align:left;   padding-bottom:0; line-height: 20px; background:#bcd2ee; min-height:25px">Quoted<i class="fa fa1 fa-chevron-down" aria-hidden="true"></i></button>  <div style="padding-top:0; padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border:solid;padding-left: 10px;  border-color:#bcd2ee; border-width:0px 3px 3px 3px;">';
                    var second='<a class="colin" style="padding-left:49%;cursor:pointer; background-color:white;"><i class="fa fa1 fa-chevron-up" aria-hidden="true"></i></a> </div>  <div> &nbsp </div>';
                    var markupStr = $(this).parentsUntil('div[class="col-md-10 col-sm-10 col-xs-12"]').closest('div[class="col-md-10 col-sm-10 col-xs-12"]').children('div[class="col-md-12 col-sm-12 comment-text"]').html();
                    var final=first+markupStr+second;
                    //console.log(markupStr);
                    $temp.summernote('code',final);
                }
//                var $temp = $($(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box"]').children('form').children('div[class="form-group"]').children('div').children().summernote());
                var $temp = $($(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box"]').children('form').children('button[class="reply-close hide btn btn-danger"]').removeClass('hide'));
            }
        });

    });


</script>


</body>
</html>
