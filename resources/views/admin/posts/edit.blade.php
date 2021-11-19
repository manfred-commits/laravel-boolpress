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
                        <input class="form-control" type="text" name="title" placeholder="Insert title" value='{{old('title')??$post['title']}}'>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2" name="content">Contet</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea2" rows="3" placeholder="Insert Content of the post">{{old('content')??$post['content']}}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" class="form-control">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                            <option {{old("category_id")!= null && old("category_id")==$category['id'] || isset($post['category']) && $post["category"]["id"] == $category['id'] ? "selected" : null}} value="{{$category['id']}}">{{$category['name']}}</option>
                                
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        
                        @foreach ($tags as $tag)                            
                        
                        <div class="custom-control custom-checkbox">
                            <input name="tags[]" value="{{$tag['id']}}" type="checkbox" class="custom-control-input" id="tag-{{$tag['name']}}">
                            <label class="custom-control-label" for="tag-{{$tag['name']}}">{{$tag['name']}}</label>
                        </div>
                        @endforeach
                        
                    </div>
                    
                    <button class="btn-primary btn px-3" type="submit">Update Post</button>
                </form>

                
            </div>
        </div>
    </div>
</div>
@endsection