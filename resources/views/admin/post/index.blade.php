@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} of all posts</div>

                <div class="card-body">
                    @foreach ($posts as $post)
                        <div class="post-container pt-2 pb-2 mb-5">
                            <h4>Title: {{$post['title']}}</h4>
                            <h4>Slug: {{$post['slug']}}</h4>
                            <h4>Content: <br>{{$post['content']}}</h4>
                            <a href="{{route('admin.posts.show',$post['id'])}}">
                                <button class="btn-primary btn">Visualizza Singolo Post</button>                            
                            </a>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection