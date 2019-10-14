@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

       </div>

    <div class="col-sm-6">
        @if($categories)
                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Created date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at ? \Carbon\Carbon::parse($category->created_at)->diffForHumans() : 'no date'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
    </div>

@stop
