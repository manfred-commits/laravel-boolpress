@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} of {{$post['title']}}</div>

                <div class="card-body">                    
                    <div class="post-container">
                        <h4>Title: {{$post['title']}}</h4>
                        <h4>Slug: {{$post['slug']}}</h4>
                        <h4>Content: <br>{{$post['content']}}</h4>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection