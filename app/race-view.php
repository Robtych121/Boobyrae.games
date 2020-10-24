<?php
$website_title = 'View Race';
include 'includes/init.php';
include 'includes/templates/head.php';
include 'includes/templates/topbar.php';
include 'includes/templates/header.php';
include 'includes/templates/nav.php';
LoggedOutRedirect();
$race_detail = getRaceDetail($_GET['id']);
?>

<div class="mainContent container text-center">
    <h3>View Race - <?php echo $race_detail['0']; ?></h3>
    <p><a href="races.php" class="btn btn-outline-secondary btn-lg">Back</a></p>
    <div class="row">
        <div class="col-12">
            <p><b>Version :</b> <?php echo $race_detail['1']; ?> | <b>Size :</b> <?php echo $race_detail['2']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <p><b>Walking Speed</b><br><?php echo $race_detail['3']; ?></p>
        </div>
        <div class="col-md">
            <p><b>Burrowing Speed</b><br><?php echo $race_detail['4']; ?></p>
        </div>
        <div class="col-md">
            <p><b>Climbing Speed</b><br><?php echo $race_detail['5']; ?></p>
        </div>
        <div class="col-md">
            <p><b>Flying Speed</b><br><?php echo $race_detail['6']; ?></p>
        </div>
        <div class="col-md">
            <p><b>Swimming Speed</b><br><?php echo $race_detail['7']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><b>Short Description</b><br><?php echo $race_detail['8']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><b>Race Group: </b><?php echo $race_detail['9']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><b>Description:</b><br><?php echo $race_detail['10']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><b>Racial Trait Introduction</b><br><?php echo $race_detail['11']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md">Large Avatar<br><img style="width: 200px;" src="assets/img/uploaded/<?php echo $race_detail['12']; ?>" alt="<?php echo $race_detail['0']; ?>'s Picture'"></div>
        <?php
        if(strlen($race_detail['13']) != 0){
        echo '<div class="col-md">Portrait Avatar<br><img style="width: 200px;" src="assets/img/uploaded/' . $race_detail['13'] .'" alt="' . $race_detail['0'] . '"> </div>';
        };
        ?>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Traits & Shit</h4>
        </div>
        <div class="col-12">
            <table id="racesTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Snippet</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?=getTraitsViewOnly($_GET['id']);?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'includes/templates/footer.php';?>