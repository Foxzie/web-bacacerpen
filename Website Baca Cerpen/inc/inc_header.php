<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>


    <header>
        <nav
            class="navbar  navbar-expand-lg bg-body bg-body-tertiary fixed-top"
            data-bs-theme="light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Baca Cerpen</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarText"
                    aria-controls="navbarText"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="justify-content-end collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav  nav-underline mb-6 mb-lg-6">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Cerpen.php">Membaca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Donate.php">Donate Me</a>
                        </li>
                    </ul>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const loginButton = document.querySelector('button[name="login"]');

                            loginButton.addEventListener("click", function() {
                                window.location.href = "Login.php";
                            });
                        });
                    </script>
                    <span class="navbar-button navbar-text ms-3">
                        <button class="btn btn-outline-warning" type="button" name="login">
                            Admin Login
                        </button>
                    </span>
                </div>
            </div>
        </nav>
    </header>