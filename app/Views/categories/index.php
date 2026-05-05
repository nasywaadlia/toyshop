<!DOCTYPE html>
<html>
<head>
    <title>Kelola Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffdee9, #b5fffc);
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border: none;
            border-radius: 20px;
        }

        .table th {
            background-color: #ff4d6d;
            color: white;
        }

        .btn {
            border-radius: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card shadow-lg p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary mb-0">
                Kelola Kategori
            </h3>

            <div class="d-flex gap-2 ms-auto">
        <a href="<?= base_url('admin/products') ?>" 
           class="btn btn-secondary">
           Kembali
        </a>

            <a href="<?= base_url('admin/categories/create') ?>" 
               class="btn btn-primary">
               Tambah Kategori
            </a>
        </div>
  </div>
        <table class="table table-bordered align-middle">

            <thead>
                <tr>
                    <th>Nama</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($categories as $c): ?>
                <tr>
                    <td><?= $c['name']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/categories/edit/'.$c['id']) ?>" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <a href="<?= base_url('admin/categories/delete/'.$c['id']) ?>" 
                           onclick="return confirm('Yakin hapus?')" 
                           class="btn btn-danger btn-sm">
                           Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</div>

</body>
</html>