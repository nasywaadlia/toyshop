<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(135deg, #ffdee9, #b5fffc);">

<div class="container mt-5">

    <div class="card shadow-lg border-0" style="border-radius:20px;">
        <div class="card-body p-4">

            <h3 class="mb-4 fw-bold text-primary">
                Tambah Kategori
            </h3>

            <form action="<?= base_url('admin/categories/store') ?>" method="post">

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama Kategori
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Contoh: Boneka"
                           required>
                </div>

                <div class="d-flex justify-content-between">

                    <a href="<?= base_url('admin/categories') ?>"
                       class="btn btn-secondary">
                       Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>