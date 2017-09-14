<div class="tab-content clearfix" >
    <h5>View as: <strong>Links</strong> </h5>
    <hr>
    @foreach($links as $link)
        <div class="row">  <!-- first post start -->
            <div class="container-fluid">
                <div class="">

                    <div class="col-md-2 col-sm-2 col-xs-5 col-img">
                        <div class="user-profile">
                            <img class="profile-img img-responsive img-thumbnail" src=" {{($link->user->img)? config('app.url')."storage/profile_images/".$link->user->id.".".$link->user->img:asset('assets/img/user.png')}}">
                            <div class="profile-display hide">
                                <a onclick="add_fav('{{$link->user->id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                <h5 class="view-profile">View Profile</h5>
                            </div>
                        </div>
                        <div class="username">
                            <h4><a href="#"> {{$link->user->first_name.' '.$link->user->last_name}}</a></h4>
                            <h4>{{$link->user->u_posts}} Posts</h4>
                        </div>
                    </div>

                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <div class="row">
                            <div class="col-sm-8">
                                <p style="font-size: 14px;color: #337ab7 !important;"> <a href="{{route('home',$link->slug)}}">{{$link->slug}}</a> >  <a href="{{route('home',$link->slug)}}/{{$link->id}}">{{$link->title}}</a> </p>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <p class="pull-right">{{$link->updated_at}}</p>
                            </div>

                        </div>


                        <div class="col-md-12 col-sm-12 comment-text">


                            {!! $link->text !!}

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
                        <p class="pull-right">{{$link->updated_at}}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12  col-img">
                    </div>
                    <div class="col-md-10">


                        <div class="panel-footer" style="border:none;padding:0;">
                            <div class="reply-box hide" id="{{$link->id}}">

                                <form method="POST" action="{{route('threads.store')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="title" value="{{$link->title}}">
                                    <input type="hidden" name="slug" value="{{$link->slug}}">
                                    <div class="form-group">
                                        <div id="sample">
                                            <textarea class="reply_txt" name="text"></textarea>
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
                                <li class=""><a href="javascript:void(0);"  onclick="like('{{$link->id}}','thread')" ><i class="fa like_h like {{($link->like_user_count > 0)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                                    <div class="hide" style="color: #3c763d;display: inherit;">{{$link->like_count}}</div>
                                </li>


                                <li>
                                    <img class="like_h reply" src="{{asset('assets/img/arrow.png')}}" alt="">
                                    <div class="text-info hide ">Reply</div>
                                </li>
                                <li><img class="like_h quote" src="{{asset('assets/img/qoute.png')}}" alt="">
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
        <hr>
    @endforeach

</div>