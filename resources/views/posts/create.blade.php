@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? 'Edit post' : 'Create post' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($post) ? $post->title : '' }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control"> {{ isset($post) ? $post->description : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content"  type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                    <trix-editor input="content"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Published at</label>
                    <input type="text" class="form-control" id="published_at" name="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @if(isset($post) && $category->id == $post->category_id)
                                    selected
                            @endif
                            > {{ $category->name }}</option>
                         @endforeach
                    </select>
                </div>
                @if($tags->count() > 0)
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    @if(isset($post))
                                        @if($post->hasTag($tag->id))
                                            selected
                                        @endif
                                    @endif
                                >

                                    {{ $tag->name }}</option>
                            @endforeach
                        @endif

                    </select>

                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src=" {{ asset($post->image) }}" alt="Missing photo" style="width: 100%" >
                    </div>
                 @endif
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>


                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($post) ? 'Edit post' : 'Create post' }}
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true
        });
        $(document).ready(function() {
            $('#tags').select2();
        });
    </script>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
@endsection