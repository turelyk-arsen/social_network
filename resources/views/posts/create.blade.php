@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title field -->
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <!-- Subtitle field -->
        <div>
            <label for="subtitle">Subtitle:</label>
            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" required>
        </div>

        <!-- Content field -->
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>
        </div>

        <!-- Tags field -->
        <div>
            <label for="tags">Tags:</label>
            <input type="text" id="tags" name="tags" value="{{ old('tags') }}" required>
        </div>

        <!-- Image field -->
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
        </div>

        <!-- Submit button -->
        <div>
            <button type="submit">Create</button>
        </div>
    </form>
@endsection

