@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('category.create') }}" class="btn btn-success mb-2">Add Category</a>
    </div>
<div class = "card card-default">
    <div class = "card-header">
        Create Category
    </div>
    <div class="card-body">
        <h3>Top</h3>
    </div>
</div>
    <div class = 'card card-default'>
        <div class="card-header">Category List</div>
        <div class = "card-body">
            @if($output->count()>0)
            <table class = "table table-condensed">
                <thead>
                <tr>
                <th>Name</th>
                    <th>option</th>
                </tr>

                </thead>
                <tbody>
                @foreach($output as $category)
                <tr>
                    <td>
                         {{ $category->name }}
                    </td>
                    <td>
                        <a href = "{{route('category.edit',$category->id) }}" class = "btn btn-primary">Edit</a>
                        <button type = "button" class = "btn btn-danger" onclick="handleDeletes({{ $category->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h1>No Category found</h1>
            @endif
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">No, Go Back</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Yes Delete it</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function handleDeletes(id)
    {
        console.log('deleting',id);
        $('#deleteModal').modal('show')
    }
</script>
@endsection