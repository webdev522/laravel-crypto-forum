@extends('layouts.app')

@section('content')
   <div class="container-fluid">
       <div class="row">
           @include('shared.nav_ver')

           <div class="col-md-8 col-sm-12 col-xs-12" style="background-color: #fff;padding: 0;">
               <div class="profile_p">

                   <div class="header"></div>

                   <div class="row" style="margin-right: 0px;margin-left: 0px;">
                       <div class="col-md-12" style="">
                           <div class="col-md-5 profile_p-img">
                               <img class="img-responsive img-circle" src=" {{($user->img)? config('app.url')."storage/profile_images/".$user->id.".".$user->img:asset('assets/img/user_profile.png')}}">
                               <div class="text">
                                   <h2>{{($user->first_name)?$user->first_name:" "}}{{' '}}{{($user->last_name)?$user->last_name:" "}}</h2>

                               </div>
                           </div>
                       </div>
                   </div>

                   <div class="main-content ">
                    <div class="row" style="margin-right: 0px;margin-left: 0px;">
                        <div class="col-md-12" style="background-color:#fff;height: 105px;">
                            <div class="col-md-4 col-sm-6 col-xs-12" style="padding:10px 30px;"> <p class="pull-right">Joined <br> Date: {{$created_at}}  </p></div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <button style="margin-top: 10px;"class="btn-edit-profile btn btn-info btn-md pull-right">Edit Profile</button>
                            </div>

                        </div>
                    </div>


                   @foreach($posts as $post)
                       <div class="row" style="margin-right: 0px;margin-left: 0px;">
                           <div class="col-md-12" style="background-color:#fff;">
                               {{--<div class="col-md-4" style=""> </div>--}}
                               <div class="col-md-8 col-sm-12 col-xs-12 " style="">
                                   <div class="col-md-2 col-xs-4 com" style="">
                                       <img class="img-responsive img-circle" src="{{($post->t_img)? config('app.url')."storage/profile_images/".$post->t_user_id.".".$post->t_img:asset('assets/img/user_profile.png')}}">
                                   </div>
                                   <div class="col-md-10 col-sm-10 " style="">
                                       <p> <a href="{{route('home',$post->thread_id)}}">{{$post->t_title}}</a> <br>
                                           @if($post->p_user_id == $post->t_user_id)
                                               {{($user->first_name)?$user->first_name:" "}}{{' '}}{{($user->last_name)?$user->last_name:" "}} is started a new converstation
                                           @else
                                               {{($post->p_first_name)?$post->p_first_name:" "}}{{' '}}{{($post->p_last_name)?$post->p_last_name:" "}} replied to {{($post->t_first_name)?$post->t_first_name:" "}}{{' '}}{{($post->t_last_name)?$post->t_last_name:" "}}'s conversation  </p>
                                       @endif
                                       <p>{!!$post->p_text!!}</p>

                                       <div class="col-md-4" style=""> <a > {{$post->p_updated_at}}</a> </div>
                                       {{--<div class="col-md-4" style=""> <a href="#"> 253 replies </a> </div>--}}

                                   </div>
                                   <hr><br>


                               </div>
                           </div>
                       </div>

                        <hr>
                    @endforeach

                   </div>

                   <div class="edit_profile hide" style="background-color:#fff;">


                       <form action="edit_profile" enctype="multipart/form-data" method="post" style="margin-top: 100px;">
                            {{csrf_field()}}
                           <div class="col-md-offset-2 col-md-8">
                               <div class="form-group">
                                   <label for="firstname">First Name</label>
                                   <input type="text" name="fname" class="form-control" value="{{$user->first_name}}" placeholder="Enter First Name">
                               </div>
                               <div class="form-group">
                                   <label for="lastname">Last Name</label>
                                   <input type="text" class="form-control"  value="{{$user->last_name}}"   name="lname" placeholder="Enter Last Name">
                               </div>


                               {{--<div class="form-group">--}}
                                   {{--<label for="pws">Password</label>--}}
                                   {{--<input type="password" class="form-control" placeholder="Enter New Password">--}}
                               {{--</div>--}}

                               <div class="form-group">
                                   <label for="change-picture">Change Profile Picture</label>
                                   <input type="file" name="img" class="form-control" placeholder="Change Profile Picture">
                               </div>

                               <div class="form-group">
                                   <button class="btn-cancle-edit btn btn-info btn-md pull-left">Cancel</button>
                                  <button type="submit" class="btn btn-info btn-md pull-right">Save</button>
                               </div>

                           </div>



                       </form>

                   </div>

               </div> <!-- end col-md-10 -->
       </div>





   </div>
    <!-- script  -->

    <script src="assets/dist/js/bootstrap-select.js"></script>

       <script>
           $(document).ready(function(){
               $('.btn-edit-profile').click(function(){
                   $('.edit_profile').removeClass('hide');
                   $('.main-content').addClass('hide');
               });

               ('.btn-cancle-edit').click(function(){
                   $('.edit_profile').addClass('hide');
                   $('.main-content').removeClass('hide');
               });
           });
       </script>
@endsection