<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Keranjang Belanja</h2>

    <?php if (!empty($cart)) : ?>
        <table class="table mt-4">
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

        <h4>Total: Rp <?= number_format($grandTotal, 0, ',', '.') ?></h4>

    <?php else: ?>
        <p>Keranjang masih kosong.</p>
    <?php endif; ?>

    <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-3">
        Kembali Belanja
    </a>

    <a href="<?= base_url('checkout') ?>" class="btn btn-success">
    Checkout
    </a>
</div>

</body>
</html>