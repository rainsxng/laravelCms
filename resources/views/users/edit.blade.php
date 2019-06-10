@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My profile</div>
                    @include('partial.errors')
                    <form action="{{ route('users.edit-profile') }}" method="post" class="ml-3 mt-2">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="about">About me</label>
                            <textarea class="form-control" name="about" id="about" cols="30" rows="10">{{$user->about}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mb-2">Update profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
