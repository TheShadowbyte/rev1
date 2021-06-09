@extends('user-profile-layout')

@section('content')

    <h1> {{ $user->name }} </h1>

    <h3>User Signature</h3>
    <hr>
    {!! $user_signature->content !!}

@endsection
