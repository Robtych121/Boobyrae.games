<?php
$website_title = 'Edit Race';
include 'includes/init.php';
include 'includes/templates/head.php';
include 'includes/templates/topbar.php';
include 'includes/templates/header.php';
include 'includes/templates/nav.php';
LoggedOutRedirect();
$error_msg = '';
$race_detail = getRaceDetail($_GET['id']);

if (isset($_POST['submit'])) {
    $allowedfileExtensions = array('jpg', 'gif', 'png');
    $uploadFileDir = 'assets/img/uploaded/';
    $la_newFileName = $race_detail['12'];
    $pa_newFileName = $race_detail['13'];
    $race_id = $_GET['id'];

    
    # Check Large avatar file upload settings #
    $la_fileTmpPath = $_FILES['large_avatar']['tmp_name'];
    $la_fileName = $_FILES['large_avatar']['name'];
    $la_fileSize = $_FILES['large_avatar']['size'];
    $la_fileType = $_FILES['large_avatar']['type'];
    $la_fileNameCmps = explode(".", $la_fileName);
    $la_fileExtension = strtolower(end($la_fileNameCmps));

    if($_FILES['large_avatar']['name'] != "") {
        $la_newFileName = md5(time() . $la_fileName) . '.' . $la_fileExtension;
    }
    
    
    $la_dest_path = $uploadFileDir . $la_newFileName;

    # Check Portrait avatar file upload settings #
    $pa_fileTmpPath = $_FILES['portrait_avatar']['tmp_name'];
    $pa_fileName = $_FILES['portrait_avatar']['name'];
    $pa_fileSize = $_FILES['portrait_avatar']['size'];
    $pa_fileType = $_FILES['portrait_avatar']['type'];
    $pa_fileNameCmps = explode(".", $pa_fileName);
    $pa_fileExtension = strtolower(end($pa_fileNameCmps));
    if($_FILES['portrait_avatar']['name'] != "") {
    $pa_newFileName = md5(time() . $pa_fileName) . '.' . $pa_fileExtension;
    }
    
    $pa_dest_path = $uploadFileDir . $pa_newFileName;
    

    if (in_array($la_fileExtension, $allowedfileExtensions)) {
        if(move_uploaded_file($la_fileTmpPath, $la_dest_path))
        {
            
        }
        else
        {
            $error_msg = 'File upload failed. Please contact Admin';
        }
    }

    if (in_array($pa_fileExtension, $allowedfileExtensions)) {
        if(move_uploaded_file($pa_fileTmpPath, $pa_dest_path))
        {
            
        }
        else
        {
            $error_msg = 'File upload failed. Please contact Admin';
        }
    }

    editRace($race_id, $_POST, $la_newFileName, $pa_newFileName);
    header('Location: races.php');
}


?>

