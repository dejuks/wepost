<x-layout>
    <button class="btn-open" onclick="openModal()">+ New Post</button>

    <!-- Modal -->
    <div id="newPostModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Create New Post</h3>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="5" required></textarea>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <button type="submit" class="submit-btn">Save Post</button>
            </form>
        </div>
    </div>

    <div class="list-post">List of Post</div>
    <table class="post-table">
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn show">👁</a>
                      
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</x-layout>
