<?php
 session_start();
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tickets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">X/Z</a>
        </li>

        <?php if(!isset($_SESSION['user'])) { ?>       
        <li class="nav-item">
          <a class="nav-link" href="/include/connexion.php">Connexion</a>
        </li>
        <?php   } else {       ?>       
        <li class="nav-item">
          <a class="nav-link" href="/include/deconnexion.php">Deconnexion</a>
        </li>
        <?php   }       ?>       

      </ul>
    </div>
  </div>
</nav>