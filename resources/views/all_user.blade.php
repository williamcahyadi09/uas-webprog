@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h3 class="text-center mt-3 mb-3">All users</h3>
    <table class="table mx-auto" style="width: 70%;">
        <thead>
            <tr>
                <th scope="col">User name</th>
                <th scope="col">Action</th>
            </tr>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        <form method="post" action="/alluser/{{$user->id}}">
                            @method('delete')
                            @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
    
</div>
@endsection