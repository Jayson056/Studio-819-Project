    <!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">

<div class="card p-4 shadow" style="width:400px">
    <h4 class="text-center mb-3">Create Admin Account</h4>

    <form method="POST" action="{{ route('admin.register.submit') }}">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Create Admin</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('admin.login') }}">Back to Login</a>
    </div>
</div>

</body>
</html>
