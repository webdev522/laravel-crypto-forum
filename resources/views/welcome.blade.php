@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section  class="header" id="header">
            <div class=" chart">
                <div class="searchChart">
                    <h1 class="p1">your investment and trading start here</h1>
                    <h4 class="p2">Live charts, discuss and learn your next crypto investment or trade</h4>

                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-7 col-sm-offset-1 col-sm-8"><input type="email" class="form-control" id="signup_email_1" placeholder="Enter your email here to sign up">
                            </div>
                            <div class="col-md-1 col-sm-2 ">
                                <button class="btn btn-info form-control" id="signup">Sign up</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="content">
            <div class="container">
                <div class="col-md-6">
                    <div class="left-img"> <img src="{{asset("assets/img/left.png")}}"></div>
                    <div class="detail">
                        <h3>Meet traders and invertors to get the most out your learning and portfolio</h3>

                        <h4>Catch up on what is happening with the coins you own and read what everyone thinks is the next big coin follow the best trader</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-img"><img src="assets/img/right.png"></div>
                    <div class="detail">
                        <h3>Real time nformation and charts all in the one place.</h3>
                        <h4>All the information that matters
                            like macket cap, live priceing,
                            latest news and opinions that matter
                            Best of all, it’s free</h4>
                    </div>
                </div>
            </div>
        </section>

    <footer>

        <ul class="menu">
            <li>About</li>
            <li>Help</li>
            <li>Careers</li>
            <li>Terms & conditions</li>
            <li>Privacy</li>
        </ul>


        <p> © Copyright 2017 CryptoTwit All rights reserved</p>
    </footer>
    </div>



    <!-- sign up Modal -->
    <div id="signupModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <img src="{{asset('assets/img/logo.png')}}">
                        <img src="{{asset("assets/img/logotext.png")}}">
                        <button type="button" class=" pull-right" data-toggle="modal" data-target="#signinModal" data-dismiss="modal" >Log in</button>
                        <a type="button" class="pull-right">Sign up </a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class=" col-sm-offset-1 col-sm-10">
                        <h4>Sign up is free</h4>

                        <form class="form-horizontal" method="POST" action="{{route("register")}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="firstname">First Name</label>
                                <div class="col-sm-8">
                                    <input name="first_name" type="text" class="form-control" id="firstname" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="lastname">Last Name</label>
                                <div class="col-sm-8">
                                    <input name="last_name" type="text" class="form-control" id="lastname" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="signup_email_2">Your Email</label>
                                <div class="col-sm-8">
                                    <input name="email" type="email" class="form-control" id="signup_email_2" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Password:</label>
                                <div class="col-sm-8">
                                    <input name="password" type="password" class="form-control" id="pwd" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label labelpwd col-sm-4" for="pwd">Re-Enter Password:</label>
                                <div class="col-sm-8">
                                    <input name="password_confirmation" type="password" class="form-control" id="pwd" placeholder="Re-Enter Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-8" for="pwd">Please read <a href="#"> Terms & conditions</a></label>
                                <div class="checkbox col-sm-4">
                                    <label><input name="i_agree" type="checkbox"> I agree</label>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class=" col-sm-12">
                                    <button type="submit" class="btn-info btn-info1">Sign Up</button>
                                    <button type="button" class=" pull-right " data-dismiss="modal">Close</button>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>

        </div>
    </div>

    <!-- login modal -->


    <!-- sign up Modal -->
    <div id="signinModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <img class=""src="{{asset("assets/img/logo.png")}}">
                        <img class="" src="{{asset("assets/img/logotext.png")}}">
                        <button type="button" class=" pull-right">Log in</button>
                        <a type="button"  href="" data-dismiss="modal"  data-toggle="modal" data-target="#signupModal"class="pull-right">Sign up </a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class=" col-sm-offset-1 col-sm-10">
                        <h4>Log in </h4>

                        <form class="form-horizontal" method="POST" action="{{route("login")}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Enter username or Email</label>
                                <div class="col-sm-8">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd"> Enter Password:</label>
                                <div class="col-sm-8">
                                    <input name="password" type="password" class="form-control" id="pwd" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Keep me signing in</label>
                                <div class="checkbox col-sm-8">
                                    <label><input name="remember" type="checkbox"><a href="#">Forgot my Email or Password</a></label>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class=" col-sm-12">
                                    <button type="submit" class="btn-info btn-info1">Sign in</button>
                                    <button type="button" class=" pull-right " data-dismiss="modal">Close</button>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>

        </div>
    </div>
@endsection

