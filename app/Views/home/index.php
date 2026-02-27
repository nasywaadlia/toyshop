<!DOCTYPE html>
<html>
<head>
    <title>Toyshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<body>

<div class="container mt-5">

    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="mb-0">Toyshop</h2>
        </div>
        <div class="col text-end">
            <a href="<?= base_url('cart') ?>" class="btn btn-success">
                Lihat Cart 🛒
            </a>
        </div>
    </div>

    <div class="row">
        <?php foreach ($products as $p): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="<?= base_url('image/' . $p['image']) ?>"
                         class="card-img-top"
                         style="height:250px; object-fit:cover;">

                    <div class="card-body">

    <?php if(!empty($p['category_name'])): ?>
        <span class="badge bg-secondary mb-2">
            <?= esc($p['category_name']) ?>
        </span>
    <?php endif; ?>
                        <h5><?= $p['name'] ?></h5>
                        <p class="text-success fw-bold">
                            Rp <?= number_format($p['price'], 0, ',', '.') ?>
                        </p>
                        <p><?= $p['description'] ?></p>
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

</body>
</html>