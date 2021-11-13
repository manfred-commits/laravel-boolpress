@extends('layouts.guest')

@section('guestContent')
<div class="flex-center align-items-start position-ref full-height">
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
        
        <div class="links col-12 mx-auto my-3 d-flex">
            @if (Route::has('login'))
                
                @auth
                    
                <a class="dropdown-item" href="{{route('admin.home') }}">Go to Back Office</a>

                {{-- logout link --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> 

                @else
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    @endif
                    <a class="dropdown-item" href="{{route('admin.home') }}">Go to Back Office</a>

                    
                @endauth
                
            @endif
        </div>
        <div class="card mx-1 d-flex flex-grow-1" style="width: 18rem;">
            <div class="card-body d-flex flex-column">
                <img class="card-img-top col-4 mx-auto" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17d1a0e9f00%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17d1a0e9f00%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.2203125%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                <h5 class="card-title">{{$post['title']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$post['slug']}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">{{$post->created_at->diffForHumans()}}</h6>
                <p class="card-text">{{$post['content']}}</p>
                <a href="{{route('blog.index')}}" class="m-1 d-flex flex-grow-1 justify-content-center align-items-end">
                    <button class="btn-primary btn px-3">Torna alla pagina precedente</button>                            
                </a>
            </div>
        </div>




    </div>


</div>
@endsection