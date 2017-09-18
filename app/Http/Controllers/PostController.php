<?php

namespace App\Http\Controllers;

use App\discussion;
use App\Events\SendFcmNotification;
use App\Notification;
use App\post;
use App\thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $thread = new thread();
        $thread->title = $request['title'];
        $thread->text = $request['text'];
        if (strpos($request['text'], '</a>') !== false) {
            $thread->is_link=1;
        }
        if (strpos($request['text'], '</img>') !== false) {
            $thread->is_chart=1;
        }
        $thread->user_id = $request->user()->id;
        $thread->slug = $request['slug'];
        $thread->save();

        $discussion=new discussion();
        $discussion->forum=$request['slug'];
        $discussion->d_title=$request['title'];
        $discussion->fk_thread=$thread->id;

        $discussion->save();
        $user=User::find($request->user()->id);
        $user->u_posts=$user->u_posts+1;
        $user->save();

//        $post = new post();
//        $temp=$request['text'];
//        $temp=str_replace('disabled=""',' ',$temp);
//       // $temp=str_replace('data-toggle=""','data-toggle="collapse"',$temp);
//       // $temp=str_replace('></a>','>here</a>',$temp);
//        $post->text = $temp;
//        $post->thread_id = $request['thread_id'];
//        $post->user_id = $request->user()->id;
//        if(isset($request['parrent_id']))
//        $post->parrent=$request['parrent_id'];
//
//        $post->save();
       // <a style="padding-left:49%;cursor:pointer; background-color:white;" href="" data-toggle="collapse"></a>
        //<a style="padding-left:49%;cursor:pointer; background-color:white;" href="" data-toggle="collapse"></a>
    //demo46131504629205985
       // dd($request,$temp);
        //sending notification
//        try{
//        $thread = thread::find($post->thread_id);
//        $thread->load(['user']);
//        $message['token'] = $thread->user->fcm_token;
//        if($message['token']) {
//            $message['title'] = Auth::user()->first_name . ' reply on your thread';
//            $message['body'] = (thread::find($post->thread_id)->title);
//            event(new SendFcmNotification($message));
//
//            //saving to database
//            $notification = new Notification();
//            $notification->user_id = $thread->user->id;
//            $notification->title = $message['title'];
//            $notification->body = $message['body'];
//            $notification->from_id = Auth::id();
//            $notification->thread_id = $post->thread_id;
//            $notification->save();
//        }
//        } catch (Exception $e)
//        {
//            return back();
//        }

        return redirect(route('home',$thread->slug).'/'.$thread->id);
    }


    public function show($id)
    {
        $user = Auth::user();
        $thread = thread::find($id);
        $thread->load(['user']);
        $posts = post::where('thread_id',$id)->get();
        $posts->load(['user']);
        //dd($thread);
        return view('posts')
            ->with('user',$user)
            ->with('posts',$posts)
            ->with('thread',$thread);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = post::find($id);
        $post->text = $request['text'];
        $post->update();
        return redirect(route('posts.show', $request['thread_id']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect(route('posts.show',request()->thread_id));
    }
}







    
