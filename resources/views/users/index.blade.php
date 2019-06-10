@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table">
                    <thead>
                    <th>User image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($user->email) }}" alt="User image" width="40px" height="40px" style="border-radius: 50%">
                            </td>
                            <td>
                              {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                            @if(!$user->isAdmin())
                                    <td>
                                        <form action="{{route('users.make-admin',$user->id)}}" method="post">
                                            @csrf
                                        <button type="submit" name="submitBtn" class="btn btn-success btn-sm">
                                           Make admin
                                        </button>
                                        </form>
                                    </td>
                             @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @else
                <h3 class="text-center">No users Yet</h3>
            @endif
        </div>
    </div>
@endsection