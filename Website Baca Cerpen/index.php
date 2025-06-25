<?php
include "service/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "inc/inc_header.php";
?>
<title>Home</title>
<style>
    body {
        background-image: url('./img/bg.png');
        background-size: cover;
        height: 100vh;
        margin: 0;
        width: 100%;
    }

    .carousel-item {
        display: flex;
        justify-content: center;
        align-items: center;
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

    .modif {
        color: rgb(35, 101, 166);
        /* Blue color for the modified text */
        font-weight: bold;
        /* Bold text */
    }
</style>
</head>

<body>
    <br> <br>
    <div class="container mt-5 fade-in">
        <h1>Selamat Datang di <span class="modif">Baca Cerpen!</span></h1>
        <hr style="border: 5px solid black;">
        <div class="row">
            <div class="col-md-8">
                <p>Baca Cerpen dibuat untuk memberikan platform bagi para penulis dan pembaca cerita pendek. Anda dapat menemukan berbagai genre cerita, mulai dari fiksi, non-fiksi, hingga fantasi. Kami percaya bahwa setiap cerita memiliki kekuatan untuk menginspirasi dan mengubah cara pandang kita terhadap dunia. Dengan membaca, Anda tidak hanya menikmati kisah-kisah menarik, tetapi juga mendukung para penulis dalam berkarya. Jika Anda menyukai platform ini dan ingin membantu pengembang serta penulis, kami sangat menghargai setiap donasi yang Anda berikan. Setiap kontribusi Anda akan membantu kami untuk terus menyediakan konten berkualitas dan memperluas jangkauan cerita-cerita yang dapat dinikmati oleh semua orang.</p>
            </div>
            <div class="col-md-4">
                <img src="./img/sd.png" alt="" class="img-fluid rounded">
            </div>
        </div>
    </div>
    <br>
    <div style="background-color:rgb(135, 206, 219); padding: 20px;" class="fade-in">
        <div class="container mt-5 fade-in">
            <h2>Visi dan Misi</h2>
            <hr style="border: 5px solid black;">
            <div class="row">
                <div class="col-md-8">
                    <h3>Visi</h3>
                    <p>Menjadi platform terkemuka untuk pembaca cerita pendek, yang menginspirasi dan menghubungkan orang melalui karya sastra. Kami berkomitmen untuk menciptakan lingkungan yang mendukung eksplorasi kreativitas dan imajinasi, di mana setiap individu dapat menemukan cerita yang menggugah emosi dan memperluas wawasan. Dengan menyediakan akses mudah ke berbagai genre dan tema, kami berharap dapat membangun komunitas yang saling berbagi pengalaman dan perspektif, serta mendorong diskusi yang bermakna di antara para pembaca.</p>
                    <h3>Misi</h3>
                    <ul>
                        <li>Menambah wawasan bagi pembaca melalui berbagai karya sastra.</li>
                        <li>Mendorong pembaca untuk menemukan dan menikmati berbagai genre cerita.</li>
                        <li>Membangun platform yang mendukung dan menghargai karya sastra.</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <img src="./img/visi-misi.png" alt="Visi dan Misi" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container mt-5 fade-in">
        <h3>Karya - Karya Penulis</h3>
        <hr style="border: 5px solid black;">
        <div class="container mt-5">
            <div id="storyCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $sql = "SELECT * FROM cerpen ORDER BY id DESC LIMIT 6"; // Fetch the latest 6 stories for 2 slides
                    $result = $conn->query($sql);
                    $active = true; // To set the first item as active
                    $count = 0; // To count the number of stories displayed

                    while ($r1 = mysqli_fetch_array($result)) {
                        // Start a new carousel item every 3 stories
                        if ($count % 3 == 0) {
                            if ($count > 0) {
                                echo '</div>'; // Close the previous carousel item
                            }
                            echo '<div class="carousel-item align-items-center' . ($active ? ' active' : '') . '">';
                            $active = false; // Set active to false after the first item
                        }
                    ?>
                        <div class="card" style="width: 18rem; margin: 10px; box-shadow: 0 10px 12px rgba(0, 0, 0, 0.2); display: inline-block;">
                            <img src="./uploads/<?php echo $r1['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text text-truncate text-center"><?php echo $r1['judul']; ?></p>
                            </div>
                        </div>
                    <?php
                        $count++;
                    }
                    // Close the last carousel item
                    if ($count > 0) {
                        echo '</div>';
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#storyCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#storyCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br>
        <center><button type="button" class="btn btn-dark" style="margin-bottom: 10px;" name="learn">Learn More</button></center>
    </div>
    <br>
    <div style="background-color:rgb(144, 135, 145); padding: 20px;" class="fade-in">
        <div class="container mt-5 fade-in">
            <h2>Contact Us</h2>
            <p>If you have any feedback, please feel free to reach out to us through our contact page.</p>
            <p>We value your input about this website!</p>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Your Name" class="form-control mb-2" required>
                <input type="email" name="email" placeholder="Your Email" class="form-control mb-2" required>
                <textarea name="message" placeholder="Your Message" class="form-control mb-2" rows="4" required></textarea>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                $to = "wolft6977@gmail.com"; // Change to your email
                $subject = "New Contact Form Submission";
                $body = "Name: $name\nEmail: $email\nMessage:\n$message";
                $headers = "From: $email";

                if (mail($to, $subject, $body, $headers)) {
                    echo "<div class='alert alert-success mt-3'>Message sent successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Failed to send message. Please try again later.</div>";
                }
            }
            ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const learnButton = document.querySelector('button[name="learn"]');
            learnButton.addEventListener('click', function() {
                window.location.href = 'Cerpen.php';
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

    <?php include "inc/inc_footer.php" ?>
</body>

</html>