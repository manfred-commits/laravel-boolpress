@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Dashboard') }} of {{$category['name']}}
                    <div class="navigation-links">
                        <a class="mr-2" href="{{route('admin.categories.index')}}">Back to previous section </a>
                        <a href="{{route('admin.categories.edit',$category['id'])}}" class="align-self-center">
                            Modifica Categoria                          
                        </a>
                    </div>
                </div>
                
                {{-- success message --}}
                @if ($message = Session::get('success'))
                <div class="my-3 alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <div class="card-body">                    
                    <div class="post-container">
                        <h4><strong>Name:</strong> {{$category['name']}}</h4>
                        <h4><strong>Slug:</strong> {{$category['slug']}}</h4>                       
                    </div>
                    <div class="post-container">
                        <ul>
                            <h4><strong>Lista Post per Categoria</strong></h4>                      
                            @forelse ($category['posts'] as $post)
                            <li>
                                <h5>{{$post['title']}}</h5>
                            </li> 
                            @empty
                                <h5>Non vi sono Post per la categoria</h5>
                            @endforelse
                        </ul>                     
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection