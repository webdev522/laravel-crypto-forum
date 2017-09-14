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
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
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

    @yield('css')
    <style type="text/css">
        /* currency table page style */
        .table-currency > tbody > tr > td{
            font-size: 18px !important;
            vertical-align: middle !important;
        }
        .table-currency .img-name >img{
            width: 20px !important;
        }
        .table-currency .img-graph a {
            border: 1px solid #000 !important;
        }
        .table-currency .fa{
            font-size: 10px !important;
        }
        #sl a{
            text-decoration: none;
        }
        #sl a >span{
            color:#000 !important;
        }
        td >.img-graph >a >img{
            border: 1px solid #000 !important;
        }

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
        $(".quote").click(function(){
            var $this   = $(this)
            var temp=$(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box hide"]');
            if(temp.hasClass('hide')) {
                $(temp).removeClass('hide');
                var $temp = $($(this).closest('div[class="col-md-12"]').children('div[class="panel-footer"]').children('div[class="reply-box"]').children('form').children('div[class="form-group"]').children('div').children());
                if ($temp.next('.note-editor').length === 0) {
                    var first='<button type="button"  style="width:100%; font-weight:600; padding-left: 10px; border-top-right-radius:5px !important ; border-top-left-radius:5px !important; border:0; text-align:left;   padding-bottom:0; line-height: 20px; background:#bcd2ee; min-height:25px">Quoted<i class="fa fa1 fa-chevron-down" aria-hidden="true"></i></button>  <div style="padding-top:0; padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border:solid;padding-left: 10px;  border-color:#bcd2ee; border-width:0px 3px 3px 3px;">';
                    var second='<a style="padding-left:49%;cursor:pointer; background-color:white;"><i class="fa fa1 fa-chevron-up" aria-hidden="true"></i></a> </div>  <div> &nbsp </div>';
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
