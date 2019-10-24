@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('user.profile')}}" class="btn btn-success mb-2">Add User</a>
    </div>
    <div class = 'card card-default'>
        <div class="card-header">User</div>
        <div class = "card-body">
            @if($users->count()>0)
                <table class = "table table-condensed">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                            <img width="40px" height="40px" style="border-radiu:50%" src = "{{ Gravatar::src($user->email) }}">
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{route('user.change',$user->id)}}" method="post">
                                        @csrf
                                        <button type = "submit" class = "btn btn-success">Make Admin</button>
                                    </form>
                                @endif
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