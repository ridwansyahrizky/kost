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
        Tambah Data Fasilitas
      </button>
    </div>
  </div>
  <!-- Search -->
  <form action="<?= BASEURL ?>/fasilitas/cari" method="post">
    <div class="row mb-4">
      <div class="col-lg-6">
        <div class="input-group">          
            <select class="custom-select" id="listkost" name="list" aria-label="Example select with button addon">
              <option <?php if(!isset($_POST["list"]) || $_POST["list"] == "") { echo "selected='true'"; } ?> value="">Semua Kost</option>
              <?php foreach ($data["kost"] as $kost) : ?>                
                <option <?php if(isset($_POST["list"])) { if($_POST["list"] == $kost["id_kost"]) { echo "selected='true'"; } }?> 
                value="<?= $kost['id_kost']; ?>"><?= $kost["id_kost"].' - '.$kost["nama_kost"]; ?></option>
              <?php endforeach ?> 
            </select>
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" name="cari">Display</button>
            </div>        
        </div>
      </div>    
    </div>
  </form>
  <div class="row">
    <div class="col-lg-6">
      <h3>Daftar Fasilitas</h3>
      <?php foreach ($data['fasilitas'] as $fasilitas) : ?>
      <ul class="list-group">
        <li class="list-group-item">
          <?= $fasilitas['Type'] ?> - <?= $fasilitas['nama_fasilitas'] ?>
          <a href="<?= BASEURL; ?>/fasilitas/hapus/<?= $fasilitas['id_fasilitas']; ?>/<?= $fasilitas['id_fasilitas']; ?>/<?= $fasilitas['id_kost']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin Gan?');">Hapus</a>
          <a href="<?= BASEURL; ?>/fasilitas/hapus/<?= $fasilitas['sn']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formmodal" data-id="<?= $fasilitas['id_fasilitas'];?>">Edit</a>          
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
        <h5 class="modal-title" id="judulmodal" data-id="Fasilitas">Tambah Data Fasilitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/fasilitas/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="idkost" id="idKost">
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
            <label>Tipe Fasilitas</label>
            <select name="tipe" id="tipeFasilitas" class="form-control">
              <option value="1">Fasilitas Kamar</option>
              <option value="2">Fasilitas Kamar Mandi</option>
              <option value="3">Fasilitas Umum</option>
              <option value="4">Fasilitas Parkir</option>
            </select>
          </div>
          <div class="form-group">
            <label for="namaFasilitas">Nama Fasilitas</label>
            <input type="text" class="form-control" name="namafasilitas" id="namaFasilitas" required="required">
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