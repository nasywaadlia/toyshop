<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: linear-gradient(135deg, #ffdee9, #b5fffc);
        font-family: 'Segoe UI', sans-serif;
    }

    h3 {
        font-weight: 800;
        letter-spacing: 1px;
        color: #ff4d6d;
        text-shadow: 2px 2px 0px #ffd6e0;
    }

    .card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: #ffffff;
    }

    .card-body {
        padding: 35px;
    }

    .form-label {
        font-weight: 600;
        color: #3a86ff;
    }

    .form-control {
        border-radius: 12px;
        padding: 10px 15px;
        border: 2px solid #f1f1f1;
        transition: 0.2s ease;
    }

    .form-control:focus {
        border-color: #ff4d6d;
        box-shadow: none;
    }

    .btn {
        border-radius: 12px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .btn-primary {
        background: #ff4d6d;
        border: none;
    }

    .btn-primary:hover {
        background: #ff758f;
        transform: scale(1.05);
    }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="mb-4 text-center">Checkout</h3>

                    <form action="<?= base_url('checkout/process') ?>" method="post">

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Simpan Pesanan
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>