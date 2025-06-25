<?php include "inc/inc_header.php";
include "service/db.php" ?>
<title>Horor dan Misteri</title>
<style>
    body {
        background-color: #121212;
        /* Warna latar belakang gelap untuk suasana horor */
        font-family: 'Arial', sans-serif;
        color: #e0e0e0;
        /* Warna teks yang lebih terang untuk kontras */
    }

    h1,
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #ff3d00;
        /* Warna judul yang mencolok */
    }

    .container {
        padding: 30px;
        /* Menambah padding untuk ruang yang lebih baik */
        border-radius: 15px;
        /* Membuat sudut lebih bulat */
        background-color: #1e1e1e;
        /* Warna latar belakang kontainer */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        /* Bayangan yang lebih dalam */
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
        /* Responsive grid */
        gap: 20px;
        /* Space between cards */
        padding: 15px;
    }

    .card {
        border: none;
        border-radius: 15px;
        /* Membuat sudut kartu lebih bulat */
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* Transisi halus */
    }

    .card img {
        border-radius: 15px 15px 0 0;
        /* Membuat sudut gambar lebih bulat */
        height: 400px;
        object-fit: cover;
    }

    .card-body {
        padding: 20px;
        /* Menambah padding dalam kartu */
    }

    .card-text {
        font-weight: bold;
        color: #ff3d00;
        /* Warna teks yang lebih mencolok */
        text-align: center;
        /* Center text */
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
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.7);
        /* Bayangan lebih dalam saat hover */
    }

    img {
        max-width: 100%;
        /* Memastikan gambar responsif */
        height: auto;
        /* Memastikan tinggi gambar otomatis */
    }
</style>
</head>

<body>

    <br><br>
    <div class="container mt-5 fade-in">
        <h1>Horor dan Misteri</h1>
        <p>Cerita horor menawarkan sensasi menegangkan sekaligus pelajaran hidup. Melalui kisah seram, pembaca diajak menghadapi ketakutan sambil mengeksplorasi sisi gelap manusia. Cerita pendek horor yang baik mampu membangun ketegangan psikologis, mengungkap konsekuensi moral dari tindakan manusia. Genre ini juga mengajarkan keberanian menghadapi ketidakpastian dan melampaui batas kenyataan sehari-hari.</p>

        <img src="./img/horor.png" alt="Ilustrasi Horor" class="hero-image fade-in">
    </div>
    <br>
    <div class="container mt-5 fade-in">
        <h2>Berikut adalah Cerpen dengan Tema Horor dan Misteri</h2>
        <br>
        <div class="cards-container">
            <?php
            $sql1 = "SELECT * FROM cerpen WHERE genre = 'Horor dan Misteri'";
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