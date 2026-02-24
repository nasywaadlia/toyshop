<h2>Checkout</h2>

<form action="<?= base_url('checkout/process') ?>" method="post">
    <input type="text" name="nama" placeholder="Nama Lengkap" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="text" name="no_hp" placeholder="No HP" required><br><br>

    <textarea name="alamat" placeholder="Alamat Lengkap" required></textarea><br><br>

    <button type="submit">Simpan Pesanan</button>
</form>