{{--@extends('layouts.admin')--}}





{{--@section('content')--}}


{{--    @if(Session::has('deleted_user'))--}}


{{--        <p class="bg-danger">{{session('deleted_user')}}</p>--}}


{{--        @endif--}}


{{--    <h1>Users</h1>--}}


{{--    <table class="table">--}}
{{--       <thead>--}}
{{--         <tr>--}}
{{--             <th>Id</th>--}}
{{--             <th>Photo</th>--}}
{{--             <th>Name</th>--}}
{{--             <th>Email</th>--}}
{{--             <th>Role</th>--}}
{{--             <th>Status</th>--}}
{{--             <th>Created</th>--}}
{{--             <th>Updated</th>--}}
{{--          </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}

{{--        @if($users)--}}


{{--            @foreach($users as $user)--}}


{{--           <tr>--}}
{{--              <td>{{$user->id}}</td>--}}
{{--               <td> <img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>--}}
{{--              <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>--}}
{{--              <td>{{$user->email}}</td>--}}
{{--              <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>--}}
{{--               <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>--}}
{{--              <td>{{$user->created_at->diffForHumans()}}</td>--}}
{{--              <td>{{$user->updated_at->diffForHumans()}}</td>--}}
{{--           </tr>--}}

{{--            @endforeach--}}


{{--          @endif--}}


{{--       </tbody>--}}
{{--     </table>--}}


{{--@stop--}}


@extends('layouts.admin')

@section('content')
<h1>Users.</h1>

@if(session()->has('delete_message'))
<h2 class="alert-danger">{{session()->get('delete_message')}}</h2>
@endif

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
    <tbody>

    @if($users)
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        @if($user->photo_path)
        <td><img height="40px" width="50px" src="{{$user->photo_path}}" alt="user photo"></td>
        @else
            <td>no photo</td>
        @endif
        <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a> </td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 0 ? 'Inactive': 'Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
    </tr>
    @endforeach
    @endif
    </tbody>


</table>

    @endsection
