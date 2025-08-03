<x-layout>
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{$post->title}}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content"  name="content" rows="5" required>
                {{$post->content}}
            </textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                    {{$category->id == $post->category_id ? 'Selected' : ''}}
                    >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <button type="submit" class="submit-btn">Update Change</button>
    </form>
</x-layout>
