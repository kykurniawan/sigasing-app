<?php
if (isset($_GET['id'])) {

    $database = new Database();
    $connection = $database->getConnection();

    $id = $_GET['id'];
    $findSQL = "SELECT * FROM lokasi WHERE id=?";
    $statement = $connection->prepare($findSQL);
    $statement->bindParam(1, $_GET['id']);
    $statement->execute();
    $row = $statement->fetch();
    if (isset($row['id'])) {
        if (isset($_POST['button_update'])) {
            $validateSQL = "SELECT * FROM lokasi WHERE nama_lokasi = ? AND id != ?";
            $statement = $connection->prepare($validateSQL);
            $statement->bindParam(1, $_POST['nama_lokasi']);
            $statement->bindParam(2, $_GET['id']);
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
                $updateSQL = "UPDATE lokasi SET nama_lokasi = ? WHERE id = ?";
                $statement = $connection->prepare($updateSQL);
                $statement->bindParam(1, $_POST['nama_lokasi']);
                $statement->bindParam(2, $_GET['id']);
                if ($statement->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = 'Berhasil ubah data';
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = 'Gagal ubah data';
                }
                echo '<meta http-equiv="refresh" content="0;url=?page=lokasiread">';
            }
        }
        ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb2">
                    <div class="col-sm-6">
                        <h1>Ubah Data Lokasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="?page=lokasiread">Lokasi</a></li>
                            <li class="breadcrumb-item active">Ubah Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah Lokasi</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="text" name="nama_lokasi" class="form-control" value="<?= $row['nama_lokasi'] ?>">
                        </div>
                        <a href="?page=lokasiread" class="btn btn-danger btn-sm float-right">Batal</a>
                        <button name="button_update" type="submit" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </section>
<?php
    } else {
        echo '<meta http-equiv="refresh" content="0;url=?page=lokasiread">';
    }
} else {
    echo '<meta http-equiv="refresh" content="0;url=?page=lokasiread">';
}
?>