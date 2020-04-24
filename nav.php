<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="final.css">

<?php
session_start();
if ($_SESSION['user']) {
  echo ('<nav class="navbar navbar-expand-lg navbar-light navbar-dark">
    <div class="container">
    
    <a class="navbar-brand" href="#">Substriction</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
    
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="about.php">About</a>
          </li>
    
        </ul>
    
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Manage Subscriptions
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="sub.php">Subscriptions</a>
              <a class="dropdown-item" href="create.php">Add Subscription</a>
              <a class="dropdown-item" href="stat.php">By the Numbers</a>
            </div>
          </li>
    
          <li class="nav-item active">
            <a class="nav-link" href="login.php">Logout</a>
          </li>
    
        </ul>
      </div>
    
    </div>
    
    </nav>');
} else {
  echo ('<nav class="navbar navbar-expand-lg navbar-light navbar-dark">
    <div class="container">
    <a class="navbar-brand" href="#">Substriction</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="about.php">About</a>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto">
  
        <li class="nav-item active">
          <a class="nav-link" href="register.php">Register</a>
        </li>
  
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  </div>');
}
?>