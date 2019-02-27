<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

  <h1 class="mt-5">About Me</h1>
  <img src="<?= BASEURL; ?>/img/me.jpg" alt="M. Rizky Ridwansyah" class="rounded-circle shadow" width="250" height="300">
  <br>
  <p>Nama Saya
    <?= $data['nama']; ?> . Saya seorang
    <?= $data['pekerjaan']; ?>
  </p>
</div>
<!-- Modal -->
<form method="get">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php 
if(isset($_GET["button"])){
  header("location:about.php");
}

 ?>