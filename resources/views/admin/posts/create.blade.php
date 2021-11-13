@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{route('admin.posts.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" name="title">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Insert title" value='{{old('title')}}'>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2" name="content">Contet</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea2" rows="3" placeholder="Insert Content of the post">{{old('content')}}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button class="btn-primary btn px-3" type="submit">Invia Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection