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

            <form method="post" action='/blog/create' enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-md-4 col-form-label">Title : </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Input article title" name="title" value="{{old('title')}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="col-md-4 col-form-label ">Category :</label>
                    <div class="col-md-8">
                        <select class="form-control" name="category">
                            <option value="1">Beach</option>
                            <option value="2">Mountain</option>
                        </select>

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <label for="file" class="col-md-4">Photo :</label>
                        <div class="custom-file col-md-8 ml-3">
                            <input type="file" class="form-control custom-file-input @error('file') is-invalid @enderror" id="chooseFile" onchange="getFileName()" name="file">
                            <label class="custom-file-label" for="chooseFile" id="fileLabel">Choose file</label>
                        </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-4 col-form-label">Story :</label>
                    <div class="col-md-8">
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="7" placeholder="Input article description" name="description" value="{{old('description')}}"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Post article</button>
            </form>



        </div>
    </div>

    <script>
        function getFileName() {
            var fileName = document.getElementById('chooseFile').files[0].name;
            var label = document.getElementById('fileLabel').innerHTML = fileName;
        }
    </script>

    @endsection