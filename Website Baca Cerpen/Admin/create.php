<?php
include "../Admin/inc/inc_header.php";
include "../service/db.php";

// Initialize variables
$judul = $sinopsis = $isi = $genre = "";
$loginError = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = trim($_POST["judul"]);
    $sinopsis = trim($_POST["sinopsis"]);
    $isi = trim($_POST["isi"]);
    $genre = trim($_POST["genre"]); // Ambil genre dari input

    if (isset($_POST["submit"])) {
        if ($_FILES['gambar']['error'] === 4) {
            echo '<script>alert("Gambar tidak boleh kosong!");</script>';
        } else {
            $fileName = $_FILES['gambar']['name'];
            $fileSize = $_FILES['gambar']['size'];
            $tmpName = $_FILES['gambar']['tmp_name'];

            $validImageExtension = ['jpg', 'jpeg', 'png', 'PNG'];
            $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!in_array($imageExtension, $validImageExtension)) {
                echo '<script>alert("Format gambar tidak valid!");</script>';
            } elseif ($fileSize > 1000000) { // 1MB
                echo '<script>alert("Ukuran gambar terlalu besar!");</script>';
            } else {
                $newImageName = uniqid() . '.' . $imageExtension;
                move_uploaded_file($tmpName, '../uploads/' . $newImageName);
                $gambar = $newImageName;

                // Tentukan nomor untuk file baru
                $directory = "../membaca/";
                $files = glob($directory . "baca*.php");

                if (count($files) > 0) {
                    // Ambil file terakhir
                    $lastFile = end($files);
                    // Ekstrak nomor dari nama file
                    preg_match('/baca(\d+)\.php$/', $lastFile, $matches);
                    $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0;
                    $newNumber = $lastNumber + 1;
                } else {
                    $newNumber = 1; // Jika tidak ada file sebelumnya
                }

                $newFileName = "baca" . $newNumber . ".php";

                // Insert into database
                $sql = "INSERT INTO cerpen (judul, gambar, sinopsis, isi, genre, tgl, file_name) VALUES ('$judul', '$gambar', '$sinopsis', '$isi', '$genre', NOW(), '$newFileName')";
                if ($conn->query($sql) === TRUE) {
                    // Lanjutkan dengan pembuatan file baru
                    $myfile = fopen("../membaca/" . $newFileName, "w") or die("Unable to open file!");

                    $txt = "<?php
include '../service/db.php';
?>
<?php
// Mengambil cerpen terakhir yang ditambahkan
\$sql1 = 'SELECT * FROM cerpen WHERE file_name = \"$newFileName\"';
\$result = \$conn->query(\$sql1);
\$r1 = mysqli_fetch_array(\$result);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js' integrity='sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO' crossorigin='anonymous'></script>
    <title><?php echo \$r1['judul']; ?></title>
</head>
<body>
    <script>
        // JavaScript to create a moving title effect
        let titleText = '<?php echo \$r1['judul'] . \" \" . \"Membaca\" . \"-\"; ?>'; 
        let currentText = titleText;
        let titleElement = titleText;

        function updateTitle() {
            titleElement = titleElement.slice(1) + titleElement.charAt(0);
            document.title = titleElement;
        }

        setInterval(updateTitle, 300);
    </script>
    <style>
        .body {
            background-color: rgb(32, 119, 194);
        }
    </style>
    <div class='container mt-5' style='padding: 3px;' max-width='230px'>
        <center>
            <h1><?php echo \$r1['judul']; ?></h1>
            <p>Penulis: Amir</p>
        </center>
        <div class='container mt-5' max-width='550px'>
            <img src='../uploads/<?php echo \$r1['gambar']; ?>' alt='<?php echo \$r1['judul']; ?>' style='object-fit: cover; width: 50%; height: auto; display: flex; margin: 0 auto;'>
        </div>
        <br>
        <div class='container mt-5' max-width='550px'>
            <h2>Sinopsis :</h2>
            <p><?php echo \$r1['sinopsis']; ?></p>
        </div>
        <div class='container mt-5' style='padding: 5px;'>
            <center>
                <h2>Isi Cerita</h2>
            </center>
        </div>
        <div class='container mt-5' style='border: 3px solid black; padding: 20px; background-color: rgb(103, 221, 221); height: 600px; overflow-y: scroll;'>
            <p><?php echo \$r1['isi']; ?></p>
        </div>
    </div>
    <br>
    <div class='text-center'>
        <a href='../fantasi.php' class='text-center'>
            << Back To Menu</a>
    </div>
    <br>
</body>
</html>";
                    fwrite($myfile, $txt);
                    fclose($myfile);

                    echo "<script>alert('Cerpen berhasil dibuat dan disimpan di $newFileName!'); window.location.href='dashboard.php';</script>";
                } else {
                    echo '<script>alert("Gagal mengunggah cerpen!");</script>';
                }
            }
        }
    }
}
?>
<br>
<div class="container mt-5">
    <h1>Halaman Pembuatan Cerpen</h1>
    <a href="dashboard.php" class="btn btn-secondary mb-3">
        << Kembali Ke Halaman Admin</a>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Cerpen</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Cerpen</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg" required>
                </div>
                <div class="mb-3">
                    <label for="sinopsis" class="form-label">Sinopsis Cerpen</label>
                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Cerpen</label>
                    <textarea id="isi" name="isi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre Cerpen</label>
                    <br>
                    <button
                        type="button"
                        class="btn btn-success genre-btn"
                        onclick="setGenre('Fantasi dan Pendidikan', this)"
                        style="transition: all 0.3s ease">
                        Fantasi dan Pendidikan
                    </button>

                    <button
                        type="button"
                        class="btn btn-danger genre-btn"
                        onclick="setGenre('Horor dan Misteri', this)"
                        style="transition: all 0.3s ease">
                        Horor dan Misteri
                    </button>

                    <button
                        type="button"
                        class="btn btn-warning genre-btn"
                        onclick="setGenre('Romansa', this)"
                        style="transition: all 0.3s ease">
                        Romansa
                    </button>

                    <input type="hidden" id="genre" name="genre" value="">

                    <style>
                        .genre-btn {
                            position: relative;
                            overflow: hidden;
                        }

                        .genre-btn.active {
                            transform: translateY(-3px);
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
                        }

                        .genre-btn.active::after {
                            content: '';
                            position: absolute;
                            bottom: 0;
                            left: 50%;
                            transform: translateX(-50%);
                            width: 70%;
                            height: 3px;
                            background: white;
                            border-radius: 2px;
                        }

                        .genre-btn:hover {
                            transform: translateY(-1px);
                            filter: brightness(1.05);
                        }

                        .genre-btn:active {
                            transform: translateY(0);
                        }
                    </style>

                    <script>
                        function setGenre(genre, button) {
                            // Remove active class from all buttons first
                            document.querySelectorAll('.genre-btn').forEach(btn => {
                                btn.classList.remove('active');
                            });

                            // Add active class to clicked button
                            button.classList.add('active');

                            // Set the genre value
                            document.getElementById('genre').value = genre;
                        }
                    </script>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="Buat Cerpen">Buat Cerpen</button>
            </form>
</div>
<br>

<!-- Include Summernote CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#isi').summernote({
            height: 300, // set editor height
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>

<?php include "../Admin/inc/inc_footer.php"; ?>
</body>

</html>