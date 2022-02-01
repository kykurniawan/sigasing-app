<?php
if (isset($_POST['button_create'])) {
    $database = new Database();
    $connection = $database->getConnection();
    $namaLokasi = htmlspecialchars($_POST['nama_lokasi']);

    $validateSQL = "SELECT * FROM lokasi WHERE nama_lokasi = ?";
    $statement = $connection->prepare($validateSQL);
    $statement->bindParam(1, $namaLokasi);
    $statement->execute();
    if ($statement->rowCount() > 0) {
?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismis="alert" aria-hidden="true">x</button>
            <h5><i class="icon fas fa-ban"></i> Gagal</h5>
            Nama lokasi sudah ada
        </div>
<?php
    } else {
        $insertSQL = "INSERT INTO lokasi SET nama_lokasi = ?";
        $statement = $connection->prepare($insertSQL);
        $statement->bindParam(1, $namaLokasi);
        if ($statement->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = 'Berhasil simpan data';
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = 'Gagal simpan data';
        }
        echo '<meta http-equiv="refresh" content="0;url=?page=lokasiread">';
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data Lokasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=lokasiread">Lokasi</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Lokasi</h3>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="nama_lokasi">Nama Lokasi</label>
                    <input type="text" class="form-control" name="nama_lokasi">
                </div>
                <a href="?page=lokasiread" class="btn btn-danger btn-sm float-right">Batal</a>
                <button name="button_create" type="submit" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>