<?php
include '../service/db.php';
?>
<?php
// Mengambil cerpen terakhir yang ditambahkan
$sql1 = 'SELECT * FROM cerpen WHERE file_name = "baca2.php"';
$result = $conn->query($sql1);
$r1 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js' integrity='sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO' crossorigin='anonymous'></script>
    <title><?php echo $r1['judul']; ?></title>
</head>
<body>
    <script>
        // JavaScript to create a moving title effect
        let titleText = '<?php echo $r1['judul'] . " " . "Membaca" . "-"; ?>'; 
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
            <h1><?php echo $r1['judul']; ?></h1>
            <p>Penulis: Amir</p>
        </center>
        <div class='container mt-5' max-width='550px'>
            <img src='../uploads/<?php echo $r1['gambar']; ?>' alt='<?php echo $r1['judul']; ?>' style='object-fit: cover; width: 50%; height: auto; display: flex; margin: 0 auto;'>
        </div>
        <br>
        <div class='container mt-5' max-width='550px'>
            <h2>Sinopsis :</h2>
            <p><?php echo $r1['sinopsis']; ?></p>
        </div>
        <div class='container mt-5' style='padding: 5px;'>
            <center>
                <h2>Isi Cerita</h2>
            </center>
        </div>
        <div class='container mt-5' style='border: 3px solid black; padding: 20px; background-color: rgb(103, 221, 221); height: 600px; overflow-y: scroll;'>
            <p><?php echo $r1['isi']; ?></p>
        </div>
    </div>
    <br>
    <div class='text-center'>
        <a href='../fantasi.php' class='text-center'>
            << Back To Menu</a>
    </div>
    <br>
</body>
</html>