<!-- First Navigation -->
<nav class="navbar nav-first navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="http://localhost/SISTEMA-CARTA-RESTAURANTE/FRONTEND">
      <img src="vista/img/img-plantilla/logo-principal.jpg" alt="LOGO PRINCIPAL">
    </a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-primary" href="#home">Consultas al : <span class="pl-2 text-muted">(+51) 963 811
            015</span></a>
      </li>
    </ul>
  </div>
</nav>

<?php
if (!isset($_GET['ruta']) || $_GET['ruta'] === 'principal') {

?>

  <!-- Second Navigation -->
  <nav class="nav-second navbar custom-navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container">
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#about">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#service">Nuestra carta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#team">Nuestro Equipo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#testmonial">Reseñas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="header">
    <div class="overlay">
      <img src="vista/img/img-plantilla/logo-principal.jpg" alt="logo" class="logo">
      <h1 class="subtitle">Bienvenidos a Restaurant y Eventos</h1>
      <h1 class="title">MUSTANG Ranch</h1>
    </div>
  </header>
<?php   } ?>