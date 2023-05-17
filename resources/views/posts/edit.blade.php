@section('content')
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title field -->
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <!-- Subtitle field -->
        <div>
            <label for="subtitle">Subtitle:</label>
            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $post->subtitle) }}" required>
        </div>

        <!-- Content field -->
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <!-- Tags field -->
        <div>
            <label for="tags">Tags:</label>
            <input type="text" id="tags" name="tags" value="{{ old('tags', $post->tags) }}" required>
        </div>

        <!-- Image field -->
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
        </div>

        <!-- Current image display -->
        @if ($post->image)
            <div>
                <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image">
            </div>
        @endif

        <!-- Submit button -->
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
@endsection

