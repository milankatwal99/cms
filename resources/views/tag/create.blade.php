@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="" class="btn btn-success mb-2">{{ isset($tag)?'Edit Tag':'Create Tag' }}</a>
    </div>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    <div class = "card card-default">
        <div class = "card-header">
        </div>
        <div class="card-body">
            <form action = "{{ isset($tag)? route('tag.update',$tag->id): route('tag.store') }}" method = "post">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif
                <label for = "name">Name</label>
                <input type = "text" class = "form-control" name="name" value = "{{ isset($tag)?$tag->name:'' }}"}}>
                <button type ="submit"> <a href = "" class = "btn btn-primary">{{ isset($tag)?'Update':'Edit Tag' }}</a> </button>
                {{ session()->flash('success',' added categories') }}
            </form>
        </div>
    </div>
@endsection