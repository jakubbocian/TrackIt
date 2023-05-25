<!doctype html>

<html lang="en" data-bs-theme="auto">

<head>
  <?php

  session_start();
  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

    header('Location: accesso/login.php');
    exit;
  }

  $user = $_SESSION["username"];

  ?>

  <meta charset="utf-8">
  <title>I tuoi pacchi</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/badges/">
  <link href="css/bootstrap2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./index_files/css">
  <link rel="stylesheet" href="./index_files/style.css">
  <link rel="stylesheet" href="./index_files/bootstrap.min.css">
  <link rel="stylesheet" href="./index_files/magnific-popup.css">
  <link rel="stylesheet" href="./index_files/jquery-ui.css">
  <link rel="stylesheet" href="./index_files/owl.carousel.min.css">
  <link rel="stylesheet" href="./index_files/owl.theme.default.min.css">
  <link rel="stylesheet" href="./index_files/bootstrap-datepicker.css">
  <link rel="stylesheet" href="./index_files/flaticon.css">
  <link rel="stylesheet" href="./index_files/aos.css">
  <link rel="stylesheet" href="./index_files/style(1).css">

  <style>
    .d-flex {
      width: 75%;
      margin: 0 auto;
      background-color: rgb(100, 100, 50, 0.2);
      border-left: 1px solid black;
      border-right: 1px solid black;
    }

    .d-flex2 {
      width: 75%;
      margin: 0 auto;
      background-color: rgb(100, 100, 50, 0.2);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 0.5rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    body {
      padding-top: 50px;
      /* altezza della barra di navigazione */
    }
  </style>

  <!-- Aggiungi questo codice alla sezione head del tuo documento HTML -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-xEu+JhjZB2mOzq1oBKh+2yhB6Eotm05gVyOoB+tdKtqhqNm1NdDCJ6g1nKls1lhzBcyg1xjmxpRdZlkmq16DnQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profilo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accesso/logout.php">Esci</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</head>

<body>

  <div class="b-example-divider"></div>

  <div class="d-flex2 gap-2 justify-content-center py-5">

    <p>
    <h2>I pacchi di <?php echo "$user" ?></h2>
    </p>

  </div>

  <div class="b-example-divider"></div>
  <div class="d-flex gap-2 justify-content-center py-5">

    <p>ciao</p>

  </div>
  <div class="b-example-divider"></div>

  <div class="d-flex gap-2 justify-content-center py-5">

    <p>ciwdwdwdao</p>

  </div>

</body>

</html>