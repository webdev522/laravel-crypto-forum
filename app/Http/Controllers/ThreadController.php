<?php

namespace App\Http\Controllers;

use App\discussion;
use App\thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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


        return redirect(route('home',$thread->slug));
    }


    public function show($id)
    {
        $threads= thread::where('slug',$id)->get();
        $threads->load(['user']);
        return view('threads')
            ->with('user',Auth::user())
            ->with('threads',$threads);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
