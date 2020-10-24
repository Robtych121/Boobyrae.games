<?php

function getRacesRows(){
    include 'includes/config/db_connection.php';
    $out ="";

	$stmt = $conn -> prepare("
	                         SELECT id, racename, version, size, race_group, created_by
	                         FROM races
	                         ");
	$stmt -> execute();
	$stmt -> bind_result($rid,$name, $version, $size, $race_group, $created_by);

	while($stmt -> fetch()){

		$out .= "<tr>
					<td>$name</td>
					<td>$version</td>
					<td>$size</td>
					<td>$race_group</td>
					<td>" . getUsernameDetail($created_by) . "</td>
				";

		if($created_by == $_SESSION['user_id']){
			$out .= "<td>
						<a href='race-view.php?id=$rid' class='btn btn-outline-secondary btn-sm'>View</a>
						<a href='race-edit.php?id=$rid' class='btn btn-outline-secondary btn-sm'>Edit</a>
						<a href='race-delete.php?id=$rid' class='btn btn-outline-secondary btn-sm'>Delete</a>
					</td>";
		} else {
			$out .= "<td><a href='race-view.php?id=$rid' class='btn btn-outline-secondary btn-sm'>View</a></td>";
		}

		$out .= "</tr>";
	}

	return $out;
	exit();
}


function createRace($input, $large_avatar, $portrait_avatar){
	include 'includes/config/db_connection.php';
    $stmt = $conn->prepare('INSERT INTO races (racename, version, size, speed_walking, speed_burrowing, speed_climbing, speed_flying, speed_swimming, short_description, race_group, full_description, racial_trait_intro, large_avatar, portrait_avatar, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt -> bind_param('sssssssssssssss', $input['name'], $input['version'], $input['pc_size'], $input['walking'], $input['burrowing'], $input['climbing'], $input['flying'], $input['swimming'], $input['short_description'], $input['race_group'], $input['description'], $input['racial_trait_intro'], $large_avatar, $portrait_avatar, $_SESSION['user_id']);
    $stmt -> execute();
    $stmt -> close();
}

function getRaceDetail($race_id){
	include 'includes/config/db_connection.php';	
	$stmt = $conn->prepare('SELECT racename, version, size, speed_walking, speed_burrowing, speed_climbing, speed_flying, speed_swimming, short_description, race_group, full_description, racial_trait_intro, large_avatar, portrait_avatar, created_by FROM races WHERE id = ?');
    $stmt -> bind_param('i', $race_id);
    $stmt -> execute();
    $stmt -> bind_result($racename, $version, $pc_size, $speed_walking, $speed_burrowing, $speed_climbing, $speed_flying, $speed_swimming, $short_description, $race_group, $full_description, $racial_trait_intro, $large_avatar, $portrait_avatar, $create_by);
	$result = $stmt->get_result();
	$data = $result->fetch_array();
	$stmt -> close();
    return $data;
}

function editRace($race_id, $input, $large_avatar, $portrait_avatar){
	include 'includes/config/db_connection.php';
    $stmt = $conn->prepare('UPDATE races SET racename=?, version=?, size=?, speed_walking=?, speed_burrowing=?, speed_climbing=?, speed_flying=?, speed_swimming=?, short_description=?, race_group=?, full_description=?, racial_trait_intro=?, large_avatar=?, portrait_avatar=? WHERE id = ?');
    $stmt -> bind_param('sssssssssssssss', $input['name'], $input['version'], $input['pc_size'], $input['walking'], $input['burrowing'], $input['climbing'], $input['flying'], $input['swimming'], $input['short_description'], $input['race_group'], $input['description'], $input['racial_trait_intro'], $large_avatar, $portrait_avatar, $race_id);
    $stmt -> execute();
    $stmt -> close();
}

function deleteRace($race_id){
	include 'includes/config/db_connection.php';
	$stmt = $conn->prepare('DELETE FROM races where id = ?');
	$stmt -> bind_param('i', $race_id);
	$stmt -> execute();
	$stmt -> close();

	$stmt = $conn->prepare('DELETE FROM races_racialTraits where race_id = ?');
	$stmt -> bind_param('i', $race_id);
	$stmt -> execute();
	$stmt -> close();
}


function getTraitsViewOnly($input){
	include 'includes/config/db_connection.php';
	$out ="";

	$stmt = $conn->prepare("SELECT id, traitname, snippet, description, display_order, hide_builder, hide_sheet, char_levels FROM races_racialTraits where race_id = ? ORDER BY display_order ASC");
	$stmt -> bind_param('s', $input);
	$stmt -> execute();
	$stmt -> bind_result($rtid, $traitname, $snippet, $description, $display_order, $hide_builder, $hide_sheet, $char_levels);

	while($stmt -> fetch()){

		$out .= "<tr>
					<td>$traitname</td>
					<td>$snippet</td>
					<td>$description</td>
				</tr>";
	}

	return $out;
	exit();
}

function getTraitsEdit($input){
	include 'includes/config/db_connection.php';
	$out ="";

	$stmt = $conn->prepare("SELECT id, race_id, traitname, snippet, description, display_order, hide_builder, hide_sheet, char_levels FROM races_racialTraits where race_id = ? ORDER BY display_order ASC");
	$stmt -> bind_param('s', $input);
	$stmt -> execute();
	$stmt -> bind_result($rtid, $race_id, $traitname, $snippet, $description, $display_order, $hide_builder, $hide_sheet, $char_levels);

	while($stmt -> fetch()){

		$out .= "<tr>
					<td>$display_order</td>
					<td>$traitname</td>
					<td>$snippet</td>
					<td>$description</td>
					<td>
						<a href='race-trait-edit.php?id=$rtid&raceid=$race_id' class='btn btn-outline-secondary btn-sm'>Edit</a>
						<a href='race-trait-delete.php?id=$rtid&raceid=$race_id' class='btn btn-outline-secondary btn-sm'>Delete</a>
					</td>
				</tr>";
	}

	return $out;
	exit();
}

function createRacialTrait($input){
	include 'includes/config/db_connection.php';
    $stmt = $conn->prepare('INSERT INTO races_racialTraits (race_id, traitname, snippet, description, display_order, hide_builder, hide_sheet, char_levels) VALUES (?,?,?,?,?,?,?,?)');
    $stmt -> bind_param('ssssssss', $input['race_id'], $input['traitname'], $input['snippet'], $input['description'], $input['display_order'], $input['hide_builder'], $input['hide_sheet'], $input['char_levels']);
    $stmt -> execute();
    $stmt -> close();
}

function deleteRacialTrait($input){
	include 'includes/config/db_connection.php';
	$stmt = $conn->prepare('DELETE FROM races_racialTraits where id = ?');
	$stmt -> bind_param('i', $input);
	$stmt -> execute();
	$stmt -> close();
}

function getRacialTraitsDetail($input){
	include 'includes/config/db_connection.php';	
	$stmt = $conn->prepare('SELECT race_id, traitname, snippet, description, display_order, hide_builder, hide_sheet, char_levels FROM races_racialTraits WHERE id = ?');
    $stmt -> bind_param('i', $input);
    $stmt -> execute();
    $stmt -> bind_result($race_id, $traitname, $snippet, $description, $display_order, $hide_builder, $hide_builder, $char_levels);
	$result = $stmt->get_result();
	$data = $result->fetch_array();
	$stmt -> close();
    return $data;
}


function editRacialTrait($input){
	include 'includes/config/db_connection.php';
    $stmt = $conn->prepare('UPDATE races_racialTraits SET traitname=?, snippet=?, description=?, display_order=?, hide_builder=?, hide_sheet=?, char_levels=? WHERE id = ?');
    $stmt -> bind_param('ssssssss', $input['traitname'], $input['snippet'], $input['description'], $input['display_order'], $input['hide_builder'], $input['hide_sheet'], $input['char_levels'], $input['id']);
    $stmt -> execute();
    $stmt -> close();
}

?>