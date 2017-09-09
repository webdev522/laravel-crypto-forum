@extends('layouts.app')

@section('inline_style')
    <style>

        .panel-table .panel-body{
            padding:0;
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
                        <div class="col col-xs-12">
                            <button class=" reply-btn btn btn-info pull-right">Create Discussion</button>
                            <h3 class="panel-title">Open Discussion</h3>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead style="border: 1px solid;border-color: #ddd;">
                        <tr>
                            <th class="hidden-xs">Topic</th>
                            <th>Post</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($threads as $thread)
                            <tr>
                                <td class="hidden-xs"><a href="{{route('posts.show',$thread->id)}}"> <strong>{{$thread->title}}</strong></a> <br>
                                    By <a href="">{{$thread->user->name}}</a> on {{$thread->created_at}}
                                </td>
                                <td>4</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="reply-box hide">
                        <!-- form start -->
                        <form method="POST" action="{{route('threads.store')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="slug" value="{{$thread->slug}}">
                            <input type="text" class="form-control" placeholder="Title of Discussion" name="title" style="border: none !important;height:50px;font-size: 20px;">
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
                            <button type="button" class="reply-close btn btn-danger">close</button>
                            <button type="submit" class="btn btn-info pull-right" style="">Send</button>
                        </form>  <!-- form end -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection