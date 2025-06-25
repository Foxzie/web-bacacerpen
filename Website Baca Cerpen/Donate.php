<title>Donate</title>
</head>


<body style=" background-image: url('./img/donate.png');">
    <?php include 'inc/inc_header.php'; ?>
    <br><br><br>
    <div class="container mt-5 d-flex justify-content-center align-items-center" style="text-align: center; border: 1px solid #ccc; padding: 30px; border-radius: 10px; background-color:rgb(171, 182, 192); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div>
            <h1 class="text-center mb-4">Support Our Project</h1>
            <p class="text-center mb-4">Your contributions help us maintain and improve our project. If you find our work valuable, please consider donating.</p>
            <p class="text-center mb-4">You can donate via QRIS. Here are the details:</p>
            <div class="d-flex justify-content-center align-items-center" style="background-color: orange; width: 240px; padding: 20px; border-radius: 10px; margin: 0 auto;">
                <img src="./img/qris.png" alt="QRIS Donation QR Code" style="width: 200px; height: 200px;">
            </div>
        </div>
    </div>
    <br>
    <?php include 'inc/inc_footer.php'; ?>
</body>

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
</script>

</html>