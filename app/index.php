<?php
ob_start();
$website_title = 'Home';
include 'includes/init.php';
include 'includes/templates/head.php';
include 'includes/templates/topbar.php';
include 'includes/templates/header.php';
include 'includes/templates/nav.php';
LoggedOutRedirect();
?>

<div class="mainContent container">
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
    <div class="row">
        <div class="col-12">
            <p>Homepage</p>
            <?php
            if(IsLoggedIn() === true){
                echo 'You are logged in';
            }
            ?>
        </div>
    </div>
</div>
<?php include 'includes/templates/footer.php';?>