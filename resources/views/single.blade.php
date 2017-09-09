<div class="tab-content clearfix" >
    <h5>View as: <strong>Thread</strong> </h5>
    <hr>

        {{--<div class="row">  <!-- first post start -->--}}
            {{--<div class="container-fluid">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-2 col-sm-2 col-xs-5 col-img">--}}
                        {{--<div class="user-profile">--}}
                            {{--<img class="profile-img img-responsive img-thumbnail" src=" {{($thread->user->img)? config('app.url')."storage/profile_images/".$thread->user_id.".".$thread->user->img:asset('assets/img/user.png')}}">--}}
                            {{--<div class="profile-display hide">--}}
                                {{--<a onclick="add_fav('{{$thread->user_id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>--}}
                                {{--<h5 class="view-profile">View Profile</h5>--}}
                            {{--</div>                          --}}
                        {{--</div>--}}

                        {{--<div class="username">                    --}}
                                {{--<h4> <img src="{{asset('assets/img/crown.gif')}}" alt=""> <a href="#">{{$thread->user->first_name." ".$thread->user->last_name}}</a></h4>--}}
                                {{--<h4 style="text-align:center;">{{$thread->user->u_posts." Posts"}}</h4>--}}
                            {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-10 col-sm-10 col-xs-12">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<!-- <p style="font-size: 14px;color: #337ab7 !important;"> <a href="">Coin</a> > <a href="">BCT</a> > <a href="">BCT Charts Only</a> </p> -->--}}
                            {{--<p style="font-size: 14px;color: #337ab7 !important;"> <a href="{{route('home',$thread->slug)}}">{{$thread->slug}}</a> >  <a href="{{route('home',$thread->slug)}}/{{$thread->id}}">{{$thread->title}}</a> </p>--}}
                                {{----}}
                            {{--</div>--}}
                            {{--<div class="col-sm-4">--}}
                                {{--<p class="pull-right">{{$thread->updated_at}}</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-12 col-sm-12 comment-text">--}}
                            {{--{!! $thread->text !!}--}}

                        {{--</div>--}}


                        {{--<div class="col-md-12 col-sm-10 col-xs-12" style="margin-top: 70px;">--}}
                             {{--<div class="panel-footer " style="border:none; padding:0;">    --}}
                                {{--<script>--}}
                                    {{--$(document).ready(function(){--}}

                                        {{--$("{{'#'}}{{"btn61"}}{{$thread->id}}").click(function(){--}}
                                            {{--$("{{'#61'}}{{$thread->id}}").removeClass("hide");--}}
                                            {{--$("{{'#61'}}{{"btn-close"}}{{$thread->id}}").removeClass("hide");--}}
                                              {{--$("{{'#61'}}{{"btn-close1"}}{{$thread->id}}").addClass("hide");--}}
                                            {{--$("{{'#'}}{{"btn61"}}{{$thread->id}}").addClass("hide");--}}
                                              {{--$("{{'#'}}{{"btn611"}}{{$thread->id}}").removeClass("hide");--}}
                                        {{--});--}}

                                        {{--$("{{'#61'}}{{"btn-close"}}{{$thread->id}}").click(function(){--}}
                                            {{--$("{{'#61'}}{{$thread->id}}").addClass("hide");--}}
                                           {{--$("{{'#'}}{{"btn61"}}{{$thread->id}}").removeClass("hide");--}}
                                        {{--});--}}

                                        {{--$("{{'#'}}{{"btn611"}}{{$thread->id}}").click(function(){--}}
                                            {{--$("{{'#61'}}{{$thread->id}}").removeClass("hide");--}}
                                            {{--$("{{'#61'}}{{"btn-close"}}{{$thread->id}}").addClass("hide");--}}
                                              {{--$("{{'#61'}}{{"btn-close1"}}{{$thread->id}}").removeClass("hide");--}}
                                            {{--$("{{'#'}}{{"btn611"}}{{$thread->id}}").addClass("hide");--}}
                                             {{--$("{{'#'}}{{"btn61"}}{{$thread->id}}").removeClass("hide");--}}
                                        {{--});--}}

                                        {{--$("{{'#61'}}{{"btn-close1"}}{{$thread->id}}").click(function(){--}}
                                            {{--$("{{'#61'}}{{$thread->id}}").addClass("hide");--}}
                                            {{--$("{{'#'}}{{"btn611"}}{{$thread->id}}").removeClass("hide");--}}
                                        {{--});--}}

                                    {{--});--}}
                                {{--</script>--}}
                                {{--<div class="reply-box hide" id="61{{$thread->id}}">--}}

                                    {{--<form method="POST" action="{{route('posts.store')}}">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" name="thread_id" value="{{$thread->id}}">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<div id="sample">--}}
                                                {{--<textarea id="summernote61{{$thread->id}}" name="text"></textarea>--}}
                                                 {{--<script>--}}
                                                    {{--$(document).ready(function() {--}}
                                                        {{--$("{{'#'}}{{"btn61"}}{{$thread->id}}").click(function(){--}}
                                                                   {{----}}
                                                                {{--$('#summernote61{{$thread->id}}').summernote('focus', '');--}}
                                                                 {{--$('#summernote61{{$thread->id}}').summernote('code', '');--}}
                                                        {{--});--}}
                                                         {{--$("{{'#'}}{{"btn611"}}{{$thread->id}}").click(function(){--}}

                                                            {{--$('#summernote61{{$thread->id}}').summernote('code',$.parseHTML('<button type="button" disabled style="width:100%; font-weight:600; padding-left: 10px; border-top-right-radius:5px !important ; border-top-left-radius:5px !important; border:0; text-align:left;   padding-bottom:0; line-height: 20px; background:#bcd2ee; min-height:25px"  data-toggle="collapse" data-target="#demo461{{$thread->id}}{{(string)round(microtime(true) * 1000)}}">{{'Quoted:'.$thread->user->first_name." ".$thread->user->last_name}} <i class="fa fa1 fa-chevron-down" aria-hidden="true"></i></button>  <div id="demo461{{$thread->id}}{{(string)round(microtime(true) * 1000)}}" class="collapse in" style="padding-top:0; padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border:solid;padding-left: 10px;  border-color:#bcd2ee; border-width:0px 3px 3px 3px;">  {!! $thread->text !!} <br> <a style="padding-left:49%;cursor:pointer; background-color:white;" href="#demo611{{$thread->id}}{{(string)round(microtime(true) * 1000)}}" data-toggle=""></a> <i class="fa fa1 fa-chevron-up" aria-hidden="true"></i></div>  <div> &nbsp </div>'));});--}}
                                                            {{--$('#summernote61{{$thread->id}}').summernote('saveRange');--}}
                                                            {{--$('#summernote61{{$thread->id}}').summernote('focus');--}}

                                                    {{--})      --}}
                                                {{--</script>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                         {{--<button id="61{{"btn-close"}}{{$thread->id}}" type="button" class="reply-close hide btn btn-danger">close</button>--}}
                                         {{--<button id="61{{"btn-close1"}}{{$thread->id}}" type="button" class="reply-close hide btn btn-danger">close</button>--}}
                                        {{--<button type="submit" class="btn btn-info pull-right " style="">Send</button>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<br>--}}

                {{--<div class="comment-box-bottom">--}}
                        {{--<ul>--}}
                           {{--<li><a href="javascript:void(0);"  onclick="like('{{$thread->id}}','thread')"><i class="like like_h fa {{($thread->like_id)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>--}}

                             {{--<div class="hide" style="color:#31708f !important; display: inherit;">{{($thread->like_id)?$thread->c_like:$thread->c_like-1}}</div>--}}
                            {{--</li>--}}
                            {{--<li id="{{"btn61"}}{{$thread->id}}"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">--}}
                                {{--<div class=" hide" style="color:#31708f !important;">Reply</div>--}}
                            {{--</li>--}}
                            {{--<li id="{{"btn611"}}{{$thread->id}}" class="text-info"><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">--}}
                                {{--<div class=" hide" style="color:#31708f !important;" >Qoute</div></li>--}}
                            {{--<li class="text-info  " style="margin-top: -10px;">  <span class="like_h"> ...</span>--}}

                                {{--<div class=" hide" style="color:#31708f !important;margin-top: 10px;">More</div></li>--}}
                        {{--</ul>--}}
                {{--</div>--}}
                            {{--<br>--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<hr>--}}

            <div class="container-fluid">
                @foreach($posts as $key=> $m_post)
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-12 reply col-img">
                            <div class="user-profile">
                                <img class="profile-img img-responsive img-thumbnail" src=" {{($m_post->t_img)? config('app.url')."storage/profile_images/".$m_post->t_user_id.".".$m_post->t_img:asset('assets/img/user.png')}}">
                                <div class="profile-display hide">
                                    <a onclick="add_fav('{{$m_post->t_user_id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                    <h5 class="view-profile">View Profile</h5>
                                </div>
                            </div>
                            <div class="username">
                                <h4> <img src="{{asset('assets/img/crown.gif')}}" alt=""> <a href="#">{{$m_post->t_first_name." ".$m_post->t_last_name}}</a></h4>
                                <h4 style="text-align:center;">{{$m_post->u_posts." Posts"}}</h4>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="">

                                        {!!$m_post->t_text !!}

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <p class="pull-right">{{$m_post->t_updated_at}}</p>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-10 col-xs-12" style="margin-top: 70px;">
                                <div class="panel-footer " style="border:none; padding:0;">

                                    <script>
                                        $(document).ready(function(){
                                            {{$time=(string)round(microtime(true) * 1000 + rand(1,900))}}

                                                $("{{'#'}}{{"btn71"}}{{$thread->id}}{{$time}}").click(function(){
                                                $("{{'#71'}}{{$thread->id}}{{$time}}").removeClass("hide");
                                                $("{{'#71'}}{{"btn-close"}}{{$thread->id}}{{$time}}").removeClass("hide");
                                                $("{{'#71'}}{{"btn-close1"}}{{$thread->id}}{{$time}}").addClass("hide");
                                                $("{{'#'}}{{"btn71"}}{{$thread->id}}{{$time}}").addClass("hide");
                                                $("{{'#'}}{{"btn711"}}{{$thread->id}}{{$time}}").removeClass("hide");
                                            });

                                            $("{{'#71'}}{{"btn-close"}}{{$thread->id}}{{$time}}").click(function(){
                                                $("{{'#71'}}{{$thread->id}}{{$time}}").addClass("hide");
                                                $("{{'#'}}{{"btn71"}}{{$thread->id}}{{$time}}").removeClass("hide");
                                            });

                                            $("{{'#'}}{{"btn711"}}{{$thread->id}}{{$time}}").click(function(){
                                                $("{{'#71'}}{{$thread->id}}{{$time}}").removeClass("hide");
                                                $("{{'#71'}}{{"btn-close"}}{{$thread->id}}{{$time}}").addClass("hide");
                                                $("{{'#71'}}{{"btn-close1"}}{{$thread->id}}{{$time}}").removeClass("hide");
                                                $("{{'#'}}{{"btn711"}}{{$thread->id}}{{$time}}").addClass("hide");
                                                $("{{'#'}}{{"btn71"}}{{$thread->id}}{{$time}}").removeClass("hide");
                                            });

                                            $("{{'#71'}}{{"btn-close1"}}{{$thread->id}}{{$time}}").click(function(){
                                                $("{{'#71'}}{{$thread->id}}{{$time}}").addClass("hide");
                                                $("{{'#'}}{{"btn711"}}{{$thread->id}}{{$time}}").removeClass("hide");
                                            });

                                        });
                                    </script>
                                    <div class="reply-box hide" id="71{{$thread->id}}{{$time}}">

                                        <form method="POST" action="{{route('posts.store')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="title" value="{{$m_post->d_title}}">
                                            <input type="hidden" name="slug" value="{{$m_post->forum}}">
                                            <div class="form-group">
                                                <div id="sample">
                                                    <textarea id="summernote71{{$thread->id}}{{$time}}" name="text"></textarea>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $("{{'#'}}{{"btn71"}}{{$thread->id}}{{$time}}").click(function(){

                                                                $('#summernote71{{$thread->id}}{{$time}}').summernote('focus', '');
                                                                $('#summernote71{{$thread->id}}{{$time}}').summernote('code', '');
                                                            });
                                                            $("{{'#'}}{{"btn711"}}{{$thread->id}}{{$time}}").click(function(){
                                                                {{--{{//$time=(string)round(microtime(true) * 1000)}}--}}
                                                                {{--{{$m_post->t_text=str_replace('background:#bcd2ee;','background:white; color:white',$m_post->t_text)}}--}}
                                                                {{--{{$m_post->t_text=str_replace('border-color:#bcd2ee','border-color:white',$m_post->t_text)}}--}}
                                                                {{--{{$m_post->t_text=str_replace('border-color:#bcd2ee','border-color:white',$m_post->t_text)}}--}}
                                                            $('#summernote71{{$thread->id}}{{$time}}').summernote('code',$.parseHTML('<button type="button" disabled  style="width:100%; font-weight:600; padding-left: 10px; border-top-right-radius:5px !important ; border-top-left-radius:5px !important; border:0; text-align:left;   padding-bottom:0; line-height: 20px; background:#bcd2ee; min-height:25px"  data-toggle="collapse" data-target="#demo461{{$thread->id}}{{$time}}">{{'Quoted:'.$m_post->t_first_name." ".$m_post->t_last_name}}<i class="fa fa1 fa-chevron-down" aria-hidden="true"></i></button>  <div id="demo461{{$thread->id}}{{$time}}" class="collapse in" style="padding-top:0; padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border:solid;padding-left: 10px;  border-color:#bcd2ee; border-width:0px 3px 3px 3px;">  {!! $m_post->t_text !!} <br> <button type="button" disabled  style="width:100%; font-weight:600; padding-left: 10px; border-top-right-radius:5px !important ; border-top-left-radius:5px !important; border:0; text-align:center;   padding-bottom:0; line-height: 20px; background:white; min-height:25px"  data-toggle="collapse" data-target="#demo461{{$thread->id}}{{$time}}"><i class="fa fa1 fa-chevron-up" aria-hidden="true"></i></button> </div>  <div> &nbsp </div>'));});
                                                            $('#summernote71{{$thread->id}}{{$time}}').summernote('saveRange');
                                                            $('#summernote71{{$thread->id}}{{$time}}').summernote('focus');

                                                        })
                                                    </script>
                                                </div>
                                            </div>
                                            <button id="71{{"btn-close"}}{{$thread->id}}{{$time}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                            <button id="71{{"btn-close1"}}{{$thread->id}}{{$time}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                            <button type="submit" class="btn btn-info pull-right " style="">Send</button>
                                        </form>
                                    </div>
                                </div>

                                <br>


                                <div class="comment-box-bottom">
                                    <ul>
                                        <li><a href="javascript:void(0);"  onclick="like('{{$m_post->t_id}}','thread')"><i class="like like_h fa {{($m_post->like_id)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                                            <div class="hide" style="color:#31708f !important; display: inherit;">{{($m_post->like_id)?$m_post->c_like:$m_post->c_like-1}}</div>
                                        </li>
                                        <li id="{{"btn71"}}{{$thread->id}}{{$time}}"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">
                                            <div class=" hide" style="color:#31708f !important;">Reply</div>
                                        </li>
                                        <li id="{{"btn711"}}{{$thread->id}}{{$time}}" class="text-info"><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
                                            <div class=" hide" style="color:#31708f !important;" >Qoute</div></li>
                                        <li class="text-info  " style="margin-top: -10px;">  <span class="like_h"> ...</span>

                                            <div class=" hide" style="color:#31708f !important;margin-top: 10px;">More</div></li>
                                    </ul>
                                </div>
                                <br>
                            </div>


                        </div>



                    </div>
                    <hr>

                    @endforeach

                    
                    </div>
                    </div>
                </div>
            {{--</div>--}}
        {{--</div>--}}
        <hr>
    {{--@endforeach--}}

{{--</div>--}}
{{--</div>--}}
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