@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Add a New Post</h3>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="subtitle">Subtitle:</label>
                <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="tags">Tags:</label>
                <input type="text" id="tags" name="tags" value="{{ old('tags') }}">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
            </div>

            <!-- Image preview -->
            <div class="form-group">
                @if(isset($post) && $post->image)
                    <img src="{{ $post->image }}" alt="Post Image" style="max-width: 300px; max-height: 300px;">
                @endif
            </div>

            <!-- Delete post option -->
            @if(isset($post))
                <div class="form-group">
                    <input type="checkbox" id="delete" name="delete">
                    <label for="delete">Delete this post</label>
                </div>
            @endif

            <div class="form-group">
                <button type="submit">Add</button>
            </div>
        </form>
    </div>

    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            display: block;
            margin-top: 5px;
        }

        img {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #111010;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        h3 {
            margin-bottom: 10px;
        }
    </style>
@endsection


