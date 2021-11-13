@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} of all posts</div>

                <div class="card-body">
                    @foreach ($posts as $post)
                        <div class="post-container pt-2 pb-2 mb-5 d-md-flex align-items-start">
                            <h4 class="mx-2"><strong>Title:</strong><br> {{$post['title']}}</h4>
                            <h4 class="mx-2"><strong>Slug:</strong><br> {{$post['slug']}}</h4>
                            <h4 class="mx-2"><strong>Content:</strong> <br>{{$post['content']}}</h4>
                            <a href="{{route('admin.posts.show',$post['id'])}}" class="align-self-center">
                                <button class="btn-primary btn px-3">Visualizza Post</button>                            
                            </a>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection