@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
             @include('shared.nav_ver')
			<div class="main2 col-md-8" style="background-color: #fff;">
                <div class="row" >
                    <p class="pull-left text-muted top-text-left">Movers and Gainers&nbsp&nbsp
                        <span class="glyphicon glyphicon-chevron-down" ></span></p>
                    <p class="pull-right top-text-right"> <a href="#">See all >> </a></p>
                </div>
				@if(isset($posts))
                    {{--@include('single')--}}
                @else
                <div class="row" style="border:1px solid #eee; margin-right:20px; padding:10px 0px; border-left:0px;">
                    <div class="col-md-12 ">
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <p>
                                <img class="img-responsive img-size" src=' {{asset('assets/img/eth-128.png')}}' type='image/x-icon'>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <p>
                                <img class="img-responsive img-size" src=' {{asset('assets/img/eth-128.png')}}' type='image/x-icon'>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <p>
                                 <img class="img-responsive img-size" src=' {{asset('assets/img/eth-128.png')}}' type='image/x-icon'>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <p>
                                <img class="img-responsive img-size" src=' {{asset('assets/img/eth-128.png')}}' type='image/x-icon'>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <p>
                                <img class="img-responsive img-size" src=' {{asset('assets/img/eth-128.png')}}' type='image/x-icon'>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <p>
                                <img class="img-responsive img-size" src=' {{asset('assets/img/eth-128.png')}}' type='image/x-icon'>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div id="exTab1" class="">
                        <div class="col-md-4 col-sm-3">
                            <p class="foram-name"><a href="">{{$slug}}</a></p>
                        </div>
                        <ul  class=" nav nav-pills">
                            <li class="active"><a  href="#1a" data-toggle="tab">All</a></li>
                            <li><a href="#2a" data-toggle="tab">Charts</a></li>
                            <li><a href="#3a" data-toggle="tab">Following</a></li>
                            <li><a href="#4a" data-toggle="tab">Links</a></li>
                            <li><a href="#5a" data-toggle="tab">New</a></li>
                             <li><a href=""> <i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a> </li>
                        </ul>

                        <div class="tab-content clearfix">
                            <!-- first tab contant -->
                            <div class="tab-pane active" id="1a">


                                @if(isset($forum_threads))
                                    {{--@include('home_forum_threads')--}}
                                @else
                                    @include('home_threads')
                                @endif
                            </div> <!-- first post end-->
                            <hr>


                            <div class="tab-pane" id="2a">
                                {{--@include('charts')--}}
							</div>
                            <div class="tab-pane" id="3a"> 
								  {{--@include('following')--}}
							</div>
                            <div class="tab-pane" id="4a">
								{{--@include('links')--}}
                            </div>
                            <div class="tab-pane" id="5a">
                                <div class="panel-footer">
                                    <div class="reply-box">
                                        <!-- form start -->
                                        <form method="POST" action="{{route('threads.store')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="slug" value="{{@$slug}}">
                                            <input required type="text" class="form-control" placeholder="Title of Discussion" name="title" style="border: none !important;height:50px;font-size: 20px;">
                                            <div class="form-group">
                                                <div id="sample">
                                                    <textarea id="summernote5a" name="text"></textarea>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#summernote5a').summernote();
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <button type="button" class="reply-close btn btn-danger">close</button>
                                            <button type="submit" class="btn btn-info pull-right" style="">Send</button>
                                        </form>  <!-- form end -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> <!-- row -->

            </div><!--Container-fluid  --></div>
        <div class="bit_coin col-md-8 hide col-md-offset-2" style=" position:absolute;top: 50px;  background-color: #fff;">
             @include('bit_coin')
        </div></div>
        </div></div>
			@endif
        <div class="notify" id="notify"></div>
            <!-- script  -->
            <script src="assets/dist/js/bootstrap-select.js"></script>
@endsection

