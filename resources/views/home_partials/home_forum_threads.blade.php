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
    @foreach($forum_threads as $thread)
        @if(isset($thread->id) && $thread->id!=null)
            <div class="row">  <!-- first post start -->
            <div class="container-fluid" style=" padding-left: 0px !important;">
                <div class="">

                    <div class="col-md-2 col-sm-2 col-xs-5 col-img">
                        <div class="user-profile">
                            <img class="profile-img img-responsive img-thumbnail" src=" {{($thread->user->img)? config('app.url')."storage/profile_images/".$thread->user->id.".".$thread->user->img:asset('assets/img/user.png')}}">
                            <div class="profile-display hide">
                                  <a onclick="add_fav('{{$thread->user->id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                  <h5 class="view-profile">View Profile</h5>
                             </div>                                                    
                        </div>
                        <div class="username">                    
                                <h4> <img src="{{asset('assets/img/crown.gif')}}" alt=""> <a href="#">{{$thread->user->first_name.' '.$thread->user->last_name}}</a></h4>
                                <h4 style="text-align:center;">{{$thread->user->u_posts}} Posts</h4>
                        </div>
                    </div>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="row">
                            <div class="col-sm-8">
                                <p style="font-size: 14px;color: #3077b5 !important;"> <a href="{{route('home',$thread->slug)}}">{{$thread->slug}}</a> > <a href="{{route('home',$thread->slug)}}/{{$thread->id}}">{{$thread->title}}</a> </p>
                            </div>
                            <div class="col-sm-4">
                                <p style="color: black !important" class="pull-right">{{$thread->updated_at}}</p>
                            </div>

                        </div>


                        <div style="color: black !important" class="col-md-12 col-sm-12 comment-text">
                            {!! $thread->text !!}

                        </div>

                        <hr>


                <div class="row" style="margin-top: 70px;">
                    <div class="panel-footer " style="border:none; padding:0; margin-left:15px;">

                        <div class="reply-box hide" id="41">

                            <form method="POST" action="{{route('threads.store')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="title" value="{{$thread->title}}">
                                <input type="hidden" name="slug" value="{{$thread->slug}}">
                                <div class="form-group">
                                    <div id="sample">
                                        <textarea id="summernote441" name="text"></textarea>
                                    </div>
                                </div>
                                 <button id="41{{"btn-close"}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                 <button id="41{{"btn-close1"}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                <button type="submit" class="btn btn-info pull-right " style="">Send</button>
                            </form>
                        </div>
                    </div>

                    <br>


                    <div class="comment-box-bottom">
                        <ul>
                           <li class=""><a href="javascript:void(0);"  onclick="like('{{$thread->id}}','thread')" ><i class="like like_h fa {{($thread->like_user_count>0)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                             <div class="hide text-info" style=" display: inherit;">{{$thread->like_count}}</div>
                            </li>
                            <li id="{{"btn41"}}"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">
                                <div class=" hide text-info" style="">Reply</div>
                            </li>
                            <li id="{{"btn411"}}" class="text-info"><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
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
                        {{--<p class="pull-right">{{$thread->t_updated_at}}</p>--}}
                    </div>
                </div>

                <div class="col-md-2 col-sm-2 col-xs-12 reply col-img"> </div>
                
            </div>

        </div>
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
                       <td  class="text-nowrap"><a href="{{route('home',$table->slug)}}/{{$table->id}}">Re:{{$table->title}}</a></td>
                       <td  class="text-nowrap"> <a href="#"> {{$table->first_name}}</a></td>
                       <td  class="text-nowrap"></td>
                       <td class="likes text-nowrap">{{$table->like_count}}</td>
                       <td class="date text-nowrap">{{Carbon\Carbon::parse($table->updated_at)->toDateString()}}</td>
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

