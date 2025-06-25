<?php
include 'inc/inc_header.php';
include 'service/db.php';
?>
<title>Membaca</title>
<style>
    body {
        background-image: url('./img/membaca.png');
        /* Light background color */
        font-family: 'Arial', sans-serif;
        /* Change font for better aesthetics */
    }

    .container {
        background-color: white;
        /* White background for containers */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        padding: 20px;
        /* Padding for inner spacing */
        margin-bottom: 30px;
        /* Space between containers */
    }

    h1,
    h3 {
        color: #343a40;
        /* Darker text color for headings */
        text-align: center;
        /* Center align headings */
    }

    img {
        border-radius: 10px;
        /* Rounded corners for images */
    }

    .card {
        transition: transform 0.3s;
        /* Smooth scaling effect on hover */
    }

    .card:hover {
        transform: scale(1.05);
        /* Scale up on hover */
    }

    .modified {
        color: #007bff;
        /* Blue color for the modified text */
        font-weight: bold;
        /* Bold text */
    }
</style>
</head>

<body>
    <br><br>
    <div class="container mt-5 fade-in">
        <h1>Selamat Datang di <span class="modified">Halaman Genre !</span>
        </h1>
        <p>Di halaman ini, Anda tidak hanya akan menemukan cerita-cerita yang menghibur, tetapi juga karya-karya yang dapat memperluas perspektif dan menambah pengetahuan Anda. Kami percaya bahwa setiap cerita memiliki kekuatan untuk menyentuh hati dan mengubah cara pandang kita terhadap kehidupan. Dengan berbagai pilihan genre, kami berharap dapat memenuhi selera setiap pembaca, baik yang mencari hiburan ringan maupun yang ingin merenungkan tema-tema yang lebih dalam.</p>
        <br>
        <div style="max-width: 550px; margin: 0 auto;">
            <img src="./img/membaca.jpg" alt="" style="object-fit: cover; width: 90%; height: auto;">
        </div>
        <br>
    </div>

    <div>
        <div class="container mt-5 fade-in">
            <h3>Berikut Adalah Genre Cerpen Kami</h3>
            <div class="container mt-5" style="display:-webkit-flex; justify-content: center; align-items: center; flex-wrap:wrap; margin: 0px 10px 0px 10px; padding: 20px;">
                <div class="card" style="width: 18rem; margin-right: 10px; margin-left: 10px; margin-bottom: 20px;" name="button">
                    <img src="./img/pelajaran.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-truncate text-center">Fantasi & Pendidikan</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-right: 20px; margin-left: 10px; margin-bottom: 20px;" name="button1">
                    <img src="./img/horor.jpg" class="card-img-top " alt="...">
                    <div class="card-body">
                        <p class="card-text text-truncate text-center">Horor & Misteri</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-right: 20px; margin-left: 10px; margin-bottom: 20px;" name="button2">
                    <img src="./img/mawar1.jpg" class="card-img-top " alt="...">
                    <div class="card-body">
                        <p class="card-text text-truncate text-center">Romansa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @keyframes scrollspy {
            from {
                opacity: 0;
                scale: 0;
            }

            to {
                opacity: 1;
                scale: 1;
            }
        }

        /* Animation styles */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Fantasi = document.querySelector('div[name="button"]');
            const Horor = document.querySelector('div[name="button1"]');
            const Romance = document.querySelector('div[name="button2"]');
            Fantasi.addEventListener('click', function() {
                window.location.href = 'fantasi.php'; // Redirect to the Cerpen page
            });
            Horor.addEventListener('click', function() {
                window.location.href = 'horor.php'; // Redirect to the Cerpen page
            });
            Romance.addEventListener('click', function() {
                window.location.href = 'romance.php'; // Redirect to the Cerpen page
            });

            // Scroll animation - akan trigger baik saat scroll ke bawah maupun ke atas
            const fadeInElements = document.querySelectorAll('.fade-in');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    // Tambahkan atau hapus class 'visible' berdasarkan apakah elemen terlihat
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    } else {
                        entry.target.classList.remove('visible');
                    }
                });
            }, {
                threshold: 0.1 // Trigger ketika 10% elemen terlihat
            });

            fadeInElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
    <?php include 'inc/inc_footer.php' ?>
</body>

</html>