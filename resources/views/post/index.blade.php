@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('post.create') }}" class="btn btn-success mb-2">Add Post</a>
    </div>
    <div class = "card card-default">
        <div class = "card-header">
            Posts
        </div>
        <div class = "card-body">
            @if($posts->count()>0)
            <table class = "table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                         <td> {{ ($post->description) }}</td>
                        `<td> {{ $post->category->name }} </td>
                        @if(!$post->trashed())
                            <td><a href = "{{ route('post.edit',$post->id) }}" class = "btn btn-primary"> Edit </a></td>
                         @else

                            <td>
                            <form action = "{{ route('post.restore',$post->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type = "submit" class = "btn btn-secondary"> Restore </button></td>
                            </form>
                            </td>

                        @endif
                        <td><form action="{{ route('post.destroy',$post->id) }}" method = "post">
                                @csrf
                                @method('DELETE')
                                <button type = "submit" class = "btn btn-danger"> {{ $post->trashed() ? 'Delete' : 'Trash' }} </button>
                            </form></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h1>No post found</h1>
             @endif

        </div>
    </div>
@endsection