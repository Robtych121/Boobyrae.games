<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-md-4 pt-1">
        
      </div>
      <div class="col-md-4 text-center">
        <a class="blog-header-logo text-dark" href="index.php">Boobyrae Games</a>
      </div>
      <div class="col-md-4 d-flex justify-content-end align-items-center">
        <?php
        if(IsLoggedIn() === true){
            echo '<a class="btn btn-sm btn-outline-secondary nav-btn" href="profile.php">'. getUsernameDetail($_SESSION['user_id']) . '</a>';
            echo '<a class="btn btn-sm btn-outline-secondary nav-btn" href="logout.php">Logout</a>';
        } else {
            echo '<a class="btn btn-sm btn-outline-secondary nav-btn" href="login.php">Login</a>';
           # echo '<a class="btn btn-sm btn-outline-secondary nav-btn" href="register.php">Register</a>';
        }
        ?> 
      </div>
    </div>
  </header>
</div>