<h5>View as: <strong>Followings</strong> </h5>
<hr>

@foreach($follows as $follow)
    <div class="row">  <!-- first post start -->
        <div class="container-fluid">
            <div class="">

                <div class="col-md-2 col-sm-2 col-xs-5 col-img">
                    <div class="user-profile">
                        <img class="profile-img img-responsive img-thumbnail" src="{{($follow->threads->user->img)? config('app.url')."storage/profile_images/".$follow->threads->user->id.".".$follow->threads->user->img:asset('assets/img/user.png')}}">
                          <div class="profile-display hide">
                                <a onclick="add_fav('{{$follow->threads->user->id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                <h5 class="view-profile">View Profile</h5>
                            </div>
                    </div>

                     <div class="username">                    
                                <h4><a href="#"> {{$follow->threads->user->first_name." ".$follow->threads->user->last_name}}</a></h4>
                                <h4>{{$follow->threads->user->u_posts}} Posts</h4>
                         </div>
                </div>

                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="row">
                        <div class="col-sm-8">
                            <p style="font-size: 14px;color: #337ab7 !important;"> <a href="{{route('home',$follow->threads->slug)}}">{{$follow->threads->slug}}</a> >  <a href="{{route('home',$follow->threads->slug)}}/{{$follow->threads->id}}">{{$follow->threads->title}}</a> </p>

                        </div>
                        <div class="col-sm-4">
                            <p class="pull-right">{{$follow->threads->updated_at}}</p>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 comment-text">
                        {!! $follow->threads->text !!}
                    </div>


                    <div class="col-md-12 col-sm-10 col-xs-12">
                <div class="row">
                    <div>
                        <div class="panel-footer " style="border:none; padding:0px">

                            <div class="reply-box hide" id="f{{$follow->threads->id}}">

                                <form method="POST" action="{{route('threads.store')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="title" value="{{$follow->threads->title}}">
                                    <input type="hidden" name="slug" value="{{$follow->threads->slug}}">
                                    <div class="form-group">
                                        <div id="sample">
                                            <textarea id="summernotef{{$follow->threads->id}}" name="text"></textarea>

                                        </div>
                                    </div>
                                    <button id="{{"fbtn1-close"}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                     <button id="{{"fbtn2-close"}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                    <button type="submit" class="btn btn-info pull-right " style="">Reply</button>
                                </form>
                            </div>
                        </div>

                        <br>


                       <div class="comment-box-bottom">
                        <ul>
                         <li class=""><a href="javascript:void(0);"  onclick="like('{{$follow->threads->id}}','thread')" ><i class="fa like_h like {{($follow->threads->like_user_count>0)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                                <div class="hide" style="color: #3c763d;display: inherit;">{{$follow->threads->like_count}}</div>
                            </li>

                            <li id="{{"fbtn1"}}"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">
                                <div class="text-info hide">Reply</div>
                            </li>
                            <li id="{{"fbtn2"}}" ><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
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