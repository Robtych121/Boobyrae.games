<?php
$website_title = 'Edit Racial Trait';
include 'includes/init.php';
include 'includes/templates/head.php';
include 'includes/templates/topbar.php';
include 'includes/templates/header.php';
include 'includes/templates/nav.php';
LoggedOutRedirect();
$error_msg = '';
$racial_traits_detail = getRacialTraitsDetail($_GET['id']);

if (isset($_POST['submit'])) {
    editRacialTrait($_POST);
    header('Location: race-edit.php?id='.$_POST['race_id']);
}
?>

<div class="mainContent container text-center">
<h3>Edit Racial Trait</h3>
<b style="color: red;"><?php echo $error_msg; ?></b>
<hr>
<form action="race-trait-edit.php" method="POST">
<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; if (isset($_POST['id'])) {echo $_POST['id'];} ?>">
<input type="hidden" name="race_id" id="race_id" value="<?php echo $_GET['raceid']; if (isset($_POST['race_id'])) {echo $_POST['race_id'];} ?>">
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="traitname">Name<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="traitname" name="traitname" value="<?php echo $racial_traits_detail['1']; ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="snippet">Snippet<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="snippet" name="snippet" value="<?php echo $racial_traits_detail['2']; ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="description">Description<span style="color: red;">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $racial_traits_detail['3']; ?></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="display_order">Display Order<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="display_order" name="display_order" value="<?php echo $racial_traits_detail['4']; ?>" required>
        </div>
    </div>
    <div class="col-4">
        <div class="form-check">
            <input class="form-check-input" type="hidden" value="No" id="hide_builder" name="hide_builder">
            <input class="form-check-input" type="checkbox" value="Yes" id="hide_builder" name="hide_builder" <?php if($racial_traits_detail['5'] == 'Yes'){ echo 'checked';} ?> >
            <label class="form-check-label" for="hide_builder">
                Hide In Builder
            </label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-check">
            <input class="form-check-input" type="hidden" value="No" id="hide_sheet" name="hide_sheet"> 
            <input class="form-check-input" type="checkbox" value="Yes" id="hide_sheet" name="hide_sheet" <?php if($racial_traits_detail['6'] == 'Yes'){ echo 'checked';} ?>>
            <label class="form-check-label" for="hide_sheet">
                Hide In Sheet
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="char_levels">Character Levels</label>
            <input type="text" class="form-control" id="char_levels" name="char_levels" value="<?php echo $racial_traits_detail['7']; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" name="submit" value="submit" class="btn btn-outline-secondary btn-block">Submit</button>
    </div>
    </div>
</form>
<hr>
    <div class="row">
        <div class="col-12">
            <h4>Options</h4>
        </div>
        <div class="col-12">
            <p><a href='#' class='btn btn-outline-secondary btn-sm'>Add New Option</a></p>
            <p>Stuff goes here</p>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-12">
            <h4>Modifiers</h4>
        </div>
        <div class="col-12">
            <p><a href='#' class='btn btn-outline-secondary btn-sm'>Add New Modifier</a></p>
            <p>Stuff goes here</p>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-12">
            <h4>Spells</h4>
        </div>
        <div class="col-12">
            <p><a href='#' class='btn btn-outline-secondary btn-sm'>Add New Spell</a></p>
            <p>Stuff goes here</p>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-12">
            <h4>Actions</h4>
        </div>
        <div class="col-12">
            <p><a href='#' class='btn btn-outline-secondary btn-sm'>Add New Action</a></p>
            <p>Stuff goes here</p>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-12">
            <h4>Creatures</h4>
        </div>
        <div class="col-12">
            <p><a href='#' class='btn btn-outline-secondary btn-sm'>Add New Creature</a></p>
            <p>Stuff goes here</p>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-12">
            <h4>Additional Spell List</h4>
        </div>
        <div class="col-12">
            <p><a href='#' class='btn btn-outline-secondary btn-sm'>Add New Spell List</a></p>
            <p>Stuff goes here</p>
        </div>
    </div>
</div>
<?php include 'includes/templates/footer.php';?>