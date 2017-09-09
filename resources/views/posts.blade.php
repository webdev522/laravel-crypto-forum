@extends('layouts.app')

@section('css')
    <style>
        .row{
            margin: 0px !important;
        }
        .panel-table .panel-body{
            padding:10px 0px;
            margin: 0px 10px;
        }

        label {

            font-weight: normal !important;
        }

        .panel-table .panel-body .table-bordered{
            border-style: none;
            margin:0;
        }

        .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
        .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
            border-right: 0px;
        }

        .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
        .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
            border-left: 0px;
        }

        .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
            border-bottom: 0px;
        }

        .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
            border-top: 0px;
        }

        .panel-table .panel-footer .pagination{
            margin:0;
        }

        /*
        used to vertically center elements, may need modification if you're not using default sizes.
        */
        .panel-table .panel-footer .col{
            line-height: 34px;
            height: 34px;
        }

        .panel-table .panel-heading .col h3{
            line-height: 30px;
            height: 30px;
        }

        .panel-table .panel-body .table-bordered > tbody > tr > td{
            line-height: 34px;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title"><b>Thread: </b>{{$thread->title}}</h3>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Forum:
                                <a href="{{route('threads.show', $thread->slug)}}"> Open Discussion {{$thread->slug}}</a></label>
                        </div>
                        <div class="col-md-3"> <label>Creator:
                                <a> {{$thread->user->name}}</a></label>
                        </div>
                        <div class="col-md-3"> <label>{{$thread->created_at}} </label></div>
                        <div class="col-md-3"> <label>{{$thread->updated_at}} </label></div>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default" style=" margin-top: 30px;border: 5px solid gray;">
                                    {{--<div class="panel-heading">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col col-xs-6">--}}
                                                {{--<h5 class="panel-title"><a href="">{{$thread->user->name}} </a></h5>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="panel-body">
                                           {!!$thread->text!!}
                                    </div>

                                </div>
                            </div>
                        </div>
                        @foreach($posts as $post)
                            <div class="row">
                                <div class="col-md-1 pull-left" style="margin-top: 30px;">
                                    <img class="img-responsive"src="{{config('app.url')."assets/img/user.png"}}">
                                </div>
                                <div class="col-md-11">
                                    <div class="panel panel-default" style=" margin-top: 30px;">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col col-xs-12">
                                                    <h5 class="panel-title pull-left"><a href="">{{$post->user->name}} </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$post->updated_at}}</h5>
                                                    @if($user->id == $post->user->id)
                                                        <form method="POST" action="{{route('posts.destroy', $post->id)}}">
                                                            {{method_field('delete')}}
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                                            <button class="btn btn-danger pull-right" style="margin-left: 5px;">Delete</button>
                                                        </form>
                                                        <button class="edit-btn btn btn-info pull-right" onclick="edit_box({{$post->id}})">Edit</button>

                                                        <div class="edit-box{{$post->id}} hide">

                                                            <form method="post" action="{{route('posts.update', $post->id)}}">
                                                                {{method_field('put')}}
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                                                <div class="form-group">
                                                                    <div id="sample">
                                                                        <textarea id="summernote{{$post->id}}" name="text">
                                                                            {!!$post->text!!}
                                                                        </textarea>
                                                                        <script>
                                                                            $(document).ready(function() {
                                                                                $('#summernote{{$post->id}}').summernote();
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="edit-close btn btn-danger" onclick="edit_close({{$post->id}})">close</button>
                                                                <button type="submit" class="btn btn-info pull-right " style="">Update</button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            {!!$post->text!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer" style="min-height:55px !important;">
                        <p><button class="reply-btn btn btn-info pull-right">Reply</button></p>
                        <div class="reply-box hide">

                            <form method="POST" action="{{route('posts.store')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                <div class="form-group">
                                    <div id="sample">
                                        <textarea id="summernote" name="text"></textarea>
                                        <script>
                                            $(document).ready(function() {
                                                $('#summernote').summernote();
                                            });
                                        </script>
                                    </div>
                                </div>
                                <button type="button" class="reply-close hide btn btn-danger">close</button>
                                <button type="submit" class="btn btn-info pull-right " style="">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection