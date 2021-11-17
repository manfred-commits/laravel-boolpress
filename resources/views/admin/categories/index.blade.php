@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12 col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">{{ __('Dashboard') }} of all Categories
                    <a href="{{route('admin.categories.create')}}" class="align-self-center">
                        <button class="btn-primary btn px-3">Crea Categoria</button>                            
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
                    @foreach ($categories as $category)
                        <div class="post-container pt-2 pb-2 mb-5 d-lg-flex flex-wrap align-items-start">
                            <h4 class="col "><strong>Name:</strong><br> {{$category['name']}}</h4>
                            <h4 class="col"><strong>Slug:</strong><br> {{$category['slug']}}</h4>                            
                            <div class="btns d-flex flex-column align-items-center">
                                <a href="{{route('admin.categories.show',$category['id'])}}" class="m-1">
                                    <button class="btn-primary btn px-3">Visualizza Categoria</button>                            
                                </a>
                                <a href="{{route('admin.categories.edit',$category['id'])}}" class="m-1">
                                    <button class="btn-warning btn px-3">Modifica Categoria</button>                            
                                </a>
                                <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger btn px-3">Elimina Categoria</button>
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