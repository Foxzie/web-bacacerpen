<?php
include "../Admin/inc/inc_header.php";
include "../service/db.php";
?>
<?php
$sukses = "";
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : '';
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = '';
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM cerpen WHERE id='$id'";
    $q1 = $conn->query($sql1);
    if ($q1) {
        $sukses = "Data berhasil dihapus";
    }
}
?>
<br><br>
<div class="container mt-5">
    <form class="row g-3" method="get">
        <div class="col-auto">
            <input type="text" class="form-control" name="katakunci" placeholder="Masukkan Judul Cerpen " value="<?php echo $katakunci ?>">
        </div>
        <div class="col-auto">
            <input type="submit" value="Cari Tulisan" name="cari" class="btn btn-primary mb-3">
        </div>
    </form>
</div>

<?php
if ($sukses) {
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses; ?>
    </div>
<?php
} ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th class="col-1">Judul</th>
            <th class="col-1">Gambar</th>
            <th>Sinopsis</th>
            <th class="col-1">Genre</th> <!-- Tambahkan kolom Genre -->
            <th class="col-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sqltambahan = "";
        // Prepare the SQL query based on the search keyword
        if ($katakunci != '') {
            $array_katakunci = explode(" ", $katakunci);
            for ($x = 0; $x < count($array_katakunci); $x++) {
                $sqlcari[] = "(judul LIKE '%$array_katakunci[$x]%' OR sinopsis LIKE '%$array_katakunci[$x]%')";
            }
            $sqltambahan = " WHERE " . implode(" OR ", $sqlcari);
        }
        // Initialize variables
        $sql1 = "SELECT * FROM cerpen $sqltambahan";
        $per_halaman = 5; // Set the number of records per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get the current page number
        $memulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0; // Calculate the starting point for the query
        $f2 = $conn->query($sql1);
        $jml = mysqli_num_rows($f2); // Get the total number of records
        $jml_halaman = ceil($jml / $per_halaman); // Calculate
        $q1 = $conn->query($sql1);
        $nomor = $memulai + 1; // Initialize the record number
        $sql1 = $sql1 . " ORDER BY id DESC LIMIT $memulai, $per_halaman"; // Add LIMIT clause to the query

        while ($r1 = mysqli_fetch_array($q1)) {
        ?>
            <tr>
                <td>
                    <?php echo $nomor++; ?>
                </td>
                <td><?php echo $r1['judul']; ?></td>
                <td><img src="../uploads/<?php echo $r1['gambar']; ?>" alt="<?= $r1['judul']; ?>" width="150px" height="150px"></td>
                <td>
                    <?php echo $r1['sinopsis']; ?>
                </td>
                <td>
                    <?php echo $r1['genre']; ?> <!-- Tampilkan genre -->
                </td>
                <td>
                    <a href="delete.php?op=delete&id=<?php echo $r1['id']; ?>" class="text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <span class="badge text-bg-danger">Delete</span>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        $cari = (isset($_GET['cari'])) ? $_GET['cari'] : '';
        for ($i = 1; $i <= $jml_halaman; $i++) {
        ?>
            <li class="page-item">
                <a href="delete.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>
<br><br>
<?php
include "../Admin/inc/inc_footer.php";
?>
</main>
</body>

</html>