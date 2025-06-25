<?php include "inc/inc_header.php";
include "service/db.php" ?>
<title>Fantasi & Pendidikan</title>
<style>
    body {
        background-color: rgb(140, 185, 229);
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    h1,
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #0056b3;
    }

    .container {
        padding: 30px;
        border-radius: 15px;
        background-color: #ffffff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .hero-image {
        max-width: 90%;
        height: auto;
        display: block;
        margin: 0 auto 20px;
        border-radius: 15px;
    }

    .cards-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        /* Space between cards */
        padding: 15px;
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .card img {
        border-radius: 15px 15px 0 0;
        height: 400px;
        object-fit: cover;
    }

    .card-body {
        padding: 20px;
    }

    .card-text {
        font-weight: bold;
        color: #0056b3;
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
        transform: scale(1.05);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }
</style>
</head>

<body>

    <br><br>
    <div class="container mt-5 fade-in">
        <h1>Fantasi & Pendidikan</h1>
        <p>Dalam dunia pendidikan, cerita pendek dengan tema fantasi dapat menjadi alat yang efektif untuk menarik minat siswa dan mengajarkan nilai-nilai penting. Cerita-cerita ini tidak hanya menghibur, tetapi juga memberikan pelajaran berharga tentang moralitas, tanggung jawab, dan pentingnya belajar.</p>
        <img src="./img/belajar.jpg" alt="Ilustrasi Belajar" class="hero-image fade-in">
    </div>
    <div class="container mt-5 fade-in">
        <h2>Berikut adalah Cerpen dengan Tema Fantasi & Pendidikan</h2>
        <br>
        <div class="cards-container">
            <?php
            $sql1 = "SELECT * FROM cerpen WHERE genre = 'Fantasi dan Pendidikan'";
            $result = $conn->query($sql1);
            while ($r1 = mysqli_fetch_array($result)) {
                $fileName = $r1['file_name'];
            ?>
                <div class="card fade-in" onclick="window.location.href='./membaca/<?php echo $fileName; ?>'">
                    <img src="./uploads/<?php echo $r1['gambar']; ?>" alt="<?= $r1['judul']; ?>">
                    <div class="card-body">
                        <p class="card-text text-truncate"><?php echo $r1['judul']; ?></p>
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
        const fadeInElements = document.querySelectorAll('.fade-in');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            });
        }, {
            threshold: 0.1
        });

        fadeInElements.forEach(element => {
            observer.observe(element);
        });
    </script>
</body>

</html>