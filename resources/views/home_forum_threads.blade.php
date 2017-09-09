<h5>View as:
    <strong>
        <select id="s_view">
            <option value="threads">Threads</option>
            <option value="tweets">Tweets</option>

        </select>
    </strong>
</h5>
<div class="tweets hide">

<div class="tab-content clearfix" >
    <hr>
    @foreach($forum_threads as $link)
        @if(isset($link->t_id) && $link->t_id!=null)
            <div class="row">  <!-- first post start -->
            <div class="container-fluid" style=" padding-left: 0px !important;">
                <div class="">

                    <div class="col-md-2 col-sm-2 col-xs-5 col-img">
                        <div class="user-profile">
                            <img class="profile-img img-responsive img-thumbnail" src=" {{($link->t_img)? config('app.url')."storage/profile_images/".$link->t_user_id.".".$link->t_img:asset('assets/img/user.png')}}">
                            <div class="profile-display hide">
                                  <a onclick="add_fav('{{$link->t_id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                  <h5 class="view-profile">View Profile</h5>
                             </div>                                                    
                        </div>
                        <div class="username">                    
                                <h4> <img src="{{asset('assets/img/crown.gif')}}" alt=""> <a href="#">{{$link->t_first_name.' '.$link->t_last_name}}</a></h4>
                                <h4 style="text-align:center;">{{$link->u_posts}} Posts</h4>
                        </div>
                    </div>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="row">
                            <div class="col-sm-8">
                                <p style="font-size: 14px;color: #3077b5 !important;"> <a href="{{route('home',$link->slug)}}">{{$link->slug}}</a> > <a href="{{route('home',$link->slug)}}/{{$link->t_id}}">{{$link->t_title}}</a> </p>
                            </div>
                            <div class="col-sm-4">
                                <p style="color: black !important" class="pull-right">{{$link->t_updated_at}}</p>
                            </div>

                        </div>


                        <div style="color: black !important" class="col-md-12 col-sm-12 comment-text">
                            {!! $link->t_text !!}

                        </div>

                        <hr>


                <div class="row" style="margin-top: 70px;">
                    <div class="panel-footer " style="border:none; padding:0; margin-left:15px;">
                     <!--    <p><button id="{{"btn41"}}{{$link->t_id}}" class="reply-btn btn btn-info pull-right">Reply</button></p> -->
                        <script>
                            $(document).ready(function(){
                                {{$time=(string)round(microtime(true) * 1000 + rand(1,900))}}
                                    $("{{'#'}}{{"btn41"}}{{$link->t_id}}{{$time}}").click(function(){
                                    $("{{'#41'}}{{$link->t_id}}{{$time}}").removeClass("hide");
                                    $("{{'#41'}}{{"btn-close"}}{{$link->t_id}}{{$time}}").removeClass("hide");
                                      $("{{'#41'}}{{"btn-close1"}}{{$link->t_id}}{{$time}}").addClass("hide");
                                    $("{{'#'}}{{"btn41"}}{{$link->t_id}}{{$time}}").addClass("hide");
                                      $("{{'#'}}{{"btn411"}}{{$link->t_id}}{{$time}}").removeClass("hide");
                                });

                                $("{{'#41'}}{{"btn-close"}}{{$link->t_id}}{{$time}}").click(function(){
                                    $("{{'#41'}}{{$link->t_id}}{{$time}}").addClass("hide");
                                    $("{{'#'}}{{"btn41"}}{{$link->t_id}}{{$time}}").removeClass("hide");
                                    {{--                                                                    $("{{'#'}}{{"btn"}}{{$thread->id}}").addClass("hide");--}}
                                });

                                $("{{'#'}}{{"btn411"}}{{$link->t_id}}{{$time}}").click(function(){
                                    $("{{'#41'}}{{$link->t_id}}{{$time}}").removeClass("hide");
                                    $("{{'#41'}}{{"btn-close"}}{{$link->t_id}}{{$time}}").addClass("hide");
                                      $("{{'#41'}}{{"btn-close1"}}{{$link->t_id}}{{$time}}").removeClass("hide");
                                    $("{{'#'}}{{"btn411"}}{{$link->t_id}}{{$time}}").addClass("hide");
                                     $("{{'#'}}{{"btn41"}}{{$link->t_id}}{{$time}}").removeClass("hide");
                                });

                                $("{{'#41'}}{{"btn-close1"}}{{$link->t_id}}{{$time}}").click(function(){
                                    $("{{'#41'}}{{$link->t_id}}{{$time}}").addClass("hide");
                                    $("{{'#'}}{{"btn411"}}{{$link->t_id}}{{$time}}").removeClass("hide");
                                    {{--                                                                    $("{{'#'}}{{"btn"}}{{$thread->id}}").addClass("hide");--}}
                                });

                            });
                        </script>
                        <div class="reply-box hide" id="41{{$link->t_id}}{{$time}}">

                            <form method="POST" action="{{route('posts.store')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="title" value="{{$link->d_title}}">
                                <input type="hidden" name="slug" value="{{$link->forum}}">
                                <div class="form-group">
                                    <div id="sample">
                                        <textarea id="summernote441{{$link->t_id}}{{$time}}" name="text"></textarea>
                                         <script>
                                            $(document).ready(function() {
                                                $("{{'#'}}{{"btn41"}}{{$link->t_id}}{{$time}}").click(function(){
                                                           
                                                        $('#summernote441{{$link->t_id}}{{$time}}').summernote('focus', '');
                                                         $('#summernote441{{$link->t_id}}{{$time}}').summernote('code', '');
                                                });
                                                 $("{{'#'}}{{"btn411"}}{{$link->t_id}}{{$time}}").click(function(){
                                                     {{--{{$link->t_text=str_replace('background:#bcd2ee;','background:white; color:white',$link->t_text)}}--}}
                                                     {{--{{$link->t_text=str_replace('border-color:#bcd2ee','border-color:white',$link->t_text)}}--}}
                                                     {{--{{$link->t_text=str_replace('border-color:#bcd2ee','border-color:white',$link->t_text)}}--}}
                                                    //$('#summernote441{{$link->t_id}}').summernote('code',$.parseHTML('<button type="button" disabled style="width:100%; font-weight:600; padding-left: 10px; border-top-right-radius:5px !important ; border-top-left-radius:5px !important; border:0; text-align:left;   padding-bottom:0; line-height: 20px; background:#bcd2ee; min-height:25px"  data-toggle="collapse" data-target="#demo441{{$link->t_id}}">{{'Quoted:'.$link->t_first_name.' '.$link->t_last_name}}</button>  <div id="demo441{{$link->t_id}}{{$time}}" class="collapse in" style="padding-top:0; padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border:solid;padding-left: 10px;  border-color:#bcd2ee; border-width:0px 3px 3px 3px;">  {!! $link->t_text !!} <br> <a style="padding-left:49%;cursor:pointer; background-color:white;" href="#demo441{{$link->t_id}}" data-toggle=""></a> </div>  <div> &nbsp </div>'));});
                                                    $('#summernote441{{$link->t_id}}{{$time}}').summernote('code',$.parseHTML('<button type="button"  style="width:100%; font-weight:600; padding-left: 10px; border-top-right-radius:5px !important ; border-top-left-radius:5px !important; border:0; text-align:left;   padding-bottom:0; line-height: 20px; background:#bcd2ee; min-height:25px"  data-toggle="collapse" data-target="#demo441{{$link->t_id}}">{{'Quoted:'.$link->t_first_name.' '.$link->t_last_name}}<i class="fa fa1 fa-chevron-down" aria-hidden="true"></i></button>  <div id="demo441{{$link->t_id}}{{$time}}" class="collapse in" style="padding-top:0; padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border:solid;padding-left: 10px;  border-color:#bcd2ee; border-width:0px 3px 3px 3px;">  {!! $link->t_text !!} <br> <a style="padding-left:49%;cursor:pointer; background-color:white;" href="#demo441{{$link->t_id}}{{$time}}" data-toggle="collapse"><i class="fa fa1 fa-chevron-up" aria-hidden="true"></i></a> </div>  <div> &nbsp </div>'));});
                                                    $('#summernote441{{$link->t_id}}{{$time}}').summernote('saveRange');
                                                    $('#summernote441{{$link->t_id}}{{$time}}').summernote('focus');

                                            })      
                                        </script>
                                    </div>
                                </div>
                                 <button id="41{{"btn-close"}}{{$link->t_id}}{{$time}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                 <button id="41{{"btn-close1"}}{{$link->t_id}}{{$time}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                <button type="submit" class="btn btn-info pull-right " style="">Send</button>
                            </form>
                        </div>
                    </div>

                    <br>


                    <div class="comment-box-bottom">
                        <ul>
                           <li class=""><a href="javascript:void(0);"  onclick="like('{{$link->t_id}}','thread')" ><i class="like like_h fa {{($link->like_id)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                             <div class="hide text-info" style=" display: inherit;">{{($link->like_id)?$link->c_like:$link->c_like-1}}</div>
                            </li>
                            <li id="{{"btn41"}}{{$link->t_id}}{{$time}}"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">
                                <div class=" hide text-info" style="">Reply</div>
                            </li>
                            <li id="{{"btn411"}}{{$link->t_id}}{{$time}}" class="text-info"><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
                                <div class=" hide" style="" >Qoute</div></li>
                            <li class="text-info  " style="margin-top: -10px;">  <span class="like_h"> ...</span>

                                <div class=" hide text-info" style="margin-top: 10px;">More</div></li>
                        </ul>
                    </div>
                    <br>
                </div>
                    </div>

                </div>

            </div>


            <div class="container-fluid">

                <div class="">
                    <div class="col-md-2 col-sm-2 col-xs-12 reply col-img"> </div>
   
                    <div class="col-md-8 col-sm-10 col-xs-12">

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="">



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        {{--<p class="pull-right">{{$link->t_updated_at}}</p>--}}
                    </div>
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12 reply col-img"> </div>
                
            </div>

        </div>
        @else
            {{--<div class="row">  <!-- first post start -->--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="">--}}

                        {{--<div class="col-md-2 col-sm-2 col-xs-5 col-img">--}}
                            {{--<div class="user-profile">--}}
                                {{--<img class="profile-img img-responsive" src=" {{($link->t_img)? config('app.url')."storage/profile_images/".$link->t_user_id.".".$link->t_img:asset('assets/img/user.png')}}">--}}
                                {{--<div class="profile-display hide">--}}
                                    {{--<a onclick="add_fav('{{$link->t_id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>--}}
                                    {{--<h5 class="view-profile">View Profile</h5>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                         {{--<div class="username">--}}
                                {{--<h4><img src="{{asset('assets/img/crown.png')}}"><a href="#"> {{$link->t_first_name.' '.$link->t_last_name}}</a></h4>--}}
                                {{--<h4>Total Posts</h4>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-10 col-sm-10 col-xs-12">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<p style="font-size: 14px;color: #337ab7 !important;"> <a href="{{route('home',$link->slug)}}">{{$link->slug}}</a> > <a href="{{route('home',$link->slug)}}/{{$link->t_id}}">{{$link->t_title}}</a> </p>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<p style="color: black !important" class="pull-right">{{$link->t_updated_at}}</p>--}}
                                {{--</div>--}}

                            {{--</div>--}}


                            {{--<div style="color: black !important" class="col-md-12 col-sm-12 comment-text">--}}
                                {{--{!! $link->t_text !!}--}}

                            {{--</div>--}}

                            {{--<hr>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                {{--</div>--}}


                {{--<div class="container-fluid">--}}

                    {{--<div class="">--}}
                        {{--<div class="col-md-2 col-sm-2 col-xs-12 reply col-img"> </div>--}}

                        {{--<div class="col-md-8 col-sm-10 col-xs-12">--}}

                            {{--<div class="row">--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="">--}}



                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-2">--}}
                            {{--<p class="pull-right">{{$link->t_updated_at}}</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-2 col-sm-2 col-xs-12 reply col-img"> </div>--}}
                    {{--<div class="col-md-10 col-sm-10 col-xs-12">--}}
                        {{--<div class="panel-footer " style="border:none; padding:0;">--}}
                        {{--<!--    <p><button id="{{"btn41"}}{{$link->t_id}}" class="reply-btn btn btn-info pull-right">Reply</button></p> -->--}}
                            {{--<script>--}}
                                {{--$(document).ready(function(){--}}

                                    {{--$("{{'#'}}{{"btn41"}}{{$link->t_id}}").click(function(){--}}
                                        {{--$("{{'#41'}}{{$link->t_id}}").removeClass("hide");--}}
                                        {{--$("{{'#41'}}{{"btn-close"}}{{$link->t_id}}").removeClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn41"}}{{$link->t_id}}").addClass("hide");--}}
                                    {{--});--}}

                                    {{--$("{{'#41'}}{{"btn-close"}}{{$link->t_id}}").click(function(){--}}
                                        {{--$("{{'#41'}}{{$link->t_id}}").addClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn41"}}{{$link->t_id}}").removeClass("hide");--}}
{{--                                                                                                            $("{{'#'}}{{"btn"}}{{$thread->id}}").addClass("hide");--}}
                                    {{--});--}}

                                {{--});--}}
                            {{--</script>--}}
                            {{--<div class="reply-box hide" id="41{{$link->t_id}}">--}}

                                {{--<form method="POST" action="{{route('posts.store')}}">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--<input type="hidden" name="thread_id" value="{{$link->thread_id}}">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<div id="sample">--}}
                                            {{--<textarea id="summernote441{{$link->t_id}}" name="text"></textarea>--}}
                                            {{--<script>--}}
                                                {{--$(document).ready(function() {--}}
                                                    {{--var quote = $('<blockquote class="quote">{{$link->t_text}}<footer>world</footer></blockquote>')[0];--}}
{{--//                                                $('.editor').summernote('insertNode', quote);--}}
                                                    {{--$("#summernote441{{$link->t_id}}",this).summernote();--}}
                                                    {{--$('#summernote441{{$link->t_id}}').summernote('focus');--}}
                                                {{--});--}}
                                            {{--</script>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<button id="41{{"btn-close"}}{{$link->t_id}}" type="button" class="reply-close hide btn btn-danger">close</button>--}}
                                    {{--<button type="submit" class="btn btn-info pull-right " style="">Send</button>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<br>--}}


                        {{--<div class="comment-box-bottom">--}}
                            {{--<ul>--}}
                                {{--<li class="like"><a href="javascript:void(0);"  onclick="like('{{$link->t_id}}','post')" ><i class="fa {{($link->like_id)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>--}}

                                    {{--<div style="color: #3c763d;display: inherit;">{{($link->like_id)?$link->c_like:$link->c_like-1}}</div>--}}
                                {{--</li>--}}
                                {{--<li id="{{"btn41"}}{{$link->t_id}}" class="reply-btn" ><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">--}}
                                    {{--<div class="text-info">Reply</div>--}}
                                {{--</li>--}}
                                {{--<li class="text-info"><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt=""></i>--}}
                                    {{--<div class="text-info" >Qoute</div></li>--}}
                                {{--<li class="text-info">  <span> ...</span>--}}

                                    {{--<div class="text-info" >More</div></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<br>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        @endif
        <hr>
    @endforeach

</div>
<hr>
</div>

<div class="row threads">
    {{--<h5>View as: <strong>Tweets</strong> </h5>--}}
    <div class="row tab-content clearfix" >
        <hr>
        <div class="row">  <!-- first post start -->
            <div  class="container-fluid" style="overflow:auto;">
                <table style="color: black !important; font-size: 13px !important; width: 99%; " class=" table-thread table-striped dt-responsive nowrap">
                    <tbody>
                    <tr>
                        <th >Forum</th>
                        <th >Syble</th>
                        <th >Subject</th>
                        <th >Poster</th>
                        <th >Views</th>
                        <th >Likes</th>
                        <th >Date</th>
                    </tr>
                   
                    
                    @foreach($forum_threads as $table)
                   <tr style="border: none !important;">
                       <td  class="text-nowrap"><a  href="{{route('home',$table->slug)}}">{{$table->slug}}</a></td>
                       <td  class="text-nowrap"></td>
                       <td  class="text-nowrap"><a href="{{route('home',$table->slug)}}/{{$table->t_id}}">Re:{{$table->t_title}}</a></td>
                       <td  class="text-nowrap"> <a href="#"> {{$table->t_first_name}}</a></td>
                       <td  class="text-nowrap"></td>
                       <td class="likes text-nowrap">{{($table->like_id)?$table->c_like:$table->c_like-1}}</td>
                       <td class="date text-nowrap">{{Carbon\Carbon::parse($table->t_updated_at)->toDateString()}}</td>
                   </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $( "#s_view" ).change(function() {
        $temp=$("#s_view").val();
        if($temp == 'tweets')
        {
            $(".threads").addClass('hide');
            $(".tweets").removeClass('hide');

        }
        else
        {
            $(".tweets").addClass('hide');
            $(".threads").removeClass('hide');
        }
        //alert($("#s_view").val());
    });
</script>

<script type="text/javascript">
    $('document').ready(function(){

        $(".like").click(function(){
            var $this   = $(this)
            var $temp=$($(this).parent().closest('li')).children()[1].innerHTML;
            $temp=parseInt($temp);

            if($this.hasClass('fa-heart')) {
                $this.css("color", "#31708f").addClass('fa-heart-o').removeClass('fa-heart');
                $temp--;
                $($(this).parent().closest('li')).children()[1].innerHTML=$temp.toString();

            }
            else
            {
                $this.css("color", "#31708f").removeClass('fa-heart-o').addClass('fa-heart');
                $temp++;
                $($(this).parent().closest('li')).children()[1].innerHTML=$temp.toString();

            }


        });
    });
    $(document).ready(function(){
        $(".like_h").hover(function(){
           // console.log( $($(this).parent().closest('li').children()[1]));
            $($($(this).parent().closest('li')).children()[1]).removeClass("hide");
        }, function(){
            $($($(this).parent().closest('li')).children()[1]).addClass("hide");
        });
    });
</script>