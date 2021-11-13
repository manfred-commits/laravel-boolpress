@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Dashboard') }} of {{$post['title']}}
                    <div class="navigation-links">
                        <a class="mr-2" href="{{route('admin.posts.index')}}">Back to previous section </a>
                        <a href="{{route('admin.posts.edit',$post['id'])}}" class="align-self-center">
                            Modifica Post                          
                        </a>
                    </div>
                </div>

                <div class="card-body">                    
                    <div class="post-container">
                        <h4><strong>Title:</strong> {{$post['title']}}</h4>
                        <h4><strong>Slug:</strong> {{$post['slug']}}</h4>
                        <h4><strong>Content:</strong> <br>{{$post['content']}}</h4>                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection