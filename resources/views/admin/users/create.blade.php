@extends('layouts.admin')



@section('content')
 <h1>Create Users</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
 <div class="form-group">
     {!! Form::label('email','Email:') !!}
     {!! Form::email('email',null,['class'=>'form-control']) !!}
 </div>
 <div class="form-group">
     {!! Form::label('role_id','Roles:') !!}
     <select class="form-control m-bot15" name="role_id">
         @if ($roles->count())
             @foreach($roles as $role)
                 <option value="{{ $role->id }}" {{ $selectedRole == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>
@endforeach
                 @endif
     </select>
 </div>
 <div class="form-group">
     {!! Form::label('is_active','Status:') !!}
     {!! Form::select('is_active',array(1 =>'Active', 0 =>'Not Active'),0,['class'=>'form-control']) !!}
 </div>
 <div class="form-group">
     {!! Form::label('file','Title:') !!}
     {!! Form::file('file',null,['class'=>'form-control']) !!}
 </div>
 <div class="form-group">
     {!! Form::label('password','Password:') !!}
     {!! Form::password('password',['class' =>'form-control']) !!}
 </div>
    <div class="form-group">
        {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}

 @include('includes.form-error')
    @stop
