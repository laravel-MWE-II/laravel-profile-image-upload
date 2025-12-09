<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

    <h1>Register</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Confirm Password:</label><br>
            <input type="password" name="password_confirmation" required>
        </div>

        <br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>

</body>
</html>
