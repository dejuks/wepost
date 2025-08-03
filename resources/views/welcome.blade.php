<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo Blog</title>
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
</head>
<div class="container">
    <header>
        <h2>Demo Blog</h2>
        <nav>
            <a href="#">Home</a>
            <a href="#">My Post</a>
            <a href="#" class="user-profile" title="User Profile"></a>
        </nav>
    </header>

    <main>
        <!-- Button to open modal -->
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
                    Edit | Delete

                </td>
            </tr>
            @endforeach
        </table>

        <div class="edit-post">
            - edit post
        </div>

        <div class="author">
            <strong>Author:</strong>
        </div>

        <div class="login-status">
            <span class="dot"></span> Logged In
        </div>
    </main>
</div>

<!-- JavaScript to control modal -->
<script>
    function openModal() {
        document.getElementById('newPostModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('newPostModal').style.display = 'none';
    }

    window.onclick = function(event) {
        let modal = document.getElementById('newPostModal');
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
