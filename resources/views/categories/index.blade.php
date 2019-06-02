@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-end">
       <a href="{{ route('categories.create') }}" class="btn btn-success float-right mb-2">Add category</a>
   </div>
 <div class="card card-default">
     <div class="card-header">
         Categories
     </div>
     <div class="card-body">
         <table class="table">
             <thead>
             <th>Name</th>
             <th></th>
             </thead>
             <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>

                            <button class="btn-danger btn-sm ml-3" onclick=handleDelete({{ $category->id }})>Delete</button>

                        </td>

                    </tr>

                @endforeach
             </tbody>
         </table>

         <form action="" method="POST" id="deleteCategoryForm">

             @csrf

             @method('DELETE')

             <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="deleteModalLabel">Delete category</h5>
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
            let form = document.querySelector('#deleteCategoryForm');
            form.action = '/categories/'+ id;
            $('#deleteModal').modal('show');

        }
    </script>
@endsection