<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="mb-4">Tambah Produk</h3>

            <form action="<?= base_url('admin/products/store')?>" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-control">
        <option value="">-- Pilih Category --</option>
        <?php foreach ($categories as $c): ?>
            <option value="<?= $c['id']; ?>">
                <?= $c['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/admin/products" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>