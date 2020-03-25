@extends('layouts.admin')




@section('content')


    <h1>Admin</h1>


    @if(session()->has('auth_message'))
    <h1 class="alert-danger">{{session()->get('auth_message') }}</h1>
    @endif




@stop
