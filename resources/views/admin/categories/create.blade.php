@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{route('admin.categories.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" name="name">Nome categoria</label>
                        <input class="form-control" type="text" name="name" placeholder="Insert name of category" value='{{old('name')}}'>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                    <button class="btn-primary btn px-3" type="submit">Aggiungi la Categoria</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection