@extends('layouts.admin')

@section('content')

    <h1>Comments</h1>

@if(count($comments) > 0)


    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($comments as $comment)
            <td>{{$comment->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="{{route('home.post', $comment->post->id)}}">View post</a></td>
                <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a></td>
                <td>
                    @if($comment->is_active == 1)
                        {!! Form::open(['method' => 'PATCH','action' => ['PostsCommentController@update',$comment->id]]) !!}
                        <input type="hidden" name="is_active" value="0">

                        <div class="form-group">
                            {!! Form::submit('Un-approve',['class' => 'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}

                        @else
                        {!! Form::open(['method' => 'PATCH','action' => ['PostsCommentController@update',$comment->id]]) !!}
                        <input type="hidden" name="is_active" value="1">

                        <div class="form-group">
                            {!! Form::submit('Approve',['class' => 'btn btn-info']) !!}
                        </div>
                        {!! Form::close() !!}
                        @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','action' => ['PostsCommentController@destroy',$comment->id]]) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <h1 class="text-center">No Comments</h1>

    @endif

@stop
