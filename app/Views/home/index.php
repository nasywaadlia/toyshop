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

<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">

        <a class="navbar-brand fw-bold text-danger fs-4" href="<?= base_url('/') ?>">
            Toyshop
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">

            <div class="dropdown">
                <button class="btn btn-outline-danger dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown">
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

            <a href="<?= base_url('cart') ?>" 
               class="btn btn-danger">
                Keranjang 🛒
            </a>

        </div>
    </div>
</nav>

<section class="py-5"
         style="background: linear-gradient(135deg, #ffdee9, #b5fffc);">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">
                <h1 class="fw-bold display-5 mb-3">
                     Mainan Lucu, Harga Bersahabat 🎉
                </h1>

                <p class="mb-4">
                    Temukan koleksi mainan terbaik!
                    Kualitas oke, harga nggak bikin nangis.
                </p>

                <a href="#produk" class="btn btn-danger px-4 py-2">
                    Belanja Sekarang
                </a>
            </div>

            <div class="col-md-6 text-center">
               <img src="https://cdn-icons-png.flaticon.com/512/3468/3468371.png"
     alt="Boneka"
     class="img-fluid"
     style="max-height:250px; transition:0.3s ease;"
     onmouseover="this.style.transform='scale(1.1)'"
     onmouseout="this.style.transform='scale(1)'">
            </div>

        </div>

    </div>
</section>

<section class="py-5 bg-light" id="produk">
    <div class="container">

        <h2 class="text-center fw-bold mb-5">
            Produk Terbaru
        </h2>

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
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<footer class="bg-dark text-white text-center py-4">
    <p class="mb-0">
        © <?= date('Y') ?> Toyshop. All Rights Reserved.
    </p>
</footer>

<!-- ✅ SWEETALERT NOTIF -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->getFlashdata('success')): ?>
<script>
Swal.fire({
    title: 'Berhasil 🎉',
    text: '<?= session()->getFlashdata('success') ?>',
    icon: 'success',
    confirmButtonColor: '#ff4d6d'
});
</script>
<?php endif; ?>

</body>
</html>