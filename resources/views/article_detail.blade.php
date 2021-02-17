@extends('layouts.app')

@section('content')

<div class="mx-auto" style=" min-width: 58%; max-width: 60%;">

    <div>
        <h5>{{$article->title}}</h5>

        <img src="{{asset('/images/'.$article['image'])}}" style="height: 100%; width: 100%; object-fit: contain;">

        <p class="mt-2">{{$article->description}}</p>
    </div>
    <a href = '/home'>Back to home</a>
</div>
@endsection