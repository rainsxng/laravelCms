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
                                <button class="btn btn-success btn-sm">Make admin</button>
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