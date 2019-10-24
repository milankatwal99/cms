@extends('layouts.app')
@section('content')
    <div class = "card card-default">
        <div class = "card-header">My Profile</div>
        <div class = "card-body">
            <form action="{{ route('update.profile',$user->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class = "form-group">
                <label for="name">Name</label>
                <input type = "text" name = "name" id = "name" class="form-control">
                </div>

                <div class = "form-group">
                    <label for ="descripton">About Me</label>
                    <textarea name="description"id ="description" rows="7" cols="10" class = "form-control"></textarea>
                </div>

                <div class = "form-group">
                    <button type = "submit" cols="9" rows="9" class = "btn btn-success">Update</button>
                </div>

            </form>
        </div>
    </div>
@endsection()