<x-layout>
    <h2>Create Account</h2>
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" id="title" name="name"  required>
        </div>

        <div class="form-group">
            <label for="title">Email</label>
            <input type="email" id="title" name="email"  required>
        </div>
        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" id="title" name="password"  required>
        </div>
        <button type="submit" class="submit-btn">Save</button>
    </form>
</x-layout>
