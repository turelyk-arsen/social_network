@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="card-body">
                @if ($post->image)
                <img src="{{ asset('storage/app/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3">

                @endif
                <p>{{ $post->content }}</p>
            </div>
            <div class="card-footer">
                <p>Created by: {{ $post->user->name }}</p>
                <p>Created at: {{ $post->created_at->format('M d, Y H:i') }}</p>
                <p>Updated at: {{ $post->updated_at->format('M d, Y H:i') }}</p>
            </div>
        </div>
    </div>
@endsection
