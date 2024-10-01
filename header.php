<!DOCTYPE html>
<html <?php language_attributes() ?>> 
<head>
  <meta charset="UTF-8"/>
  <meta charset="<?php bloginfo(); ?>">
  <title><?php bloginfo() ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <?php wp_head() ?>
</head>
<body class="d-flex flex-column justify-content-between min-vh-100".<?php body_class(); ?>>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand text-dark-emphasis" href="<?php echo esc_url( home_url( '/' ) ); ?>">S-Master-Child</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>