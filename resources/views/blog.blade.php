@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    @guest
    @else
    @if(Auth::user()->role=="user")
    <div class="btn btn-primary">
        <a href="/blog/create" style="color: white;">+ Create Blog / Article</a>
    </div>
    @endif
    @endguest
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if($articles->isEmpty()) 
    <h3>You have not posted anything</h3>
    @else
    <h3 class="text-center mt-3 mb-3">Your articles (Blog)</h3>
    <table class="table mx-auto" style="width: 70%;">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td><a href="{{route('article_detail',[$article])}}">{{$article->title}}</a></td>
                    <td>
                        <form method="post" action="/blog/{{$article->id}}">
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
    @endif
</div>
@endsection