@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post link</th>
            <th>Comments</th>
            <th>Created_at</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""> </td>
            <td>{{$post->title}}</td>
            <td>{{\Str::limit($post->body, 7)}}</td>
            <td><a href="{{route('home.post',Str::slug($post->slug))}}">View Post</a></td>
            <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
            <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
            <td>{{\Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</td>
        </tr>
        @endforeach
            @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}
        </div>
    </div>

    @stop
