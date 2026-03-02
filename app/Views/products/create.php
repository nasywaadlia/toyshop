<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
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

    .form-control,
    .form-select {
        border-radius: 12px;
        padding: 10px 15px;
        border: 2px solid #f1f1f1;
        transition: 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
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

    .btn-secondary {
        background: #adb5bd;
        border: none;
    }

    .btn-secondary:hover {
        background: #ced4da;
        transform: scale(1.05);
    }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow-lg">
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
                    <select name="category_id" class="form-select">
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

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/admin/products" class="btn btn-secondary">Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>