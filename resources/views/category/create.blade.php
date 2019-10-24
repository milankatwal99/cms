@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ isset($category)? route('category.update',$category->id) : route('category.store') }}" class="btn btn-success mb-2">Add Category</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class = "card card-default">
        <div class = "card-header">
            {{ isset($category) ? 'Edit Category': 'Create Category' }}

        </div>
        <div class="card-body">
            <form action = "{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method = "post">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <input type = "text" class = "form-control" name="name" placeholder ="name" value="{{ isset($category) ? $category->name: '' }}">
                <button type ="submit"> <a href = "/cms/public/category" class = "btn btn-primary">Submit</a> </button>
               {{ session()->flash('success',' added categories') }}
            </form>
            </form>

        </div>
    </div>
@endsection