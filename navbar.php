<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">BLOG </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../languages/lista.php">INICIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../post/post.php">POST</a>
      </li>

      <?php
      require_once('../functions/database.php');
      $conexion = nuevaConexion();
      $lenguajes = traerLenguajes($conexion);
      foreach ($lenguajes as $elemento) {
        echo '<li class="nav-item">
                <a class="nav-link text-uppercase" href="../post/post.php?lang='.$elemento['id'].'">'.$elemento['name'].'</a>
              </li>';
      }?>
    </ul>
  </div>
</nav>
