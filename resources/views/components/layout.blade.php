<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo Blog</title>
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
</head>
<div class="container">
    <header>
        <h2>WePost</h2>
        <nav>
            <a href="{{route('home')}}">Home</a>
            @if(Auth::check())
                <a href="{{ route('myposts') }}">My Post</a>

            <div class="dropdown">
                <a href="#" class="user-profile" title="User Profile" onclick="toggleDropdown(event)"></a>
                <div class="dropdown-menu" id="userDropdown">
                    <a href="{{ route('profile.show') }}">👤 My Profile</a>
                    <a href="#">⚙️ Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">🚪 Logout</button>
                    </form>
                </div>
            </div>
            @else
                <a href="{{ route('login') }}">Login</a>

            @endif
        </nav>
    </header>

    <main>
        <!-- Button to open modal -->
       {{$slot}}
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
<script>
    function toggleDropdown(event) {
        event.preventDefault();
        const menu = document.getElementById('userDropdown');
        menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
    }

    // Optional: close dropdown on click outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdown');
        const profile = document.querySelector('.user-profile');
        if (!dropdown.contains(event.target) && !profile.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>
</body>
</html>
