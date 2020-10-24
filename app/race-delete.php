<?php
include 'includes/init.php';

$race_id = $_GET['id'];

deleteRace($race_id);

header('Location: races.php');

?>