@section('javascript')

    <script src="assets/dist/js/bootstrap-select.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-messaging.js"></script>

    <script>

        $(document).ready(function () {
            $('#bit_coin').click(function () {
                $('.main2').addClass('hide');
                $('.bit_coin').removeClass('hide');
            });
        });

        if ('serviceWorker' in navigator && 'PushManager' in window) {
            console.log('Service Worker and Push is supported');

            navigator.serviceWorker.register('firebase-messaging-sw.js')
                .then(function(swReg) {
                    console.log('Service Worker is registered', swReg);

                    swRegistration = swReg;
                })
                .catch(function(error) {
                    console.error('Service Worker Error', error);
                });
        } else {
            console.warn('Push messaging is not supported');
            pushButton.textContent = 'Push Not Supported';
        }


        function sendTokenToServer(token){
//            console.log('Sending token: '+token);
            $.ajax({
                url: '{{config("app.url")}}update_fcm_token',
                data: {
                    token: token
                },
                error: function() {
                    console.log("Error while sending token!");
                },
                success: function(data) {
                    console.log(data);
                },
                type: 'GET'
            });
        }

        // Initialize Firebase
        var config = {
            messagingSenderId: "858162500879"
        };

        firebase.initializeApp(config);
        const messaging = firebase.messaging();
        messaging.requestPermission()
            .then(function() {
                console.log('Notification permission granted.');
            })
            .catch(function(err) {
                console.log('Unable to get permission to notify.', err);
            });

        messaging.getToken()
            .then(function(currentToken) {
                if (currentToken) {
                    //console.log("Token Received: ",currentToken);
                    sendTokenToServer(currentToken);
                    //updateUIForPushEnabled(currentToken);
                } else {
                    // Show permission request.
                    console.log('No Instance ID token available. Request permission to generate one.');
                    // Show permission UI.
                    //updateUIForPushPermissionRequired();
                    //setTokenSentToServer(false);
                }
            })
            .catch(function(err) {
                console.log('An error occurred while retrieving token. ', err);
                //showToken('Error retrieving Instance ID token. ', err);
                //setTokenSentToServer(false);
            });

        messaging.onTokenRefresh(function() {
            messaging.getToken()
                .then(function(refreshedToken) {
                    console.log('Token refreshed.');
                    // Indicate that the new Instance ID token has not yet been sent to the
                    // app server.
                    // Send Instance ID token to app server.
                    sendTokenToServer(refreshedToken);
                    // ...
                })
                .catch(function(err) {
                    console.log('Unable to retrieve refreshed token ', err);
//                    showToken('Unable to retrieve refreshed token ', err);
                });
        });

        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
            add_bottom_notify_card(payload);
            add_nav_notify_card(payload);
//            toastr.info(payload.notification.body,payload.notification.title);
//            $('#notify').append('<div class="notification">'+
//                '<p class="close" onclick="remove_notify()"><i id="close" class="fa fa-times" aria-hidden="true"></i></p><div class="col-sm-3">'+
//                '<img class="img-responsive"src="assets/img/user.png" alt="">'+
//                '</div>'+
//                '<div class="col-sm-9">'+
//                '<div class="text">'+
//                '<p> <strong>'+payload.notification.title+'</strong> </p>'+
//                '<p>'+payload.notification.body+'</p>'+
//                '</div>'+
//                '</div>'+
//                '</div>');
        });

        function remove_notify(){
            var len = $('#notify').children().length;

            for(var i=0; i<len; ++i){
                $('#notify').children().eq(i)
                    .delay(5000)
                    .fadeOut(1000, function () {
                        console.log('removing notify child');
                        $(this).remove();
                    });
            }
        }

        function add_bottom_notify_card(payload){
            $('#notify').append('<div class="notification" onclick="remove_notify(this)">'+
                '<p class="close" onclick="this.remove()"><i id="close" class="fa fa-times" aria-hidden="true"></i></p><div class="col-sm-3">'+
                '<img class="img-responsive"src="assets/img/user.png" alt="">'+
                '</div>'+
                '<div class="col-sm-9">'+
                '<div class="text">'+
                '<p> <strong>'+payload.notification.title+'</strong> </p>'+
                '<p>'+payload.notification.body+'</p>'+
                '</div>'+
                '</div>'+
                '</div>');

//            if( $('#notify').children().length > 4){
//                $('#notify').children().eq(0).fadeOut('slow', function(){
//                    $(this).remove();
//                });
//            }

            remove_notify();
        }
        function add_nav_notify_card(payload){
            $('#dropdown-notification').append(' <li style="padding: 0px 0px 0px 0px !important;">'+
                '<div class="notification">'+
                '<p class="close"></p>'+
                '<div class="col-sm-3">'+
                '<img class="img-responsive"src="assets/img/user.png" alt="">'+
                '</div>'+
                '<div class="col-sm-9">'+
                '<div class="text">'+
                '<p> <strong>'+payload.notification.title+'</strong> </p>'+
                '<p>'+payload.notification.body+'</p>'+
                '</div> </div> </div> </li>');
        }
        $(document).ready(function(){

                $(".user-profile").hover(
                      function () {
                        $(".profile-display",this).removeClass("hide");
                      },
                      function () {
                        $(".profile-display",this).addClass("hide");
                      }
                    );
        });
                   

    </script>
@endsection
