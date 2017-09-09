<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#354c70;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding-top: 5px !important;" href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <li><a href="#" data-toggle="modal" data-target="#signupModal">Sign up</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#signinModal">Sign in</a></li>
                @else
                    <li class="dropdown dropdown2 dropdown-mouse">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-bell"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-notification" id="dropdown-notification" >
                           @if(isset($user))
                            @foreach($user->notifications as $notification)
                                <li style="padding: 0px 0px 0px 0px !important;">
                                    <div class="notification">
                                        <p class="close"></p>
                                        <div class="col-sm-3">
                                            <img class="img-responsive"src="assets/img/user.png" alt="">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="text">
                                                <p> <strong>{{$notification->title}}</strong> </p>
                                                <p>{{$notification->body}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                               @else
                               {{redirect(route('logout'))}}
                            @endif
                        </ul>
                    </li>

                    <li class="user"> </li>
                    <li class="dropdown dropdown1 dropdown-mouse">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{(isset($user->first_name))?$user->first_name:" "}} </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('profile')}}"><span class="glyphicon glyphicon-user"></span>&nbspProfile</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-time"></span>&nbspHistory</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbspSettings</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>&nbspHelp</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>