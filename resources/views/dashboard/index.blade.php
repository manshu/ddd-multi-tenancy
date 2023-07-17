@extends('layouts.app')
@section('content')
    <div>I am dashboard</div>
    <div>
        <a href="{{ route('tenant.logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    </div>
@endsection
