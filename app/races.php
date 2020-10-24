<?php
$website_title = 'Races';
include 'includes/init.php';
include 'includes/templates/head.php';
include 'includes/templates/topbar.php';
include 'includes/templates/header.php';
include 'includes/templates/nav.php';
LoggedOutRedirect();
?>

<div class="mainContent container text-center">
<h3>Races</h3>
<p><button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#newRaceModal">Create New Race</button></p>

<!-- New Race Type Modal -->
<div class="modal fade" id="newRaceModal" tabindex="-1" aria-labelledby="newRaceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRaceModalLabel">Select Race Type To Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-dismiss="modal" data-target="#newRaceconfirmModal">Create Race</button>
            </div>
            <div class="col-4">
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-dismiss="modal" data-target="#newSubraceconfirmModal">Create Subrace</button>
            </div>
            <div class="col-4">
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-dismiss="modal" data-target="#newVariantconfirmModal">Create Variant</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Model -->

<!-- New Race Modal -->
<div class="modal fade" id="newRaceconfirmModal" tabindex="-1" aria-labelledby="newRaceconfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRaceconfirmModalLabel">Create A Race</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-12">
              <p class="text-center">Copy Existing Race (Coming Soon)</p>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
          <p id="createfromscratch">
              <a data-toggle="collapse" href="#" aria-expanded="false" aria-controls="createfromscratch">Or</a>
          </p>
          <a href="race-newrace.php" class="btn btn-outline-secondary btn-lg">Create From Scratch</a>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Model -->

<!-- New Race Modal -->
<div class="modal fade" id="newVariantconfirmModal" tabindex="-1" aria-labelledby="newVariantconfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newVariantconfirmModalLabel">Create A Variant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-12">
              <p class="text-center">Copy Existing Variant (Coming Soon)</p>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
          <p id="createfromscratch">
              <a data-toggle="collapse" href="#" aria-expanded="false" aria-controls="createfromscratch">Or</a>
          </p>
          <a href="race-newvariant.php" class="btn btn-outline-secondary btn-lg">Create From Scratch</a>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Model -->

<!-- New Race Modal -->
<div class="modal fade" id="newSubraceconfirmModal" tabindex="-1" aria-labelledby="newSubraceconfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubraceconfirmModalLabel">Create A Subrace</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-12">
              <p class="text-center">Copy Existing Subrace (Coming Soon)</p>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
          <p id="createfromscratch">
              <a data-toggle="collapse" href="#" aria-expanded="false" aria-controls="createfromscratch">Or</a>
          </p>
          <a href="race-newsubrace.php" class="btn btn-outline-secondary btn-lg">Create From Scratch</a>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Model -->

<hr>
<div class="table-responsive">
    <table id="racesTable" class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Version</th>
            <th>Size</th>
            <th>Race Group</th>
            <th>Created By</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <?=getRacesRows();?>
        </tbody>
    </table>
</div>
</div>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {

  $('#racesTable').DataTable( {
    ordering: false
  });
  

  $('#racesTable_paginate a').addClass('btn btn-outline-secondary btn-sm')

});
</script>
<?php include 'includes/templates/footer.php';?>