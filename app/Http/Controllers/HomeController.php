<?php

namespace App\Http\Controllers;

use App\favourite;
use App\forum;
use App\like;
use App\post;
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
    { //dd($forum_id,$thread_id);

        $user = Auth::user();
        $user->load(['notifications']);
        $forums=forum::all();
        $follows=favourite::where('f_user_id','=',1)->get();
        //$follows->load(['following','following.threads']);
       // foreach ($follows as $follow)
           // dd($follow->threads->like);
        $home_thread=thread::withCount('like')->get();
        return view('home')
            ->with('home_thread',$home_thread)
            ->with('slug',$forum_id)
            ->with('forums',$forums);

    }
//    public function index($forum_id=null,$thread_id=null)
//    { //dd($forum_id,$thread_id);
//
//		$user = Auth::user();
//        $user->load(['notifications']);
//		$follows=$user;
//        $follows->load(['following','following.threads','following.threads.posts']);
//
//        if($forum_id)
//        {
////            $form_threads =DB::select(DB::raw("select * from discussions join (select threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at,threads.slug as slug, threads.updated_at as t_updated_at, users.id as t_user_id, users.first_name AS t_first_name,users.img as t_img, users.last_name as t_last_name from threads join users on users.id=threads.user_id)t2 on discussions.fk_thread=t2.t_id where discussions.forum='".$forum_id."' order by discussions.d_title ASC"));
//            $form_threads =DB::select(DB::raw("SELECT *,count(t3.t_id) as c_like from likes right join (select * from discussions join (select threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at,threads.slug as slug, threads.updated_at as t_updated_at, users.id as t_user_id, users.first_name AS t_first_name,users.img as t_img,users.u_posts as u_posts, users.last_name as t_last_name from threads join users on users.id=threads.user_id)t2 on discussions.fk_thread=t2.t_id where discussions.forum='".$forum_id."' order by discussions.d_title ASC)t3 on likes.thread_id=t3.t_id and likes.user_id= '".$user->id."' GROUP by t3.t_id "));
////            dd($form_threads );
//
//			$charts=DB::select(DB::raw("SELECT *,count(t2.t_id) as c_like from likes right join ( SELECT * from (select threads.id as t_id, threads.slug as slug,threads.title as t_title,posts.id as p_id,posts.text as p_text, posts.thread_id as thread_id, posts.created_at as p_created_at, posts.updated_at as p_updated_at, posts.user_id as p_user_id,substring(cast(posts.text as CHAR),LOCATE('<img',cast(posts.text as CHAR)),LOCATE('\> ',cast(posts.text as CHAR))-LOCATE('%<img%',cast(posts.text as CHAR))+2) as link from posts join threads on threads.id=posts.thread_id WHERE posts.text like ' %<img % ' and threads.slug='".$forum_id."') t1 join users on t1.p_user_id = users.id)t2 on likes.thread_id=t2.t_id and likes.user_id= ".$user->id.' GROUP by t2.t_id'));
//			$charts_t=DB::select(DB::raw("SELECT *,count(t2.t_id) as c_like from likes right join ( SELECT * from (select threads.slug as slug,threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at, threads.updated_at as 't_updated_at',threads.user_id as t_user_id,substring(cast(text as CHAR),LOCATE('<img',cast(text as CHAR)),LOCATE('\">',cast(text as CHAR))-LOCATE('<img',cast(text as CHAR))+2) as link from threads WHERE text like '%<img%' and threads.slug='".$forum_id."') t1 join users on t1.t_user_id = users.id )t2 on likes.thread_id=t2.t_id and likes.user_id= ".$user->id.' GROUP by t2.t_id'));
//			$links=DB::select(DB::raw("SELECT *,count(t2.t_id) as c_like from likes right join ( SELECT * from (select threads.id as t_id,threads.slug as slug,threads.title as t_title,posts.id as p_id,posts.text as p_text, posts.thread_id as thread_id, posts.created_at as p_created_at, posts.updated_at as p_updated_at, posts.user_id as p_user_id,substring(cast(posts.text as CHAR),LOCATE('<a',cast(posts.text as CHAR)),LOCATE('</a>',cast(posts.text as CHAR))-LOCATE('<a',cast(posts.text as CHAR))+4) as link from posts join threads on threads.id=posts.thread_id  WHERE posts.text like '%<a%' and threads.slug='".$forum_id."') t1 join users on t1.p_user_id = users.id)t2 on likes.thread_id=t2.t_id and likes.user_id= ".$user->id.' GROUP by t2.t_id'));
//			$links_t=DB::select(DB::raw("SELECT *,count(t2.t_id) as c_like from likes right join ( SELECT * from (select threads.slug as slug,threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at, threads.updated_at as 't_updated_at',threads.user_id as t_user_id,substring(cast(text as CHAR),LOCATE('<a',cast(text as CHAR)),LOCATE('</a>',cast(text as CHAR))-LOCATE('<a',cast(text as CHAR))+4) as link from threads WHERE text like '%<a%' and threads.slug='".$forum_id."') t1 join users on t1.t_user_id = users.id )t2 on likes.thread_id=t2.t_id and likes.user_id= ".$user->id.' GROUP by t2.t_id'));
//
//        }
//        else
//        {
//            $threads =  thread::all();
//            //$threads=DB::table('threads')->leftjoin('likes','likes.thread_id','threads.id');
//            $charts=DB::select(DB::raw("SELECT *,count(t2.t_id) as c_like from likes right join ( SELECT * from (select threads.id as t_id, threads.slug as slug,threads.title as t_title,posts.id as p_id,posts.text as p_text, posts.thread_id as thread_id, posts.created_at as p_created_at, posts.updated_at as p_updated_at, posts.user_id as p_user_id,substring(cast(posts.text as CHAR),LOCATE('<img',cast(posts.text as CHAR)),LOCATE('\">',cast(posts.text as CHAR))-LOCATE('<img',cast(posts.text as CHAR))+2) as link from posts join threads on threads.id=posts.thread_id  WHERE posts.text like '%<img%') t1 join users on t1.p_user_id = users.id)t2 on likes.thread_id=t2.t_id and likes.user_id= ".$user->id.' GROUP by t2.t_id'));
//			$charts_t=DB::select(DB::raw(" SELECT *,count(t2.t_id) as c_like from likes right join ( SELECT * from (select threads.slug as slug,threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at, threads.updated_at as 't_updated_at',threads.user_id as t_user_id,substring(cast(text as CHAR),LOCATE('<img',cast(text as CHAR)),LOCATE('\">',cast(text as CHAR))-LOCATE('<img',cast(text as CHAR))+2) as link from threads WHERE text like '%<img%') t1 join users on t1.t_user_id = users.id )t2 on likes.thread_id=t2.t_id and likes.user_id= ".$user->id.' GROUP by t2.t_id'));
//			$links=DB::select(DB::raw("SELECT *,count(t2.t_id) as c_like from likes right join ( SELECT * from (select threads.id as t_id, threads.slug as slug, threads.title as t_title,posts.id as p_id,posts.text as p_text, posts.thread_id as thread_id, posts.created_at as p_created_at, posts.updated_at as p_updated_at, posts.user_id as p_user_id,substring(cast(posts.text as CHAR),LOCATE('<a',cast(posts.text as CHAR)),LOCATE('</a>',cast(posts.text as CHAR))-LOCATE('<a',cast(posts.text as CHAR))+4) as link from posts join threads on threads.id=posts.thread_id  WHERE posts.text like '%<a%') t1 join users on t1.p_user_id = users.id )t2 on likes.thread_id=t2.t_id and likes.user_id= ".$user->id.' GROUP by t2.t_id'));
//			$links_t=DB::select(DB::raw("SELECT *,count(t2.t_id) as c_like from likes right join ( SELECT * from (select threads.slug as slug, threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at, threads.updated_at as 't_updated_at',threads.user_id as t_user_id,substring(cast(text as CHAR),LOCATE('<a',cast(text as CHAR)),LOCATE('</a>',cast(text as CHAR))-LOCATE('<a',cast(text as CHAR))+4) as link from threads WHERE text like '%<a%') t1 join users on t1.t_user_id = users.id )t2 on likes.thread_id=t2.t_id and likes.user_id= ".$user->id.' GROUP by t2.t_id'));
//        }
//
//        if(isset($threads))
//        {
//            $threads->load(['user']);
//            $threads->load(['posts']);
//        }
//        //dd($threads->posts);
//      // dd($follows);
//        if($thread_id)
//        {
//            $temp_thread=thread::find($thread_id);
//           // dd($temp_thread);
//            $posts =DB::select(DB::raw("SELECT *,count(t3.t_id) as c_like from likes right join (select * from discussions join (select threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at,threads.slug as slug, threads.updated_at as t_updated_at, users.id as t_user_id, users.first_name AS t_first_name,users.img as t_img,users.u_posts as u_posts, users.last_name as t_last_name from threads join users on users.id=threads.user_id)t2 on discussions.fk_thread=t2.t_id where discussions.d_title='".$temp_thread->title."' order by discussions.d_title ASC)t3 on likes.thread_id=t3.t_id and likes.user_id= '".$user->id."' GROUP by t3.t_id "));
////            $posts =DB::select(DB::raw("select * from discussions join (select threads.id as t_id, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at,threads.slug as slug, threads.updated_at as t_updated_at, users.id as t_user_id, users.first_name AS t_first_name,users.img as t_img, users.last_name as t_last_name from threads join users on users.id=threads.user_id)t2 on discussions.fk_thread=t2.t_id where discussions.d_title='".$temp_thread->title."' order by discussions.d_title ASC"));
//
////            $posts=DB::select(DB::raw('SELECT * from likes right join ( select * from (select posts.parrent as parrent, posts.id as p_id,posts.text as p_text, posts.thread_id as thread_id, posts.created_at as p_created_at, posts.updated_at as p_updated_at, posts.user_id as p_user_id,users.img as p_img, users.first_name as p_first_name, users.last_name as p_last_name , users.u_posts  from posts JOIN users on posts.user_id=users.id) t_posts JOIN (select threads.id as t_id,threads.slug as slug, threads.title as t_title, threads.text as t_text, threads.created_at as t_created_at, threads.updated_at as \'t_updated_at\', users.id as t_user_id, users.first_name AS t_first_name,users.img as t_img, users.last_name as t_last_name from threads join users on users.id=threads.user_id where threads.id="'.$thread_id.'") t_threads ON t_posts.thread_id= t_threads.t_id  order by t_posts.p_updated_at DESC, t_posts.parrent ASC )t2 on likes.post_id=t2.p_id and likes.user_id= '.$user->id));
////            dd($posts);
//            $thread = thread::where('id',$thread_id)->first();
//            $thread->load(['user']);
//
//            return view('home')
//                ->with("links",$links)
//				->with("user",$user)
//                ->with("follows",$follows)
//                ->with('posts',$posts)
//                ->with('slug',$forum_id)
//                ->with('thread',$thread)
//                ->with('charts',$charts)
//				->with('charts_t',$charts_t)
//                ->with('links_t',$links_t);
//        }
//        elseif($forum_id)
//        {
//            return view('home')
//                ->with("links",$links)
//				->with("user",$user)
//                ->with("follows",$follows)
//                ->with('slug',$forum_id)
//				->with('charts',$charts)
//                ->with('charts_t',$charts_t)
//                ->with('links_t',$links_t)
//                ->with('forum_threads',$form_threads);
//
//        }
//        else
//        {
//            return view('home')
//            ->with('threads',$threads)
//            ->with("links",$links)
//            ->with("user",$user)
//            ->with("follows",$follows)
//            ->with('slug',$forum_id)
//            ->with('charts',$charts)
//            ->with('charts_t',$charts_t)
//            ->with('links_t',$links_t);
//        }
//    }
//SET sql_mode = '' ;

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
            if($request->type == 'thread' )
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
            else if ($request->type == 'post')
            {
                $like=like::where('user_id','=',$user->id)->where('post_id','=',$request->id)->get();
                if($like->isEmpty())
                {
                    $like2=new like();
                    $like2->user_id=$user->id;
//                    $post=post::where('id','=',$request->id)->first();
                    // dd($post);
                    $like2->thread_id=$request->id;
                   // $like2->post_id=$request->id;

                    $like2->save();
                    return \response('add to like success',200);
                }
                else
                {
                    $like=like::where('user_id','=',$user->id)->where('post_id','=',$request->id)->get();
                    $like->delete();
                    return \response('unliked success',200);
                }


            }
            else
            {
                return \response('add to like failed',500);

            }

        }
        else
            return \response('add to like failed',500);
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