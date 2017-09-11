@foreach($home_thread as $thread)
    <div class="row">  <!-- first post start -->
        <div class="container-fluid">
            <div class="">

                <div class="col-md-2 col-sm-2 col-xs-5 col-img">
                    <div class="user-profile">
                        <img class="profile-img img-responsive img-thumbnail" src=" {{($thread->user->img)? config('app.url')."storage/profile_images/".$thread->user->id.".".$thread->user->img:asset('assets/img/user.png')}}">
                       
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
                            <p style="font-size: 14px;color: #337ab7 !important;"> <a href="{{route('home',$thread->slug)}}">{{$thread->slug}}</a> > <a href="{{route('home',$thread->slug)}}/{{$thread->id}}">{{$thread->title}}</a> </p>

                        </div>
                        <div class="col-sm-4">
                            <p class="pull-right">{{$thread->updated_at}}</p>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 comment-text">
                        {!! $thread->text !!}
                    </div>

                    <div class="row">
                    <div class="col-md-12">


                        <div class="panel-footer" style="border:none;padding:0;">
                            {{--<script>--}}
                                {{--$(document).ready(function(){                                   --}}
                                    {{--$("{{'#'}}{{"btn"}}{{$thread->id}}").click(function(){--}}
                                        {{--$("{{'#'}}{{$thread->id}}").removeClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn-close"}}{{$thread->id}}").removeClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn-close1"}}{{$thread->id}}").addClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn"}}{{$thread->id}}").addClass("hide");--}}
                                         {{--$("{{'#'}}{{"btn1"}}{{$thread->id}}").removeClass("hide");--}}
                                    {{--});--}}

                                    {{--$("{{'#'}}{{"btn-close"}}{{$thread->id}}").click(function(){--}}
                                        {{--$("{{'#'}}{{$thread->id}}").addClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn"}}{{$thread->id}}").removeClass("hide");--}}
                                      {{----}}
                                    {{--});--}}


                                     {{--$("{{'#'}}{{"btn1"}}{{$thread->id}}").click(function(){--}}
                                        {{--$("{{'#'}}{{$thread->id}}").removeClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn-close"}}{{$thread->id}}").addClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn-close1"}}{{$thread->id}}").removeClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn1"}}{{$thread->id}}").addClass("hide");--}}
                                         {{--$("{{'#'}}{{"btn"}}{{$thread->id}}").removeClass("hide");--}}
                                    {{--});--}}

                                    {{--$("{{'#'}}{{"btn-close1"}}{{$thread->id}}").click(function(){--}}
                                        {{--$("{{'#'}}{{$thread->id}}").addClass("hide");--}}
                                        {{--$("{{'#'}}{{"btn1"}}{{$thread->id}}").removeClass("hide");--}}
                                      {{----}}
                                    {{--});--}}

                                {{--});--}}
                            {{--</script>--}}
                            <div class="reply-box hide" id="{{$thread->id}}">

                                <form method="POST" action="{{route('posts.store')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                    <div class="form-group">
                                        <div id="sample">
                                            <textarea name="text"></textarea>
                                            {{--<script>--}}
                                                {{--$(document).ready(function() {--}}

                                                    {{--$("{{'#'}}{{"btn"}}{{$thread->id}}").click(function(){--}}
                                                        {{--$('#summernote{{$thread->id}}').summernote('focus');--}}
                                                           {{--$('#summernote{{$thread->id}}').summernote('code', '');--}}
                                                    {{--});--}}
                                                {{----}}
                                                    {{--$("{{'#'}}{{"btn1"}}{{$thread->id}}").click(function(){--}}
                                                            {{--$('#summernote{{$thread->id}}').summernote('code',$.parseHTML('<blockquote>{!!$thread->text!!}</blockquote>'));--}}
                                                        {{--$('#summernote{{$thread->id}}').summernote('code',$.parseHTML('<button type="button" style="width:100%; text-align:left; line-height: 1px;" class="btn btn-info" data-toggle="collapse" data-target="#demo{{$thread->id}}">--</button>  <div id="demo{{$thread->id}}" class="collapse in"> <blockquote>   {!! $thread->text !!} </blockquote>  </div>  <div> &nbsp </div>'));});--}}
                                                    {{----}}
                                                        {{--$('#summernote{{$thread->id}}').summernote('focus', '');--}}

                                                {{--});--}}
                                            {{--</script>--}}
                                        </div>
                                    </div>
                                   <button id="" type="button" class="reply-close hide btn btn-danger">close</button>
                                   <button id="" type="button" class="qoute-close hide btn btn-danger">close</button>
                                    <button type="submit" class="btn btn-info pull-right " style="">Reply</button>
                                </form>
                            </div>
                        </div>

                        <br>


                          <div class="comment-box-bottom">
                                <ul>
                               <li class=""><a href="javascript:void(0);"  onclick="like('{{$thread->id}}','thread')" ><i class="fa like_h like2 {{($thread->like_count > 0)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                                <div class="hide" style="color: #3c763d;display: inherit;">{{$thread->like_count}}</div>
                            </li>
                                    
                                     
                                    <li>
                                        <img class="like_h reply" src="{{asset('assets/img/arrow.png')}}" alt="">
                                        <div class="text-info hide ">Reply</div>
                                    </li>
                                    <li><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
                                        <div class="text-info hide" >Qoute</div></li>
                                    <li class="text-info">  <span class="like_h"> ...</span>

                                        <div class="text-info hide" >More</div></li>
                                </ul>
                    </div>
                        <br>
                    </div>

                </div>


                </div>

            </div>

        </div>
        {{--<hr>--}}

    </div>
    <hr>
@endforeach


<script type="text/javascript">
    $('document').ready(function(){

        $(".like2").click(function(){
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
        $(".reply").click(function(){
            var $this   = $(this)
            var $temp=$($(this).parentsUntil('textarea'));
            console.log($temp);




        });
    });
    $(document).ready(function(){
        $(".like_h").hover(function(){
            $($($(this).parent().closest('li')).children()[1]).removeClass("hide");
        }, function(){
            $($($(this).parent().closest('li')).children()[1]).addClass("hide");
        });
    });
</script>
