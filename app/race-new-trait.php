<?php
$website_title = 'Create New Racial Trait';
include 'includes/init.php';
include 'includes/templates/head.php';
include 'includes/templates/topbar.php';
include 'includes/templates/header.php';
include 'includes/templates/nav.php';
LoggedOutRedirect();
$error_msg = '';

if (isset($_POST['submit'])) {
    createRacialTrait($_POST);
    header('Location: race-edit.php?id='.$_POST['race_id']);
}
?>

<div class="mainContent container text-center">
<h3>Create New Racial Trait</h3>
<b style="color: red;"><?php echo $error_msg; ?></b>
<hr>
<form action="racial-new-trait.php" method="POST">
<input type="hidden" name="race_id" id="race_id" value="<?php echo $_GET['id']; if (isset($_POST['race_id'])) {echo $_POST['race_id'];} ?>">
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="traitname">Name<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="traitname" name="traitname" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="snippet">Snippet<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="snippet" name="snippet" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="description">Description<span style="color: red;">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="display_order">Display Order<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="display_order" name="display_order" required>
        </div>
    </div>
    <div class="col-4">
        <div class="form-check">
            <input class="form-check-input" type="hidden" value="No" id="hide_builder" name="hide_builder">
            <input class="form-check-input" type="checkbox" value="Yes" id="hide_builder" name="hide_builder">
            <label class="form-check-label" for="hide_builder">
                Hide In Builder
            </label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-check">
            <input class="form-check-input" type="hidden" value="No" id="hide_sheet" name="hide_sheet"> 
            <input class="form-check-input" type="checkbox" value="Yes" id="hide_sheet" name="hide_sheet">
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
            <input type="text" class="form-control" id="char_levels" name="char_levels">
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