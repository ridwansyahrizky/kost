<div class="container mt-3">
  <div class="row">
     <div class="col-lg-6">
       <?php FlashMsg::flash(); ?>
     </div>
  </div>
  <!-- Button Tambah -->
  <div class="row mb-4">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tambahData" data-toggle="modal" data-target="#formmodal">
        Tambah Data User
      </button>
    </div>
  </div>
  <!-- Search -->
  <div class="row">
    <div class="col-lg-6">
      <form action="<?= BASEURL ?>/user/cari" method="post">
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
          <?= $user['id_user'] .' - '. $user['nama_user'] ?>          
          <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id_user']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin Gan?');">Hapus</a>
          <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id_user']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formmodal" data-id="<?= $user['id_user'];?>">Edit</a>
          <!-- <a href="<?= BASEURL; ?>/user/detail/<?= $user['id_user']; ?>" class="badge badge-primary float-right ml-1">Detail</a> -->
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
        <h5 class="modal-title" id="judulmodal" data-id="User">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/user/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="namaKost">Nama Kost</label>
            <select name="namakost" id="namaKost" class="form-control">
              <option value="0">Pilih Kost</option>
             <?php foreach ($data["kost"] as $kost) : ?>
               <option value="<?= $kost['id_kost']; ?>"><?= $kost["id_kost"].' - '.$kost["nama_kost"]; ?></option>
             <?php endforeach ?> 
            </select>
          </div>
          <div class="form-group">
            <label for="idUser">ID User</label>
            <input type="text" class="form-control" name="iduser" id="idUser" required="required">
          </div>
          <div class="form-group">
            <label for="namaUser">Nama User</label>
            <input type="text" class="form-control" name="namauser" id="namaUser" required="required">
          </div>
          <div class="form-group Pwd">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="pass" id="password" required="required">
          </div>
          <div class="form-group Pwd">
            <label for="konfirmpassword">Konfirmasi Password</label>
            <input type="password" class="form-control" name="konfirmpass" id="konfirmpassword" required="required">
          </div>
          <div class="form-group">
            <label for="secLev">Level</label>
            <select name="seclev" id="secLev" class="form-control">
              <option value="0">Pilih Level User</option>
              <?php if($_SESSION["lvl"] == "SYM") :?>
                <option value="SYM">Sys-Master</option>
              <?php endif ?>
              <option value="OWN">Pemilik Kost</option>
              <option value="ADM">Admin Kost</option>
            </select>
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