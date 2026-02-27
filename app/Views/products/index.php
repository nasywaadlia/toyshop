<!DOCTYPE html>
<html>
<head>
    <title>Toyshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Toyshop</h1>
        <a href="<?= base_url('admin/products/create') ?>"class="btn btn-primary">Tambah Produk</a>    </div>

    <div class="row">
        <?php foreach($products as $p): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">

                    <?php if($p['image']): ?>
                        <img src="<?= base_url('image/' . $p['image']); ?>" 
                             class="card-img-top" 
                             style="height:200px; object-fit:cover;">
                    <?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title"><?= $p['name']; ?></h5>
                            <p>
                                <span class="badge bg-secondary">
                                    <?= $p['category_name']; ?>
                                </span>
                            </p>

                            <p class="text-success fw-bold">
                            Rp <?= number_format($p['price']); ?>
                            </p>

                            <p class="card-text"><?= $p['description']; ?></p>
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="/admin/products/edit/<?= $p['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('admin/products/delete/' .$p['id']) ?>" 
                           onclick="return confirm('Yakin hapus?')" 
                           class="btn btn-danger btn-sm">Delete</a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

</body>
</html>