<div class="mainContent container text-center">
<h3>Edit Race - <?php echo $race_detail['0']; ?></h3>
<p><a href="races.php" class="btn btn-outline-secondary btn-lg">Back</a></p>
<b style="color: red;"><?php echo $error_msg; ?></b>
<hr>
<form action="race-edit.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name<span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $race_detail['0']; ?>" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                    <label for="version">Version</label>
                    <input type="text" class="form-control" id="version" name="version" value="<?php echo $race_detail['1']; ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="size">Size<span style="color: red;">*</span></label>
                <select class="form-control" name="pc_size" id="pc_size" required>
                    <option value="" <?php if($race_detail['2'] == ''){ echo 'selected';} ?>>Please Select</option>
                    <option value="Gargantuan" <?php if($race_detail['2'] == 'Gargantuan'){ echo 'selected';} ?>>Gargantuan</option>
                    <option value="Huge" <?php if($race_detail['2'] == 'Huge'){ echo 'selected';} ?>>Huge</option>
                    <option value="Large" <?php if($race_detail['2'] == 'Large'){ echo 'selected';} ?>>Large</option>
                    <option value="Medium" <?php if($race_detail['2'] == 'Medium'){ echo 'selected';} ?>>Medium</option>
                    <option value="Small" <?php if($race_detail['2'] == 'Small'){ echo 'selected';} ?>>Small</option>
                    <option value="Tiny" <?php if($race_detail['2'] == 'Tiny'){ echo 'selected';} ?>>Tiny</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="walking">Walking</label>
                <input type="text" class="form-control" id="walking" name="walking" value="<?php echo $race_detail['3']; ?>">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="burrowing">Burrowing</label>
                <input type="text" class="form-control" id="burrowing" name="burrowing" value="<?php echo $race_detail['4']; ?>">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="climbing">Climbing</label>
                <input type="text" class="form-control" id="climbing" name="climbing" value="<?php echo $race_detail['5']; ?>">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="flying">Flying</label>
                <input type="text" class="form-control" id="flying" name="flying" value="<?php echo $race_detail['6']; ?>">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="swimming">Swimming</label>
                <input type="text" class="form-control" id="swimming" name="swimming" value="<?php echo $race_detail['7']; ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <textarea class="form-control" id="short_description" name="short_description" rows="3"><?php echo $race_detail['8']; ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="race_group">Race Group</label>
                <select class="form-control" id="race_group" name="race_group">
                    <option value="" <?php if($race_detail['9'] == ''){ echo 'selected';} ?>>Please Select</option>
                    <option value="Aarakocra" <?php if($race_detail['9'] == 'Aarakocra'){ echo 'selected';} ?>>Aarakocra</option>
                    <option value="Aasimar" <?php if($race_detail['9'] == 'Aasimar'){ echo 'selected';} ?>>Aasimar</option>
                    <option value="Bugbear" <?php if($race_detail['9'] == 'Bugbear'){ echo 'selected';} ?>>Bugbear</option>
                    <option value="Dragonborn" <?php if($race_detail['9'] == 'Dragonborn'){ echo 'selected';} ?>>Dragonborn</option>
                    <option value="Dwarf" <?php if($race_detail['9'] == 'Dwarf'){ echo 'selected';} ?>>Dwarf</option>
                    <option value="Elf" <?php if($race_detail['9'] == 'Elf'){ echo 'selected';} ?>>Elf</option>
                    <option value="Firbolg" <?php if($race_detail['9'] == 'Firbolg'){ echo 'selected';} ?>>Firbolg</option>
                    <option value="Genasi" <?php if($race_detail['9'] == 'Genasi'){ echo 'selected';} ?>>Genasi</option>
                    <option value="Gith" <?php if($race_detail['9'] == 'Gith'){ echo 'selected';} ?>>Gith</option>
                    <option value="Gnome" <?php if($race_detail['9'] == 'Gnome'){ echo 'selected';} ?>>Gnome</option>
                    <option value="Goblin" <?php if($race_detail['9'] == 'Goblin'){ echo 'selected';} ?>>Goblin</option>
                    <option value="Goliath" <?php if($race_detail['9'] == 'Goliath'){ echo 'selected';} ?>>Goliath</option>
                    <option value="Half Elf" <?php if($race_detail['9'] == 'Half Elf'){ echo 'selected';} ?>>Half Elf</option>
                    <option value="Halfing" <?php if($race_detail['9'] == 'Halfing'){ echo 'selected';} ?>>Halfing</option>
                    <option value="Half Orc" <?php if($race_detail['9'] == 'Half Orc'){ echo 'selected';} ?>>Half Orc</option>
                    <option value="Hobgoblin" <?php if($race_detail['9'] == 'Hobgoblin'){ echo 'selected';} ?>>Hobgoblin</option>
                    <option value="Human" <?php if($race_detail['9'] == 'Human'){ echo 'selected';} ?>>Human</option>
                    <option value="Kenku" <?php if($race_detail['9'] == 'Kenku'){ echo 'selected';} ?>>Kenku</option>
                    <option value="Kobold" <?php if($race_detail['9'] == 'Kobold'){ echo 'selected';} ?>>Kobold</option>
                    <option value="Lizardfolk" <?php if($race_detail['9'] == 'Lizardfolk'){ echo 'selected';} ?>>Lizardfolk</option>
                    <option value="Orc" <?php if($race_detail['9'] == 'Orc'){ echo 'selected';} ?>>Orc</option>
                    <option value="Shifter" <?php if($race_detail['9'] == 'Shifter'){ echo 'selected';} ?>>Shifter</option>
                    <option value="Tabaxi" <?php if($race_detail['9'] == 'Tabaxi'){ echo 'selected';} ?>>Tabaxi</option>
                    <option value="Tiefling" <?php if($race_detail['9'] == 'Tiefling'){ echo 'selected';} ?>>Tiefling</option>
                    <option value="Tortle" <?php if($race_detail['9'] == 'Tortle'){ echo 'selected';} ?>>Tortle</option>
                    <option value="Triton" <?php if($race_detail['9'] == 'Triton'){ echo 'selected';} ?>>Triton</option>
                    <option value="Warforged" <?php if($race_detail['9'] == 'Warforged'){ echo 'selected';} ?>>Warforged</option>
                    <option value="Yuan-ti Pureblood" <?php if($race_detail['9'] == 'Yuan-ti Pureblood'){ echo 'selected';} ?>>Yuan-ti Pureblood</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Description<span style="color: red;">*</span></label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $race_detail['10']; ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="racial_trait_intro">Racial Trait Introduction<span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="racial_trait_intro" name="racial_trait_intro" required value="<?php echo $race_detail['11']; ?>">
            </div>
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
    <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="large_avatar">Large Avatar<span style="color: red;">*</span></label>
            <input type="file" class="form-control-file" id="large_avatar" name="large_avatar">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="portrait_avatar">Portrait Avatar</label>
            <input type="file" class="form-control-file" id="portrait_avatar" name="portrait_avatar">
        </div>
        </div>
    </div>
    <div class="row">
    <div class="col-12">
        <input type="hidden" name="race_id" id="race_id" value="<?php if(isset($_GET["id"])){ echo $_GET['id'];} if(isset($_POST["race_id"])){ echo $_POST['race_id'];}  ?>">
        <button type="submit" name="submit" value="submit" class="btn btn-outline-secondary btn-block">Submit</button>
    </div>
    </div>
</form>
<hr>
    <div class="row">
        <div class="col-12">
            <h4>Traits & Shit</h4>
        </div>
        <div class="col-12">
            <p><a href='race-new-trait.php?id=<?php echo $_GET['id']; ?>' class='btn btn-outline-secondary btn-sm'>Create New Trait</a></p>
            <table id="racesTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Display</th>
                        <th>Name</th>
                        <th>Snippet</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?=getTraitsEdit($_GET['id']);?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'includes/templates/footer.php';?>