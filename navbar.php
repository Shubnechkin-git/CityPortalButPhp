<?php
function navbar($active)
{
  if ($active[3] == '')
    print '
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/main.php">Городской портал</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link ' . $active[0] . '" aria-current="page" href="/main.php">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ' . $active[1] . '" href="/register.php">Регистрация</a>
          </li>
          <li class="nav-item">
          <a class="nav-link ' . $active[2] . '" href="/login.php">Авторизация</a>
          </li>
          </ul>
          </form>
          </div>
          </div>
          </nav>
          ';
  else {
    print '
            <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="/main.php">Городской портал</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link ' . $active[0] . '" aria-current="page" href="/main.php">Главная</a>
            </li>
            <li class="nav-item">
            <a class="nav-link ' . $active[4] . '" aria-current="page" href="/lk.php">' . $active[3] . '</a>
            </li>
            <li class="nav-item">
            <a class="nav-link btn btn-danger" href="logout.php">Выйти</a>
            </li>
            </ul>
            </form>
            </div>
            </div>
            </nav>
            ';
  }
}
