<?php
$website_title = 'New Race';
include 'includes/init.php';
include 'includes/templates/head.php';
include 'includes/templates/topbar.php';
include 'includes/templates/header.php';
include 'includes/templates/nav.php';
LoggedOutRedirect();
$error_msg = '';

if (isset($_POST['submit'])) {
    $allowedfileExtensions = array('jpg', 'gif', 'png');
    $uploadFileDir = 'assets/img/uploaded/';
    $pa_newFileName = "";


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

    createRace($_POST, $la_newFileName, $pa_newFileName);
    header('Location: races.php');
}


?>

<div class="mainContent container text-center">
<h3>New Race</h3>
<b style="color: red;"><?php echo $error_msg; ?></b>
<hr>
<form action="race-newrace.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name<span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                    <label for="version">Version</label>
                    <input type="text" class="form-control" id="version" name="version">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="size">Size<span style="color: red;">*</span></label>
                <select class="form-control" name="pc_size" id="pc_size" required>
                    <option value="">Please Select</option>
                    <option value="Gargantuan">Gargantuan</option>
                    <option value="Huge">Huge</option>
                    <option value="Large">Large</option>
                    <option value="Medium">Medium</option>
                    <option value="Small">Small</option>
                    <option value="Tiny">Tiny</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="walking">Walking</label>
                <input type="text" class="form-control" id="walking" name="walking">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="burrowing">Burrowing</label>
                <input type="text" class="form-control" id="burrowing" name="burrowing">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="climbing">Climbing</label>
                <input type="text" class="form-control" id="climbing" name="climbing">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="flying">Flying</label>
                <input type="text" class="form-control" id="flying" name="flying">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="swimming">Swimming</label>
                <input type="text" class="form-control" id="swimming" name="swimming">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <textarea class="form-control" id="short_description" name="short_description" rows="3"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="race_group">Race Group</label>
                <select class="form-control" id="race_group" name="race_group">
                    <option value="">Please Select</option>
                    <option value="Aarakocra">Aarakocra</option>
                    <option value="Aasimar">Aasimar</option>
                    <option value="Bugbear">Bugbear</option>
                    <option value="Dragonborn">Dragonborn</option>
                    <option value="Dwarf">Dwarf</option>
                    <option value="Elf">Elf</option>
                    <option value="Firbolg">Firbolg</option>
                    <option value="Genasi">Genasi</option>
                    <option value="Gith">Gith</option>
                    <option value="Gnome">Gnome</option>
                    <option value="Goblin">Goblin</option>
                    <option value="Goliath">Goliath</option>
                    <option value="Half Elf">Half Elf</option>
                    <option value="Halfing">Halfing</option>
                    <option value="Half Orc">Half Orc</option>
                    <option value="Hobgoblin">Hobgoblin</option>
                    <option value="Human">Human</option>
                    <option value="Kenku">Kenku</option>
                    <option value="Kobold">Kobold</option>
                    <option value="Lizardfolk">Lizardfolk</option>
                    <option value="Orc">Orc</option>
                    <option value="Shifter">Shifter</option>
                    <option value="Tabaxi">Tabaxi</option>
                    <option value="Tiefling">Tiefling</option>
                    <option value="Tortle">Tortle</option>
                    <option value="Triton">Triton</option>
                    <option value="Warforged">Warforged</option>
                    <option value="Yuan-ti Pureblood">Yuan-ti Pureblood</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Description<span style="color: red;">*</span></label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="racial_trait_intro">Racial Trait Introduction<span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="racial_trait_intro" name="racial_trait_intro" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="large_avatar">Large Avatar<span style="color: red;">*</span></label>
            <input type="file" class="form-control-file" id="large_avatar" name="large_avatar" required>
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
        <button type="submit" name="submit" value="submit" class="btn btn-outline-secondary btn-block">Submit</button>
    </div>
    </div>
</form>
</div>
<?php include 'includes/templates/footer.php';?>