<section class="content-header">
    <div class="container-fluid">
        <?php
        if (isset($_POST['button_create'])) {
            $database = new Database();
            $connection = $database->getConnection();
            $namaJabatan = htmlspecialchars($_POST['nama_jabatan']);
            $gapokJabatan = htmlspecialchars($_POST['gapok_jabatan']);
            $tunjanganJabatan = htmlspecialchars($_POST['tunjangan_jabatan']);
            $uangMakanPerhari = htmlspecialchars($_POST['uang_makan_perhari']);

            $validateSQL = "SELECT * FROM jabatan WHERE nama_jabatan = ?";
            $statement = $connection->prepare($validateSQL);
            $statement->bindParam(1, $namaJabatan);
            $statement->execute();
            if ($statement->rowCount() > 0) {
        ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismis="alert" aria-hidden="true">x</button>
                    <h5><i class="icon fas fa-ban"></i> Gagal</h5>
                    Nama jabatan sudah ada
                </div>
        <?php
            } else {
                $insertSQL = "INSERT INTO jabatan SET nama_jabatan = ?, gapok_jabatan = ?, tunjangan_jabatan = ?, uang_makan_perhari = ?";
                $statement = $connection->prepare($insertSQL);
                $statement->bindParam(1, $namaJabatan);
                $statement->bindParam(2, $gapokJabatan);
                $statement->bindParam(3, $tunjanganJabatan);
                $statement->bindParam(4, $uangMakanPerhari);
                if ($statement->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = 'Berhasil simpan data';
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = 'Gagal simpan data';
                }
                echo '<meta http-equiv="refresh" content="0;url=?page=jabatanread">';
            }
        }
        ?>

        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data Jabatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=jabatanread">Jabatan</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Jabatan</h3>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="nama_jabatan">Nama Jabatan</label>
                    <input type="text" class="form-control" name="nama_jabatan">
                </div>
                <div class="form-group">
                    <label for="gapok_jabatan">Gaji Pokok</label>
                    <input type="number" class="form-control" name="gapok_jabatan" onkeypress="return (event.charCode > 47 && event.charCode < 58) || event.charCode == 46">
                </div>
                <div class="form-group">
                    <label for="tunjangan_jabatan">Tunjangan</label>
                    <input type="number" class="form-control" name="tunjangan_jabatan" onkeypress="return (event.charCode > 47 && event.charCode < 58) || event.charCode == 46">
                </div>
                <div class="form-group">
                    <label for="uang_makan_perhari">Uang Makan Perhari</label>
                    <input type="number" class="form-control" name="uang_makan_perhari" onkeypress="return (event.charCode > 47 && event.charCode < 58) || event.charCode == 46">
                </div>
                <a href="?page=jabatanread" class="btn btn-danger btn-sm float-right">Batal</a>
                <button name="button_create" type="submit" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>