@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>{{ $post->title }}</h1>

        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="/posts/users/{{ $post->user->name }}">{{ $post->user->name }}</a></p>

        @include('tags.index')

        <hr>

        {{ $post->body }}

        <hr>

        @include('comments.create')

        <hr>

        @include('comments.index')
    </div>
@endsection