@section('css')
    <style type="text/css">
        .container-fluid{
            padding: 0px !important;
            border-radius: 0px !important;
        }
        section.header{
            position: relative;
        }
        section.header .navbar{
            background-color: #274c77 !important;
            height: 40px !important;
            border: none !important;
        }
        section.header .navbar-right {
            float: right !important;
            margin-right: 15px;
        }
        .navbar-brand{
            padding: 10px 30px !important;
        }
        section.header .navbar-default  .navbar-nav  > li > a {
            color: #fff !important;
        }

        section.header .chart{
            background-image: url("{{asset("assets/img/headerBg.png")}}");
            background-repeat: no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 600px;
        }
        section.header .chart{

        }
        section.header .chart .searchChart
        {
            background-color: rgba(250, 249, 249, 0.82);
            position: absolute;
            top: 30%;
            /*bottom: 0;*/
            left: 0;
            right: 0;
            margin: auto;
            margin-right: 4%;
            margin-left: 4%;
            /*height: 200px;*/
        }
        section.header .chart .searchChart h1{

            text-align: center;
            font-size: 6rem;
            text-transform: capitalize;
            color: #303131;
        }
        section.header .chart .searchChart h4{
            text-align: center;
            font-size: 4.5rem;
            /*text-transform: capitalize;*/
            letter-spacing: -3px;
            line-height: 1;
            color: #303131;
        }
        section.header .chart .searchChart .btn-info{
            background-color: #274c77 !important;
        }
        .form-horizontal{
            margin-top: 30px;
            margin-bottom: 30px;
        }
        section.header .form-control {
            border-radius: 0px !important;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0px 0px 9px 8px rgba(51, 122, 183, 0.25) !important;
        }

        section#content{
            margin-top: 7%;
            margin-bottom: 7%;
        }

        section#content .left-img>img{
            width: 80%;
            margin-left:10%;
            max-height: 250px;
        }
        section#content .detail {
            width: 80%;
            margin-left:10%;
        }
        section#content .detail >h3
        {
            font-weight: bold;
            line-height: 1;
        }
        section#content .detail >h4
        {padding-top: 20px;
            line-height: 1.5;}

        footer{
            background-color: #274c77 !important;
        }
        footer >ul{
            display: flex;
            font-size: 18px;
            margin-left: 25%;
        }
        footer >ul>li{
            padding: 20px;
            list-style: none;
            color: #fff;
        }
        footer >ul>li:before{
            content: '.';
            padding-left: 10px;
        }
        footer >p{
            text-align: center;
            font-size: 18px;
            padding-bottom: 20px;
            color: #fff;
        }
        /*media query for ipad pro view*/
        @media only screen and (max-width: 1024px) {
            section.header .chart .searchChart h4 {

                font-size: 3rem;
                letter-spacing: -1px;
                line-height: 1;
                font-weight: bold;
            }
            section.header .chart .searchChart h1 {
                font-size: 5rem;
            }
            footer >ul{
                display: flex;
                font-size: 18px;
                margin-left: 15%;
            }
        }
        /*media query for ipad view*/
        @media only screen and (max-width: 768px) {
            section.header .chart .searchChart h1 {
                text-align: center;
                font-size: 3.8rem;
                text-transform: capitalize;
                color: #303131;
            }
            section.header .chart .searchChart h4 {
                font-size: 2.4rem;
                letter-spacing: -1px;
                line-height: 1;
                font-weight: bold;
            }
            footer >ul{
                display: flex;
                font-size: 18px;
                margin-left: 5%;
            }
        }
        /*media query for mobile view*/
        @media only screen and (max-width: 480px) {

            section.header .chart .searchChart h1{

                text-align: center;
                font-size: 2rem;
                text-transform: capitalize;
                color: #303131;
            }
            section.header .chart .searchChart h4{

                font-size: 1.5rem;
                letter-spacing: 0px;
                line-height: 1;
                font-weight: bold;
                color: #303131;
            }
            section#content .detail >h3 {
                font-size: 1.5rem;
            }
            section#content .left-img>img {
                width: 100%;
                max-height: 250px;
                margin-left: 0%;
            }
            section#content .detail {
                width: 100%;
                margin-left: 0%;
            }
            section#content .detail >h4 {
                padding-top: 0px;
                line-height: 1.5;
                font-size: 1.5rem;
            }
            footer >ul {
                display: flex;
                font-size: 1rem;
                padding-left: 0px !important;
                /* font-weight: bold; */
            }
            footer >ul>li {
                padding: 10px 5px;
                list-style: none;
                color: #fff;
            }
            footer >p {
                font-size: 12px;
            }
        }


        /*sign up modal style*/
        #signupModal .modal-header,#signinModal .modal-header{
            background-color: #395a80;
            padding: 10px !important;
        }
        #signupModal .modal-header .modal-title>a,
        #signinModal .modal-header .modal-title>a{
            text-decoration: none;
            color: #fff !important;
            margin-right: 5px;
        }
        #signupModal .modal-header .modal-title>button,
        #signinModal .modal-header .modal-title>button{
            margin-right: 5px;
        }
        #signupModal .modal-body >div> h4,
        #signinModal .modal-body >div> h4{
            text-align: center;
            padding: 5px 0px;
            background-color: #bcd2ee;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            color: #fff;
            font-size: 24px;
        }
        .modal-dialog {
            max-width: 470px !important;
            margin: 200px auto !important;
        }
        .form-horizontal .control-label {
            text-align: right;
            font-size: 9px !important;
            padding-top: 10px !important;
        }
        .modal-footer {
            padding: 15px;
            text-align: right;
            border-top: 0px !important;
        }

        .btn-info1{
            border-top-color: #395a80 !important;
            border-left-color: #395a80 !important;
            background-color: #395a80 !important;
        }
        .labelpwd{
            color: #a94442 !important;
        }
    </style>
@endsection

@section('javascript')
    <script>
        $('#signup').click(function(){
            $('#signup_email_2').val($('#signup_email_1').val());
            $('#signupModal').modal("show");
        });
    </script>
@endsection