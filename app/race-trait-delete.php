<?php
include 'includes/init.php';

$race_trait_id = $_GET['id'];
$race_id = $_GET['raceid'];

deleteRacialTrait($race_trait_id);

header('Location: race-edit.php?id='.$race_id);

?>