@extends("layouts.app")
@section('content')
<div class = "card card-default">
    <div class = "card-header">
        {{ isset($post)? 'Edit Post':'Add Post' }}
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action=" {{ isset($post)? route('post.update',$post->id): route('post.store') }} " method = "post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class = "form-group">
                <label for = "title">Title</label>
                <input type = "text" name="title" class="form-control" id = "title" value="{{ isset($post)? $post->title:''  }}">
            </div>

            <div class = "form-group">
                <label for = "description">Description</label>
                <textarea name="description" cols="10" rows="4"  class="form-control" id = "description">{{ isset($post)? $post->description:''  }}</textarea>
            </div>

            <div class = "form-group">
                <label for = "content">Content</label>
                <textarea id="content" name = "content" cols="10" rows="8" class = "form-control"> {{ isset($post)? $post->content:'' }} </textarea>
            </div>

            <div class = "form-group">
                <label for = "image">Image</label>
                    <input type = "file" id = "image" value="" class="form-control" name = "image" value="{{ isset($post)? $post->image: '' }}">
            </div>

            <div class = "form-group">
                <label for = "published_at">Published_At</label>
                    <input type = "text" id="published_at" class="form-control" name = "published_at" value="{{ isset($post)? $post->published_at:'' }}">
            </div>

            <div class = "form-group">
                <label for = "dropdown">Category</label>
                <select name="category" id = "category" class="form-control">
                    @foreach($categorys as $category)
                        <option value="{{ $category->id }}"
                        @if(isset($post))
                            @if($category->id == $post->category_id)
                        selected
                                @endif
                                @endif
                        >

                        {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{--<div class = "form-group">
                    <label for="tags">Tag</label>
                    <select name = "tags[]" id ="tags" class = "form-control" multiple>
                        @foreach($tag as $tags)
                            <option value = "{{ $tags->id }}">{{ $tags->name }}</option>
                        @endforeach
                    </select>
                </div>--}}

            <div class = "form-group">
                <label>Select Tag</label>
                @foreach($tag as $tags)
                <div class = "checkbox">
                    <label></label><input type = 'checkbox' name="tags[]" value="{{ $tags->id }}">{{ $tags->name }}</label>
                </div>
                @endforeach
            </div>

            <div class = "form-group">
                <button type = "submit" class = "btn btn-success">{{ isset($post)? 'Update Post':'Save Post' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <script>
        flatpickr("#published_at",{enableTime:true});

        $(document).ready(function() {
            $('.tags-selector').select2();
        })

    </script>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection