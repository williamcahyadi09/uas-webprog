@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
            @endforeach
            @endif
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if($user->role=="admin")
                <h3>You are the admin</h3>
            @else
            <form method="post" action='/profile/update/{{$user}}' enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label">Nama : </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label">Email : </label>
                    <div class="col-md-8">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-md-4 col-form-label">Phone number : </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}">
                    </div>
                </div>

                

                <button type="submit" class="btn btn-primary ml-3">Update profile</button>
            </form>
            @endif


        </div>
    </div>

    <script>
        function getFileName() {
            var fileName = document.getElementById('chooseFile').files[0].name;
            var label = document.getElementById('fileLabel').innerHTML = fileName;
        }
    </script>

    @endsection