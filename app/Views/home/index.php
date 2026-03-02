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

    .btn-success {
        background: #06d6a0;
        border: none;
    }

    .btn-success:hover {
        background: #20e3b2;
        transform: scale(1.05);
    }
    </style>
</head>

<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">       
         <h1 class="mb-0">Toyshop</h1>
        <!-- Category -->
        <div class="d-flex gap-2">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle shadow" type="button" data-bs-toggle="dropdown">
                Kategori
            </button>
            <ul class="dropdown-menu">

                <li>
                    <a class="dropdown-item" href="<?= base_url('/') ?>">
                        Semua
                    </a>
                </li>

                <?php foreach($categories as $c): ?>
                    <li>
                        <a class="dropdown-item" 
                           href="<?= base_url('/?category_id=' . $c['id']) ?>">
                            <?= esc($c['name']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <a href="<?= base_url('cart') ?>" class="btn btn-success shadow">
            Lihat Keranjang 🛒
        </a>
    </div>
</div>

    <div class="row">
        <?php foreach ($products as $p): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">

                    <img src="<?= base_url('image/' . $p['image']) ?>"
                         class="card-img-top"
                         style="height:220px; object-fit:cover;">

                    <div class="card-body">

                        <?php if(!empty($p['category_name'])): ?>
                            <p>
                                <span class="badge">
                                    <?= esc($p['category_name']) ?>
                                </span>
                            </p>
                        <?php endif; ?>

                        <h5 class="card-title">
                            <?= $p['name'] ?>
                        </h5>

                        <p class="fw-bold text-success">
                            Rp <?= number_format($p['price'], 0, ',', '.') ?>
                        </p>

                        <p class="card-text">
                            <?= $p['description'] ?>
                        </p>

                    </div>

                    <div class="card-footer">
                        <form action="<?= base_url('cart/add') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $p['id'] ?>">
                            <button type="submit" class="btn btn-primary w-100">
                                Beli
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>