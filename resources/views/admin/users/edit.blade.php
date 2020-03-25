@extends('layouts.admin')




@section('content')


    <h1>Edit User</h1>


    <div class="row">


        <div class="col-sm-3">


            <img src="{{$user->photo_path ? $user->photo_path : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">


        </div>



        <div class="col-sm-9">


            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['admin\AdminUserController@update', $user->id],'files'=>true]) !!}


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





            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            {!! Form::close() !!}






             {!! Form::open(['method'=>'DELETE', 'action'=> ['admin\AdminUserController@destroy', $user->id]]) !!}



                 <div class="form-group">
                    {!! Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-6']) !!}
                 </div>

               {!! Form::close() !!}




        </div>



    </div>



{{--    <div class="row">--}}

{{--        @include('includes.form_error')--}}


{{--    </div>--}}





@stop
