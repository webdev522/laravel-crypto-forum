<div class="tab-content clearfix" >
    <h5>View as: <strong>Charts</strong> </h5>
    <hr>
    @foreach($charts as $link)
        <div class="row">  <!-- first post start -->
            <div class="container-fluid">
                <div class="">

                    <div class="col-md-2 col-sm-2 col-xs-5 col-img">
                        <div class="user-profile">
                            <img class="profile-img img-responsive img-thumbnail" src=" {{($link->img)? config('app.url')."storage/profile_images/".$link->id.".".$link->img:asset('assets/img/user.png')}}">
                            <div class="profile-display hide">
                                  <a onclick="add_fav('{{$link->p_id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                  <h5 class="view-profile">View Profile</h5>
                             </div>
                        </div>
                         <div class="username">                    
                                <h4><a href="#"> {{$link->first_name.' '.$link->last_name}}</a></h4>
                                <h4>{{$link->u_posts}} Posts</h4>
                        </div>
                    </div>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="row">
                            <div class="col-sm-8">
                                <p style="font-size: 14px;color: #337ab7 !important;"> <a href="{{route('home',$link->slug)}}">{{$link->slug}}</a> >  <a href="{{route('home',$link->slug)}}/{{$link->t_id}}">{{$link->t_title}}</a> </p>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <p class="pull-right">{{$link->p_updated_at}}</p>
                            </div>

                        </div>


                        <div class="col-md-12 col-sm-12 comment-text">


                            {!! $link->link !!}

                        </div>

                        <hr>
                    </div>

                </div>

            </div>


            <div class="container-fluid">

                <div class="">
                    <div class="col-md-2 col-sm-2 col-xs-12  col-img">
                    </div>
                    <div class="col-md-8 col-sm-10 col-xs-12">

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="">



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="pull-right">{{$link->p_updated_at}}</p>
                    </div>
                </div>
                <hr>
                     <div class="col-md-2 col-sm-2 col-xs-12  col-img">
                    </div>
                <div class="col-md-7 col-sm-10 col-xs-12">
                    <div class="panel-footer " style="border:none; padding:0px">
                      <!--   <p><button id="{{"btn4"}}{{$link->thread_id}}" class="reply-btn btn btn-info pull-right">Reply</button></p> -->
                       <script>
                            $(document).ready(function(){

                                $("{{'#'}}{{"btn41"}}{{$link->thread_id}}").click(function(){
                                    $("{{'#41'}}{{$link->thread_id}}").removeClass("hide");
                                    $("{{'#41'}}{{"btn-close"}}{{$link->thread_id}}").removeClass("hide");
                                     $("{{'#41'}}{{"btn-close1"}}{{$link->thread_id}}").addClass("hide");
                                    $("{{'#'}}{{"btn41"}}{{$link->thread_id}}").addClass("hide");
                                     $("{{'#'}}{{"btn411"}}{{$link->thread_id}}").removeClass("hide");
                                });

                                $("{{'#41'}}{{"btn-close"}}{{$link->thread_id}}").click(function(){
                                    $("{{'#41'}}{{$link->thread_id}}").addClass("hide");
                                    $("{{'#'}}{{"btn41"}}{{$link->thread_id}}").removeClass("hide");
                                });

                                $("{{'#'}}{{"btn411"}}{{$link->thread_id}}").click(function(){
                                    $("{{'#41'}}{{$link->thread_id}}").removeClass("hide");
                                    $("{{'#41'}}{{"btn-close1"}}{{$link->thread_id}}").addClass("hide");
                                     $("{{'#41'}}{{"btn-close"}}{{$link->thread_id}}").removeClass("hide");
                                    $("{{'#'}}{{"btn411"}}{{$link->thread_id}}").addClass("hide");
                                      $("{{'#'}}{{"btn41"}}{{$link->thread_id}}").removeClass("hide");
                                });

                                $("{{'#41'}}{{"btn-close1"}}{{$link->thread_id}}").click(function(){
                                    $("{{'#41'}}{{$link->thread_id}}").addClass("hide");
                                    $("{{'#'}}{{"btn411"}}{{$link->thread_id}}").removeClass("hide");
                                });


                            });
                        </script>
                        <div class="reply-box hide" id="41{{$link->thread_id}}">

                            <form method="POST" action="{{route('posts.store')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="thread_id" value="{{$link->thread_id}}">
                                <div class="form-group">
                                    <div id="sample">
                                        <textarea id="summernote441{{$link->thread_id}}" name="text"></textarea>
                                       <script>
                                                $(document).ready(function() {

                                                    $("{{'#'}}{{"btn41"}}{{$link->thread_id}}").click(function(){
                                                           $('#summernote441{{$link->thread_id}}').summernote('code', '');
                                                            $('#summernote441{{$link->thread_id}}').summernote('focus', '');
                                                    });
                                                
                                                    $("{{'#'}}{{"btn411"}}{{$link->thread_id}}").click(function(){
                                                            {{--$('#summernote441{{$link->thread_id}}').summernote('code',$.parseHTML('<blockquote> {!! $link->link !!} </blockquote>'));--}}
                                                        $('#summernote411{{$link->p_id}}').summernote('code',$.parseHTML('<button type="button" style="width:100%; text-align:left; line-height: 1px;" class="btn btn-info" data-toggle="collapse" data-target="#demo411{{$link->thread_id}}">--</button>  <div id="demo411{{$link->thread_id}}" class="collapse in"> <blockquote>   {!! $link->link !!} </blockquote>  </div>  <div> &nbsp </div>'));});
                                                         $('#summernote441{{$link->thread_id}}').summernote('focus', '');

                                                  
                                                });
                                            </script>
                                    </div>
                                </div>
                                  <button id="41{{"btn-close"}}{{$link->thread_id}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                 <button id="41{{"btn-close1"}}{{$link->thread_id}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                <button type="submit" class="btn btn-info pull-right " style="">Send</button>
                            </form>
                        </div>
                    </div>

                    <br>


                     <div class="comment-box-bottom">
                        <ul>
                           <li class=""><a href="javascript:void(0);"  onclick="like('{{$link->p_id}}','post')" ><i class="fa like_h like3 {{($link->like_id)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                                <div class="hide" style="color: #3c763d;display: inherit;">{{($link->like_id)?$link->c_like:$link->c_like-1}}</div>
                            </li>
                            <li id="{{"btn41"}}{{$link->thread_id}}" class="reply-btn"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">
                                <div class="text-info hide">Reply</div>
                            </li>
                            <li id="{{"btn411"}}{{$link->thread_id}}" class="text-info"><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
                                <div class="text-info hide" >Qoute</div></li>
                            <li class="text-info">  <span class="like_h"> ...</span>

                                <div class="text-info hide" >More</div></li>
                        </ul>
                    </div>
                    <br>
                </div>
            </div>

        </div>
        <hr>
    @endforeach
    @foreach($charts_t as $link)
        <div class="row">  <!-- first post start -->
            <div class="container-fluid">
                <div class="">

                    <div class="col-md-2 col-sm-2 col-xs-5 col-img">
                        <div class="user-profile">
                            <img class="profile-img img-responsive img-thumbnail" src=" {{($link->img)? config('app.url')."storage/profile_images/".$link->id.".".$link->img:asset('assets/img/user.png')}}">
                            <div class="profile-display hide">
                                  <a onclick="add_fav('{{$link->t_id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                  <h5 class="view-profile">View Profile</h5>
                             </div>

                        </div>

                         <div class="username">                    
                                <h4><a href="#"> {{$link->first_name.' '.$link->last_name}}</a></h4>
                                <h4>{{$link->u_posts}} Posts</h4>
                        </div>
                    </div>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="row">
                            <div class="col-sm-8">
                                {{--<p style="font-size: 14px;color: #337ab7 !important;"> <a href="">Coin</a> > <a href="">BCT</a> > <a href="">BCT Charts Only</a> </p>--}}
                                <p style="font-size: 14px;color: #337ab7 !important;"> <a href="{{route('home',$link->slug)}}">{{$link->slug}}</a> >  <a href="{{route('home',$link->slug)}}/{{$link->t_id}}">{{$link->t_title}}</a> </p>

                            </div>
                            <div class="col-sm-4">
                                <p class="pull-right">{{$link->t_updated_at}}</p>
                            </div>

                        </div>


                        <div class="col-md-12 col-sm-12 comment-text">
                            {{--<a href="{{route('home',$link->slug)}}/{{$link->t_id}}"> <h4><strong>{{$link->t_title}}</strong></h4>--}}
                            {{--</a>--}}

                            {!! $link->link !!}

                        </div>

                        <hr>
                    </div>

                </div>

            </div>


            <div class="container-fluid">

                <div class="">
                    <div class="col-md-2 col-sm-2 col-xs-12 reply col-img">



                    </div>
                    <div class="col-md-8 col-sm-10 col-xs-12">

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="">



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="pull-right">{{$link->t_updated_at}}</p>
                    </div>
                </div>
                <hr>
                <div class="col-md-2 col-sm-2 col-xs-12 reply col-img"></div>
                <div class="col-md-7 col-sm-10 col-xs-12">
                    <div class="panel-footer " style="border:none; padding:0px">
                       <!--  <p><button id="{{"btn4"}}{{$link->t_id}}" class="reply-btn btn btn-info pull-right">Reply</button></p> -->
                         <script>
                            $(document).ready(function(){

                                $("{{'#'}}{{"btn42"}}{{$link->t_id}}").click(function(){
                                    $("{{'#42'}}{{$link->t_id}}").removeClass("hide");
                                    $("{{'#42'}}{{"btn-close"}}{{$link->t_id}}").removeClass("hide");
                                    $("{{'#42'}}{{"btn-close1"}}{{$link->t_id}}").addClass("hide");
                                    $("{{'#'}}{{"btn42"}}{{$link->t_id}}").addClass("hide");
                                      $("{{'#'}}{{"btn421"}}{{$link->t_id}}").removeClass("hide");
                                });

                                $("{{'#42'}}{{"btn-close"}}{{$link->t_id}}").click(function(){
                                    $("{{'#42'}}{{$link->t_id}}").addClass("hide");
                                    $("{{'#'}}{{"btn42"}}{{$link->t_id}}").removeClass("hide");
                                });

                                $("{{'#'}}{{"btn421"}}{{$link->t_id}}").click(function(){
                                    $("{{'#42'}}{{$link->t_id}}").removeClass("hide");
                                    $("{{'#42'}}{{"btn-close"}}{{$link->t_id}}").removeClass("hide");
                                    $("{{'#42'}}{{"btn-close1"}}{{$link->t_id}}").addClass("hide");
                                    $("{{'#'}}{{"btn421"}}{{$link->t_id}}").addClass("hide");
                                     $("{{'#'}}{{"btn42"}}{{$link->t_id}}").removeClass("hide");
                                });

                                $("{{'#42'}}{{"btn-close"}}{{$link->t_id}}").click(function(){
                                    $("{{'#42'}}{{$link->t_id}}").addClass("hide");
                                    $("{{'#'}}{{"btn421"}}{{$link->t_id}}").removeClass("hide");
                                });



                            });
                        </script>
                        <div class="reply-box hide" id="42{{$link->t_id}}">

                            <form method="POST" action="{{route('posts.store')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="thread_id" value="{{$link->t_id}}">
                                <div class="form-group">
                                    <div id="sample">
                                        <textarea id="summernote442{{$link->t_id}}" name="text"></textarea>
                                          <script>
                                                $(document).ready(function() {

                                                    $("{{'#'}}{{"btn42"}}{{$link->t_id}}").click(function(){
                                                          $('#summernote442{{$link->t_id}}').summernote('code', '');
                                                          $('#summernote442{{$link->t_id}}').summernote('focus', '');
                                                    });
                                                
                                                    $("{{'#'}}{{"btn421"}}{{$link->t_id}}").click(function(){
                                                           {{--$('#summernote442{{$link->t_id}}').summernote('code',$.parseHTML('<blockquote> {!! $link->link !!} </blockquote>'));--}}
                                                        $('#summernote442{{$link->t_id}}').summernote('code',$.parseHTML('<button type="button" style="width:100%; text-align:left; line-height: 1px;" class="btn btn-info" data-toggle="collapse" data-target="#demo442{{$link->t_id}}">--</button>  <div id="demo442{{$link->t_id}}" class="collapse in"> <blockquote>   {!! $link->link !!} </blockquote>  </div>  <div> &nbsp </div>'));});
                                                        $('#summernote442{{$link->t_id}}').summernote('focus', '');

                                                });
                                            </script>
                                    </div>
                                </div>
                                <button id="42{{"btn-close"}}{{$link->t_id}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                <button id="42{{"btn-close1"}}{{$link->t_id}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                <button type="submit" class="btn btn-info pull-right " style="">Send</button>
                            </form>
                        </div>
                    </div>

                    <br>


                    <div class="comment-box-bottom">
                        <ul>
                           <li class=""><a href="javascript:void(0);"  onclick="like('{{$link->t_id}}','thread')" ><i class="fa like_h like4 {{($link->like_id)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                                <div class="hide" style="color: #3c763d;display: inherit;">{{($link->like_id)?$link->c_like:$link->c_like-1}}</div>
                            </li>
                            <li id="{{"btn42"}}{{$link->t_id}}" class="reply-btn"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">
                                <div class="text-info hide">Reply</div>
                            </li>
                            <li id="{{"btn421"}}{{$link->t_id}}" class="text-info"> <img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
                                <div class="text-info hide" >Qoute</div></li>
                            <li class="text-info">  <span class="like_h"> ...</span>

                                <div class="text-info hide" >More</div></li>
                        </ul>
                    </div>
                    <br>
                </div>
            </div>

        </div>
        <hr>
    @endforeach
                </div>
<hr>
<script type="text/javascript">
//    $('document').ready(function(){
//
//        $(".like3").click(function(){
////                                        $(".like1").removeClass('hide');
//            var $this   = $(this)
//            if($this.hasClass('fa-heart'))
//                $this.css("color","#31708f").addClass('fa-heart-o').removeClass('fa-heart');
//            else
//                $this.css("color","#31708f").removeClass('fa-heart-o').addClass('fa-heart');
//
//
//        });
//
//         $(".like4").click(function(){
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

        $(".like3").click(function(){
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
</script>
<script type="text/javascript">
    $('document').ready(function(){

        $(".like4").click(function(){
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