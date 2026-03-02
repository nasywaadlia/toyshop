<!DOCTYPE html>
<html>
<head>
    <title>Toyshop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

    body {
        background: linear-gradient(135deg, #ffdee9, #b5fffc);
        font-family: 'Segoe UI', sans-serif;
    }

    h1 {
        font-weight: 800;
        letter-spacing: 2px;
        color: #ff4d6d;
        text-shadow: 2px 2px 0px #ffd6e0;
    }

    .card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: 0.3s ease;
        background: #ffffff;
    }

    .card:hover {
        transform: translateY(-10px) rotate(-1deg);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .card img {
        transition: 0.4s ease;
    }

    .card:hover img {
        transform: scale(1.08);
    }

    .card-body {
        padding: 25px;
    }

    .card-title {
        font-weight: 700;
        font-size: 20px;
        color: #3a86ff;
    }

    .badge {
        background: #ffbe0b;
        color: #000;
        border-radius: 12px;
        padding: 6px 12px;
        font-weight: 600;
    }

    .text-success {
        color: #06d6a0 !important;
        font-size: 18px;
    }

    .card-text {
        color: #555;
        font-size: 14px;
    }

    .card-footer {
        background: #f8f9fa;
        border-top: none;
        padding: 18px;
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

    .btn-warning {
        background: #ffd166;
        border: none;
        color: #000;
    }

    .btn-warning:hover {
        background: #ffe08a;
        transform: scale(1.05);
    }

    .btn-danger {
        background: #ef476f;
        border: none;
    }

    .btn-danger:hover {
        background: #ff6b81;
        transform: scale(1.05);
    }

    </style>

</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>Toyshop</h1>
        
        <a href="<?= base_url('admin/products/create') ?>"
           class="btn btn-primary shadow">
           Tambah Produk
        </a>
    </div>

    <div class="row">

        <?php foreach($products as $p): ?>

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow-sm">

                <?php if($p['image']): ?>

                    <img src="<?= base_url('image/' . $p['image']); ?>"
                         class="card-img-top"
                         style="height:220px; object-fit:cover;">

                <?php endif; ?>

                <div class="card-body">

                    <h5 class="card-title">
                        <?= $p['name']; ?>
                    </h5>

                    <p>
                        <span class="badge">
                            <?= $p['category_name']; ?>
                        </span>
                    </p>

                    <p class="fw-bold text-success">
                        Rp <?= number_format($p['price']); ?>
                    </p>

                    <p class="card-text">
                        <?= $p['description']; ?>
                    </p>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a href="/admin/products/edit/<?= $p['id']; ?>"
                       class="btn btn-warning btn-sm">
                       Edit
                    </a>

                    <a href="<?= base_url('admin/products/delete/' .$p['id']) ?>"
                       onclick="return confirm('Yakin hapus?')"
                       class="btn btn-danger btn-sm">
                       Delete
                    </a>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>