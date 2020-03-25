{{--@extends('layouts.admin')--}}


{{--@section('content')--}}


{{--    <h1>Create Users</h1>--}}


{{--     {!! Form::open(['method'=>'POST', 'action'=> 'AdminUsersController@store','files'=>true]) !!}--}}


{{--      <div class="form-group">--}}
{{--             {!! Form::label('name', 'Name:') !!}--}}
{{--             {!! Form::text('name', null, ['class'=>'form-control'])!!}--}}
{{--       </div>--}}


{{--       <div class="form-group">--}}
{{--        {!! Form::label('email', 'Email:') !!}--}}
{{--        {!! Form::email('email', null, ['class'=>'form-control'])!!}--}}
{{--       </div>--}}

{{--        <div class="form-group">--}}
{{--            {!! Form::label('role_id', 'Role:') !!}--}}
{{--            {!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control'])!!}--}}
{{--        </div>--}}


{{--        <div class="form-group">--}}
{{--            {!! Form::label('is_active', 'Status:') !!}--}}
{{--            {!! Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), 0 , ['class'=>'form-control'])!!}--}}
{{--         </div>--}}


{{--        <div class="form-group">--}}
{{--            {!! Form::label('photo_id', 'Photo:') !!}--}}
{{--            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}--}}
{{--         </div>--}}


{{--        <div class="form-group">--}}
{{--            {!! Form::label('password', 'Password:') !!}--}}
{{--            {!! Form::password('password', ['class'=>'form-control'])!!}--}}
{{--         </div>--}}


{{--         <div class="form-group">--}}
{{--            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}--}}
{{--         </div>--}}

{{--       {!! Form::close() !!}--}}


{{--    @include('includes.form_error')--}}


{{-- @stop--}}

@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1>User Create Form</h1>

        <div class="row">


            {!! Form::open(['action' => 'admin\AdminUserController@store', 'method' => 'post', 'files'=>true]) !!}

            <div class="form-group col-md-8">

                {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}

                @error('name')
                {!! Form::text('name', null, ['class' => 'form-control is-invalid']) !!}
                <div class="alert alert-danger">{{ $message }}</div>
                @else
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @enderror

            </div>
            <div class="form-group col-md-8">

                {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}

                @error('email')

                {!! Form::text('email', null, ['class' => 'form-control is-invalid']) !!}

                <div class="alert alert-danger">{{ $message }}</div>

                @else
                {!! Form::text('email', null, ['class' => 'form-control' , 'placeholder'=>'']) !!}
                    @enderror



            </div>
            <div class="form-group col-md-8">



                {!! Form::label('role_id', 'Role', ['class' => 'control-label']) !!}

                @error('role_id')
                {!! Form::select('role_id', [''=>'Choose Role'] + $roles , null , ['class' => 'form-control is-invalid']) !!}

                <div class="alert alert-danger">{{ $message }}</div>

                @else
                {!! Form::select('role_id', [''=>'Choose Role'] + $roles , null , ['class' => 'form-control']) !!}
                    @enderror

            </div>

            <div class="form-group col-md-8">

                {!! Form::label('is_active', 'Status', ['class' => 'control-label']) !!}

                @error('is_active')
                {!! Form::select('is_active', [ 0 =>'Inactive', 1 => 'Active'] , null , ['class' => 'form-control is-invalid']) !!}
                <div class="alert alert-danger">{{ $message }}</div>
                @else

                {!! Form::select('is_active', [ 0 =>'Inactive', 1 => 'Active'] , null , ['class' => 'form-control']) !!}

                    @enderror

            </div>


            <div class="form-group col-md-8">
                {!! Form::file('file', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-8">

                {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}

                @error('password')
                {!! Form::password('password', ['class' => 'form-control is-invalid']) !!}

                <div class="alert alert-danger">{{ $message }}</div>
                @else

                {!! Form::password('password', ['class' => 'form-control']) !!}
                    @enderror

            </div>



            {!! Form::submit('Submit', ['class' => 'form-control btn-sm btn-primary ']) !!}

            {!! Form::close() !!}


        </div>



    </div>

@endsection
