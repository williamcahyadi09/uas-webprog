@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if($flag)
            <h3>{{$category}}</h3>
    @endif
    <div class="row">
        <div class="d-flex flex-row flex-wrap justify-content-center">
            @foreach($articles as $article)
            <div class="card" style="width: 300px;margin: 10px">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">
                        {{$article->title}}
                    </h5>
                    <div class="card-text">
                        @php ($shown = substr($article->description, 0, 70))
                        {{$shown}} ......
                        <a href="{{route('article_detail',[$article])}}">full story</a>
                    </div>
                    <br>
                    <div class="card-text">
                        <i>Category</i> : <a href="/blog/category/{{$article->category->name}}">{{$article->category->name}}</a><br>
                        <i>Written by</i> : {{$article->user->name}}
                        @guest
                        @else
                        @if(Auth::user()->role=='admin')
                            <br><br>
                            <div class="btn btn-danger">
                                <form method="post" action="/blog/admin/{{$article->id}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                        @endguest
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection