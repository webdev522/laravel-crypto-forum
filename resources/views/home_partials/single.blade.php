<div class="tab-content clearfix" >
    <h5>View as: <strong>Thread</strong> </h5>
    <hr>
            <div class="container-fluid">
                @foreach($single as $m_post)
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-12 reply col-img">
                            <div class="user-profile">
                                <img class="profile-img img-responsive img-thumbnail" src=" {{($m_post->user->img)? config('app.url')."storage/profile_images/".$m_post->user->id.".".$m_post->user->img:asset('assets/img/user.png')}}">
                                <div class="profile-display hide">
                                    <a onclick="add_fav('{{$m_post->user->id}}')" ><img class="heart img-responsive"  src=" {{asset('assets/img/heart.png')}}"></a>
                                    <h5 class="view-profile">View Profile</h5>
                                </div>
                            </div>
                            <div class="username">
                                <h4> <img src="{{asset('assets/img/crown.gif')}}" alt=""> <a href="#">{{$m_post->user->first_name." ".$m_post->user->last_name}}</a></h4>
                                <h4 style="text-align:center;">{{$m_post->user->u_posts." Posts"}}</h4>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="">

                                        {!!$m_post->text !!}

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <p class="pull-right">{{$m_post->updated_at}}</p>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-10 col-xs-12" style="margin-top: 70px;">
                                <div class="panel-footer " style="border:none; padding:0;">

                                    <script>

                                    </script>
                                    <div class="reply-box hide" id="71">

                                        <form method="POST" action="{{route('threads.store')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="title" value="{{$m_post->title}}">
                                            <input type="hidden" name="slug" value="{{$m_post->slug}}">
                                            <div class="form-group">
                                                <div id="sample">
                                                    <textarea id="summernote71" name="text"></textarea>

                                                </div>
                                            </div>
                                            <button id="71{{"btn-close"}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                            <button id="71{{"btn-close1"}}" type="button" class="reply-close hide btn btn-danger">close</button>
                                            <button type="submit" class="btn btn-info pull-right " style="">Send</button>
                                        </form>
                                    </div>
                                </div>

                                <br>


                                <div class="comment-box-bottom">
                                    <ul>
                                        <li><a href="javascript:void(0);"  onclick="like('{{$m_post->id}}','thread')"><i class="like like_h fa {{($m_post->like_user_count>0)?'fa-heart':'fa-heart-o'}} text-info" aria-hidden="true"></i></a>

                                            <div class="hide" style="color:#31708f !important; display: inherit;">{{$m_post->like_count}}</div>
                                        </li>
                                        <li id="{{"btn71"}}"><img class="like_h" src="{{asset('assets/img/arrow.png')}}" alt="">
                                            <div class=" hide" style="color:#31708f !important;">Reply</div>
                                        </li>
                                        <li id="{{"btn711"}}" class="text-info"><img class="like_h" src="{{asset('assets/img/qoute.png')}}" alt="">
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

        <hr>

