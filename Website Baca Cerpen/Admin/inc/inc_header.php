<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <title>Admin Dashboard</title>
</head>

<body>
  <?php
  session_start();
  include "../service/db.php";
  ?>
  <?php
  $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : '';
  ?>
  <header>
    <nav
      class="navbar  navbar-expand-lg bg-body bg-body-tertiary fixed-top"
      data-bs-theme="light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Baca Cerpen</a>
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
          <ul class="navbar-nav nav-underline mb-6 mb-lg-6">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Filter Komentar</a>
            </li>
          </ul>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
              const loginButton = document.querySelector('button[name="login"]');

              loginButton.addEventListener("click", function() {
                window.location.href = "../Login.php";
              });
            });
          </script>
          <span class="navbar-button navbar-text ms-3">
            <button class="btn btn-outline-danger" type="button" name="login">
              Log Out
            </button>
          </span>
        </div>
      </div>
    </nav>
  </header>
  <main>