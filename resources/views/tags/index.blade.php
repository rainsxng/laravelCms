@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('tags.create') }}" class="btn btn-success float-right mb-2">Add tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <th>Name</th>
                <th>Posts count</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->name }}
                        </td>
                        <td>
                           {{ $tag->posts->count() }}
                        </td>
                        <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm">Edit</a>

                            <button class="btn-danger btn-sm ml-3" onclick=handleDelete({{ $tag->id }})>Delete</button>

                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>

            <form action="" method="POST" id="deleteTagForm">

                @csrf

                @method('DELETE')

                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">
                                    Are you sure?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes, delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            let form = document.querySelector('#deleteTagForm');
            form.action = '/tags/'+ id;
            $('#deleteModal').modal('show');

        }
    </script>
@endsection