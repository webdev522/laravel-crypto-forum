<h5>View as: <strong>Followings</strong> </h5>
<hr>

@foreach($follows->following as $follow)
    @foreach($follow->threads as $thread)
    <div class="row">  <!-- first post start -->
        <div class="container-fluid">
            <div class="">

                <div class="col-md-2 col-sm-2 col-xs-5 col-img">
                    <div class="user-profile">
                        <img class="profile-img img-responsive img-thumbnail" src="{{($thread->user->img)? config('app.url')."storage/profile_images/".$thread->user->id.".".$thread->user->img:asset('assets/img/user.png')}}">
                          <div class="profile-display hide">
                                <a onclick="add_fav('{{$thread->user_id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                <h5 class="view-profile">View Profile</h5>
                            </div>
                    </div>

                     <div class="username">                    
                                <h4><a href="#"> {{$thread->user->first_name." ".$thread->user->last_name}}</a></h4>
                                <h4>{{$thread->user->u_posts}} Posts</h4>
                         </div>
                </div>

                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="font-size: 14px;color: #337ab7 !important;"> <a href="{{route('home',$thread->slug)}}">{{$thread->slug}}</a> >  <a href="{{route('home',$thread->slug)}}/{{$thread->id}}">{{$thread->title}}</a> </p>
                            {{--<a href="{{route('home',$thread->slug)}}/{{$thread->id}}"> <h4><strong>{{$thread->title}}</strong></h4>--}}

                        </div>
                        <div class="col-sm-4">
                            <p class="pull-right">{{$thread->updated_at}}</p>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 comment-text">
                        {!! $thread->text !!}
                    </div>


                    <div class="col-md-12 col-sm-10 col-xs-12">
                <div class="row">
                    <div>
                        @foreach($thread->posts as $post)
                            <div class="commment-box thumbnail">
                                {{--<p> <a href="">@username</a> Not as as Bullish as you hut here is my chart. here 1 houre TF <span class="">SELL</span> </p>--}}
                                {{--<div class="row">--}}
                                {{--<div class="col-md-4 col-sm-6 box1"> </div>--}}
                                {{--</div>--}}
                                {{--<p>And here is 4 TF</p>--}}
                                {{--<div class="row">--}}
                                {{--<div class="col-md-4 col-sm-6 box2"> </div>--}}
                                {{--</div>--}}

                                {!!$post->text !!}

                            </div>
                        @endforeach

                        <div class="panel-footer " style="border:none; padding:0px">
                          <!--   <p><button id="{{"fbtn"}}{{$thread->id}}" class="reply-btn btn btn-info pull-right">Reply</button></p> -->
                           <script>
                                $(document).ready(function(){

                                    $("{{'#'}}{{"fbtn1"}}{{$thread->id}}").click(function(){
                                        $("{{'#f'}}{{$thread->id}}").removeClass("hide");
                                        $("{{'#f'}}{{"btn1-close"}}{{$thread->id}}").removeClass("hide");
                                          $("{{'#f'}}{{"btn2-close"}}{{$thread->id}}").addClass("hide");
                                        $("{{'#'}}{{"fbtn1"}}{{$thread->id}}").addClass("hide");
                                         $("{{'#'}}{{"fbtn2"}}{{$thread->id}}").removeClass("hide");
                                    });

                                    $("{{'#'}}{{"fbtn1-close"}}{{$thread->id}}").click(function(){
                                        $("{{'#f'}}{{$thread->id}}").addClass("hide");
                                        $("{{'#'}}{{"fbtn1"}}{{$thread->id}}").removeClass("hide");
                                    });

                                     $("{{'#'}}{{"fbtn2"}}{{$thread->id}}").click(function(){
                                        $("{{'#f'}}{{$thread->id}}").removeClass("hide");
                                       $("{{'#f'}}{{"btn1-close"}}{{$thread->id}}").addClass("hide");
                                          $("{{'#f'}}{{"btn2-close"}}{{$thread->id}}").removeClass("hide");
                                        $("{{'#'}}{{"fbtn2"}}{{$thread->id}}").addClass("hide");
                                         $("{{'#'}}{{"fbtn1"}}{{$thread->id}}").removeClass("hide");
                                    });

                                    $("{{'#'}}{{"fbtn2-close"}}{{$thread->id}}").click(function(){
                                        $("{{'#f'}}{{$thread->id}}").addClass("hide");
                                        $("{{'#'}}{{"fbtn2"}}{{$thread->id}}").removeClass("hide");
                                    });

                                });
                            </script>
                            <div class="reply-box hide" id="f{{$thread->id}}">

                                <form method="POST" action="{{route('posts.store')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                    <div class="form-group">
                                        <div id="sample">
                                            <textarea id="summernotef{{$thread->id}}" name="text"></textarea>
                                           <script>
                                                $(document).ready(function() {

                                                    $("{{'#'}}{{"fbtn1"}}{{$thread->id}}").click(function(){
                                                           $('#summernotef{{$thread->id}}').summernote('code', '');
                                                             $('#summernotef{{$thread->id}}').summernote('focus', '');
                                                    });
                                                
                                                    $("{{'#'}}{{"fbtn2"}}{{$thread->id}}").click(function(){

                                                            {{--$('#summernotef{{$thread->id}}').summernote('code',$.parseHTML('<blockquote>{!!$thread->text!!}</blockquote>'));--}}
                                                        $('#summernotef{{$thread->id}}').summernote('code',$.parseHTML('<button type="button" style="width:100%; text-align:left; line-height: 1px;" class="btn btn-info" data-toggle="collapse" data-target="#demo4422f{{$thread->id}}">--</button>  <div id="demo4422f{{$thread->id}}" class="collapse in"> <blockquote>   {!! $thread->text !!} </blockquote>  </div>  <div> &nbsp </div>'));});
                                                              $('#summernotef{{$thread->id}}').summernote('focus', '');

                                                  
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <button id="{{"fbtn1-close"}}{{$thread->id}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                     <button id="{{"fbtn2-close"}}{{$thread->id}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                    <button type="submit" class="btn btn-info pull-right " style="">Reply</button>
                                </form>
                            </div>
                        </div>

                        <br>


                       <div class="comment-box-bottom">
                        <ul>
                         <li class=""><a href="javascript:void(0);"  onclick="like('{{$thread->id}}','thread')" ><i class="fa like_h like1 {{($thread->like_id)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                                <div class="hide" style="color: #3c763d;display: inherit;">123</div>
                            </li>

                            <li id="{{"fbtn1"}}{{$thread->id}}"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">
                                <div class="text-info hide">Reply</div>
                            </li>
                            <li id="{{"fbtn2"}}{{$thread->id}}" ><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
                                <div class="text-info hide" >Qoute</div></li>
                            <li class="text-info ">  <span class="like_h"> ...</span>

                                <div class="text-info hide" >More</div></li>
                        </ul>
                    </div>
                        <br>
                    </div>

                </div>
            </div>


                </div>

            </div>

        </div>
        {{--<hr>--}}
    </div>
    <hr>
@endforeach
    @endforeach
<script type="text/javascript">
//    $('document').ready(function(){
//
//        $(".like1").click(function(){
////                                        $(".like1").removeClass('hide');
//            var $this   = $(this)
//            if($this.hasClass('fa-heart'))
//                $this.css("color","#31708f").addClass('fa-heart-o').removeClass('fa-heart');
//            else
//                $this.css("color","#31708f").removeClass('fa-heart-o').addClass('fa-heart');
//
//
//        });
//    });
</script>
<script type="text/javascript">
    $('document').ready(function(){

        $(".like1").click(function(){
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