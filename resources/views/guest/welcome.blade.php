@extends('layouts.guest')

@section('guestContent')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
            
            @else
                {{-- <a href="{{ route('login') }}">Login</a> --}}

                {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif --}}
            @endauth
        </div>
    @endif

    <div class="content d-flex flex-wrap">
        <div class="title col-12 m-b-md">
            Boolpress
        </div>
        
        <div class="links col mx-auto my-3 d-flex">
            {{-- login condition to be executed in case of validated login --}}
            @if (Route::has('login'))
                
                @auth
                    
                <a class="dropdown-item" href="{{route('admin.home') }}">Go to Back Office</a>
                <a class="dropdown-item" href="{{route('blog.index') }}">Go to Front Office</a>

                {{-- logout link --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> 

                {{-- home menu in case of user not logged in --}}
                @else
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    @endif
                    <a class="dropdown-item" href="{{route('blog.index') }}">Go to Front Office</a>
                    <a class="dropdown-item" href="{{route('admin.home') }}">Go to Back Office</a>

                    
                @endauth
                
            @endif
        </div>
    </div>


</div>
@endsection