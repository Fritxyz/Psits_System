<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= ($title) ?> - PSITS</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link href="https://fonts.googleapis.com/css?family=Karla|Lexend|Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('css/psits/psits-home-custom.css') ?>" />
  <link rel="icon" type="image/png" href="<?= base_url('image/psits-assets/psits.png') ?>" />
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url('image/psits-assets/psits.png') ?>" alt="PSITS Logo" width="50" />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item"><a class="nav-link <?= $title == 'Home' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link <?= $title == 'News' ? 'active' : '' ?>" href="<?= base_url('/news') ?>">News</a></li>
        <li class="nav-item"><a class="nav-link <?= $title == 'Achievements' ? 'active' : '' ?>" href="<?= base_url('/achievements') ?>">Achievements</a></li>
        <li class="nav-item"><a class="nav-link <?= $title == 'Courses' ? 'active' : '' ?>" href="<?= base_url('/courses') ?>">Courses</a></li>
        <li class="nav-item ms-3">
          <button class="btn btn-outline-light">Enroll Now</button>
        </li>
      </ul>
    </div>
  </nav>

  <!-- // todo: fix the home page tapos validation na sa user roles -->