<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: linear-gradient(135deg, #ffdee9, #b5fffc);
        font-family: 'Segoe UI', sans-serif;
    }

    h2 {
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
        padding: 30px;
    }

    .table {
        border-radius: 15px;
        overflow: hidden;
    }

    .table thead {
        background: #ff4d6d;
        color: #fff;
    }

    .table th, 
    .table td {
        vertical-align: middle;
    }

    .total-box {
        font-size: 20px;
        font-weight: 700;
        color: #06d6a0;
    }

    .btn {
        border-radius: 12px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .btn-danger {
        background: #ef476f;
        border: none;
    }

    .btn-danger:hover {
        background: #ff6b81;
        transform: scale(1.05);
    }

    .btn-secondary {
        background: #adb5bd;
        border: none;
    }

    .btn-secondary:hover {
        background: #ced4da;
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

    .empty-text {
        font-size: 18px;
        color: #555;
    }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body">

            <h2 class="mb-4">Keranjang Belanja</h2>

            <?php if (!empty($cart)) : ?>

                <div class="table-responsive">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $grandTotal = 0; ?>

                            <?php foreach ($cart as $id => $item): ?>
                                <?php 
                                    $total = $item['price'] * $item['qty'];
                                    $grandTotal += $total;
                                ?>
                                <tr>
                                    <td><?= $item['name'] ?></td>
                                    <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                                    <td><?= $item['qty'] ?></td>
                                    <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                                    <td>
                                        <a href="<?= base_url('cart/remove/'.$id) ?>" 
                                           class="btn btn-danger btn-sm">
                                           Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

                <div class="mt-3 total-box">
                    Total: Rp <?= number_format($grandTotal, 0, ',', '.') ?>
                </div>

            <?php else: ?>
                <p class="empty-text">Keranjang masih kosong.</p>
            <?php endif; ?>

            <div class="mt-4 d-flex gap-2">
                <a href="<?= base_url('/') ?>" class="btn btn-secondary">
                    Kembali Belanja
                </a>

                <a href="<?= base_url('checkout') ?>" class="btn btn-success">
                    Checkout
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>