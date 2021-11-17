@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12 col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Dashboard') }} of all posts
                    <a href="{{route('admin.posts.create')}}" class="align-self-center">
                        <button class="btn-primary btn px-3">Crea Post</button>                            
                    </a>

                </div>
                {{-- success message --}}
                @if ($message = Session::get('success'))
                <div class="my-3 alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <div class="card-body">
                    @foreach ($posts as $post)
                        <div class="post-container pt-2 pb-2 mb-5 d-lg-flex flex-wrap align-items-start">
                            <h4 class="col col-lg-1"><strong>Title:</strong><br> {{$post['title']}}</h4>
                            <h4 class="col col-lg-1"><strong>Slug:</strong><br> {{$post['slug']}}</h4>
                            <h4 class="col col-lg-6"><strong>Content:</strong> <br>{{$post['content']}}</h4>
                            <h4 class="col col-lg-2"><strong>Category:</strong><br> {{isset($post['category']['name']) ? $post['category']['name'] : ""}}</h4>                            
                            <div class="btns d-flex flex-column align-items-center">
                                <a href="{{route('admin.posts.show',$post['id'])}}" class="m-1">
                                    <button class="btn-primary btn px-3">Visualizza Post</button>                            
                                </a>
                                <a href="{{route('admin.posts.edit',$post['id'])}}" class="m-1">
                                    <button class="btn-warning btn px-3">Modifica Post</button>                            
                                </a>
                                <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger btn px-3">Elimina Post</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection