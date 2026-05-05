<!DOCTYPE html>
<html>
<head>
    <title>Login - Toyshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffdee9, #b5fffc);
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 25px;
        }

        .btn-primary {
            background: #ff4d6d;
            border: none;
        }

        .btn-primary:hover {
            background: #ff758f;
        }
    </style>
</head>

<body>

<div class="card shadow-lg p-5" style="width: 600px;">

    <div class="text-center mb-4">
        <h2 class="fw-bold text-danger">Toyshop Admin</h2>
        <p class="text-muted mb-0">Silakan login dulu</p>
    </div>

    <form method="post" action="<?= base_url('login/process') ?>">

        <div class="mb-4">
            <input type="text" 
                   name="username" 
                   class="form-control form-control-lg"
                   placeholder="Username"
                   required>
        </div>

        <div class="mb-4">
            <input type="password" 
                   name="password" 
                   class="form-control form-control-lg"
                   placeholder="Password"
                   required>
        </div>

        <button class="btn btn-primary w-100">
            Login
        </button>

    </form>

</div>

</body>
</html>