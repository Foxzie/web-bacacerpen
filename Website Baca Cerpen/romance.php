<?php include "inc/inc_header.php";
include "service/db.php" ?>
<title>Romansa</title>
<style>
    body {
        background-color: #f9f3f3;
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    h1,
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #e63946;
    }

    .container {
        padding: 30px;
        border-radius: 15px;
        background-color: #ffffff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .cards-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        padding: 15px;
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .card img {
        width: 100%;
        height: 320px;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
    }

    .card-body {
        padding: 15px;
    }

    .card-text {
        font-weight: bold;
        color: #e63946;
        text-align: center;
        margin: 0;
    }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .card:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .hero-image {
        width: 90%;
        max-width: 550px;
        height: auto;
        display: block;
        margin: 0 auto 20px;
        border-radius: 15px;
    }
</style>
</head>

<body>

    <br><br>
    <div class="container mt-5 fade-in">
        <h1>Romansa</h1>
        <p>Cerita pendek romansa memiliki daya tarik yang kuat, menyentuh hati pembaca dengan kisah cinta yang manis dan penuh emosi. Genre ini menggambarkan perjalanan hubungan yang penuh tantangan, mengajarkan nilai-nilai seperti pengorbanan dan komunikasi. Dengan latar belakang beragam, cerita ini menciptakan ikatan emosional yang kuat, menginspirasi pembaca untuk memahami arti cinta sejati.</p>
        <img src="./img/romansa.png" alt="Ilustrasi Romansa" class="hero-image fade-in">
    </div>
    <br>
    <div class="container mt-5 fade-in">
        <h2>Berikut adalah Cerpen dengan Tema Romansa</h2>
        <br>
        <div class="cards-container">
            <?php
            $sql1 = "SELECT * FROM cerpen WHERE genre = 'Romansa'";
            $result = $conn->query($sql1);
            while ($r1 = mysqli_fetch_array($result)) {
                $fileName = $r1['file_name'];
            ?>
                <div class="card fade-in" onclick="window.location.href='./membaca/<?php echo $fileName; ?>'">
                    <img src="./uploads/<?php echo $r1['gambar']; ?>" alt="<?= $r1['judul']; ?>">
                    <div class="card-body">
                        <p class="card-text"><?php echo $r1['judul']; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <br>

    <?php include 'inc/inc_footer.php' ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fadeInElements = document.querySelectorAll('.fade-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            fadeInElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>

</html>