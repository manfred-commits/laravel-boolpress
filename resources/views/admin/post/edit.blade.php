@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">



                <form action="{{route('admin.posts.update',$post)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" name="title">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Insert title" value="{{$post['title']}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2" name="content">Contet</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea2" rows="3" placeholder="Insert Content of the post">{{$post['content']}}</textarea>
                    </div>
                    
                    <button class="btn-primary btn px-3" type="submit">Update Post</button>
                </form>








                {{-- <div class="card-header d-flex justify-content-between">
                    {{ __('Dashboard') }} of {{$post['title']}}
                    <a href="{{route('admin.posts.index')}}">Back to previous section </a>
                </div>

                <div class="card-body">                    
                    <div class="post-container">
                        <h4><strong>Title:</strong> {{$post['title']}}</h4>
                        <h4><strong>Slug:</strong> {{$post['slug']}}</h4>
                        <h4><strong>Content:</strong> <br>{{$post['content']}}</h4>
                        
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>
</div>
@endsection