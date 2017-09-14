<?php

namespace App\Http\Controllers;

use App\discussion;
use App\favourite;
use App\forum;
use App\like;
use App\post;
use App\stat;
use App\thread;
use App\User;			 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


     /* Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($forum_id=null,$thread_id=null)
    {
        //dd($forum_id,$thread_id);





        $user = Auth::user();
        $user->load(['notifications']);
        $forums=forum::where('type','=','forum')->get();
        $follows=favourite::where('f_user_id','=',1)->get();
        if(isset($thread_id) && $thread_id != null)
        {
            $home_thread=thread::withCount('like')->withCount('like_user')->get();
            $charts=thread::withCount('like')->withCount('like_user')->where('is_chart',1)->get();
            $links=thread::withCount('like')->withCount('like_user')->where('is_link',1)->get();
            $temp_thread=thread::where('id',$thread_id)->first();
            $single=thread::where('title',$temp_thread->title)->withCount('like')->withCount('like_user')->get();
            //dd($single);
            return view('home')
                ->with('single',$single)
                ->with('charts',$charts)
                ->with('links',$links)
                ->with('home_thread',$home_thread)
                ->with('slug',$forum_id)
                ->with('forums',$forums);
        }
        elseif(isset($forum_id) && $forum_id != null)
        {
            $follows=favourite::where('f_user_id','=',$user->id)->get();
            $forum_threads=thread::withCount('like')->withCount('like_user')->where('slug',$forum_id)->get();
            $home_thread=thread::withCount('like')->withCount('like_user')->get();
            $charts=thread::withCount('like')->withCount('like_user')->where('is_chart',1)->where('slug',$forum_id)->get();
            $links=thread::withCount('like')->withCount('like_user')->where('is_link',1)->where('slug',$forum_id)->get();
            return view('home')
                ->with('follows',$follows)
                ->with('forum_threads',$forum_threads)
                ->with('charts',$charts)
                ->with('links',$links)
                ->with('home_thread',$home_thread)
                ->with('slug',$forum_id)
                ->with('forums',$forums);
        }
        else
        {
            $home_thread=thread::withCount('like')->withCount('like_user')->get();
            $charts=thread::withCount('like')->withCount('like_user')->where('is_chart',1)->get();
            $links=thread::withCount('like')->withCount('like_user')->where('is_link',1)->get();
            return view('home')
                ->with('follows',$follows)
                ->with('charts',$charts)
                ->with('links',$links)
                ->with('home_thread',$home_thread)
                ->with('slug',$forum_id)
                ->with('forums',$forums);
        }


    }
    public function update_token(Request $request){
        $user = Auth::user();
        if($user) {
            $user->fcm_token = $request->token;
            $user->update();
            return response('Token: '.$user->fcm_token,200);
        }
        else
            return response('Guest user are not allowed to use notification service', 500);
    }
    public function like_ajax(Request $request){
        $user=Auth::user();
        if($user)
        {

                $like=like::where('user_id','=',$user->id)->where('thread_id','=',$request->id)->get();
                if($like->isEmpty())
                {
                    $like2=new like();
                    $like2->user_id=$user->id;
                    $like2->thread_id=$request->id;
                    $like2->save();
                    return \response('add to like success',200);
                }
                else
                {
                    $like=like::where('user_id','=',$user->id)->where('thread_id','=',$request->id);
                    $like->delete();
                    return \response('unliked success',200);


                }
        }
        else
        {
            return \response('add to like failed',500);
        }
    }

    public function profile()
    {
	 $user=Auth::user();
        $posts=DB::select(DB::raw('select * from (select posts.id as p_id,posts.text as p_text, posts.thread_id as thread_id, posts.created_at as p_created_at, posts.updated_at as p_updated_at, posts.user_id as p_user_id, users.first_name as p_first_name,users.img as p_img, users.last_name as p_last_name from posts JOIN users on posts.user_id=users.id) t_posts JOIN (select threads.slug as slug,threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at, threads.updated_at as \'t_updated_at\',users.img as t_img, users.id as t_user_id, users.first_name AS t_first_name, users.last_name as t_last_name from threads join users on users.id=threads.user_id) t_threads ON t_posts.thread_id= t_threads.t_id where t_posts.p_user_id="'.$user->id.'" order by t_posts.p_updated_at DESC limit 10 '));
        $created_at=$user->created_at;
        $created_at=$created_at->toFormattedDateString();
        return view('profile')
            ->with('posts',$posts)
            ->with('user',$user)
            ->with('created_at',$created_at);			  
    }
	
	public function follow(Request $request)
    {
        try
        {
            $new= new favourite();
            $new->f_user_id=Auth::id();
            $new->f_follower_id=$request['id'];
            $new->save();
            return response('success',200);
        }
        catch (Exception $e)
        {
            return response('fail',400);
        }

    }
    public function edit_profile(Request $request)
    {
        $user=User::find(Auth::id());
        $user->first_name=$request['fname'];
        $user->last_name=$request['lname'];

        if(isset($request['img']))
        {//dd($request);
            $img_ext = explode('.',$request['img']->getClientOriginalName())[1];
            $request['img']->storeAs('public/profile_images/',Auth::id().'.'.$img_ext);
            $user->img=$img_ext;

        }
        $user->save();
        return redirect(route('profile'));

    }
}