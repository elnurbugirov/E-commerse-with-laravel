@extends('layouts.admin')

@section('content')
    <h1>Replies</h1>
    @if($replies)
        @foreach($replies as $reply)
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
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">View post</a></td>
                    <td>
                        @if($reply->is_active == 1)
                            {!! Form::open(['method' => 'PATCH','action' => ['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-approve',['class' => 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else
                            {!! Form::open(['method' => 'PATCH','action' => ['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve',['class' => 'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','action' => ['CommentRepliesController@destroy',$reply->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            </table>
        @endforeach
    @else


        <h1 class="text-center">No replies</h1>
    @endif


@stop
