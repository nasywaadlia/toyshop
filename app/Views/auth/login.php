<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:400px;">
    <h3 class="mb-4">Login</h3>

    <form method="post" action="<?= base_url('login/process') ?>">

    <div class="mb-3">
        <input type="text" name="username" 
               class="form-control" 
               placeholder="Username">
    </div>

    <div class="mb-3">
        <input type="password" name="password" 
               class="form-control" 
               placeholder="Password">
    </div>

    <button class="btn btn-dark w-100">Login</button>
</form>
</div>

</body>
</html>