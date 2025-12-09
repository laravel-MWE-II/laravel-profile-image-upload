<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>

    <h1>User Profile</h1>

    {{-- Success message --}}
    @if (session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation error --}}
    @error('profile_picture')
        <div style="color:red;">
            {{ $message }}
        </div>
    @enderror

    <h3>Welcome, {{ $user->name }}</h3>
    <p>Email: {{ $user->email }}</p>

    {{-- Profile Picture --}}
    <div>
        <h4>Profile Picture:</h4>
        @if ($user->profile_picture)
            <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture" width="150">
        @else
            <p>No profile picture uploaded yet.</p>
        @endif
    </div>

    <hr>

    {{-- Upload form --}}
    <h4>Upload / Change Profile Picture (max 2MB)</h4>

    <form action="{{ route('profile.picture.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="profile_picture" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>

    <hr>

    {{-- Logout --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
