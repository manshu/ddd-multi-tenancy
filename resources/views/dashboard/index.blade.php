@extends('layouts.app')
@section('content')
<div>I am dashboard</div>
<div>
    <a href="{{ route('tenant.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('tenant.logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
@endsection
