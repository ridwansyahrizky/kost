<div class="container mt-3">
  <div class="row">
     <div class="col-lg-6">
       <?php FlashMsg::flash(); ?>
     </div>
  </div>
  <!-- Search -->
  <div class="row">
    <div class="col-lg-6">
      <form action="<?= BASEURL ?>/utilitas/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari User" name="keyword" id="keyword" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="cari" name="cari">Cari</button>
          </div>
        </div>      
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <h3>Daftar User</h3>
      <?php foreach ($data['user'] as $user) : ?>
      <ul class="list-group">
        <li class="list-group-item">
          <?= $user['id_user'] .' - '. $user['nama_user']; ?>   
          <?php if($user['status'] == "A") : ?>       
            <a href="<?= BASEURL; ?>/user/blokir/<?= $user['id_user']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Blokir Gan?');">Blokir</a>
          <?php endif ?>
          <?php if($user['status'] == "B") : ?>       
            <a href="<?= BASEURL; ?>/user/aktivasi/<?= $user['id_user']; ?>" class="badge badge-success float-right ml-1" onclick="return confirm('Akrivasi Gan?');">Aktivasi</a>
          <?php endif ?>
          <a href="<?= BASEURL; ?>/user/detail/<?= $user['id_user']; ?>" class="badge badge-primary float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formmodal" data-id="<?= $user['id_user'];?>">Set Password Baru</a>
        </li>
      </ul>
      <?php endforeach ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulmodal" data-id="SetPass">Set Password Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/user/setpass" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>User</label>
            <input type="text" class="form-control" name="namauser" id="namaUser" required="required" readonly="true">
          </div>
          <div class="form-group">
            <label for="passLama">Password Lama</label>
            <input type="password" class="form-control" name="passlama" id="passLama" required="required">
          </div>
          <div class="form-group">
            <label for="passBaru">Password Baru</label>
            <input type="password" class="form-control" name="passbaru" id="passBaru" required="required">
          </div>
          <div class="form-group">
            <label for="konfirmpassBaru">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" name="konfirmpassbaru" id="konfirmpassBaru" required="required">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>