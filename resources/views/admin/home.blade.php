@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <ul class="list-group mt-3 ">
                        <li class="list-group-item">
                            <a href="{{route('admin.posts.index')}}"><h4>Access post section</h4></a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.posts.index')}}"><h4>Something</h4></a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.posts.index')}}"><h4>Something</h4></a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('admin.posts.index')}}"><h4>Something</h4></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
