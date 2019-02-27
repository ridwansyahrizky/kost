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
        Tambah Data Unit
      </button>
    </div>
  </div>
  <!-- Search -->
  <form action="<?= BASEURL ?>/stock/cari" method="post">
    <div class="row mb-4">
      <div class="col-lg-6">
        <div class="input-group">          
            <select class="custom-select" id="listkost" name="listkost" aria-label="Example select with button addon">
              <option <?php if(!isset($_POST["listkost"]) || $_POST["listkost"] == "") { echo "selected='true'"; } ?> value="">Semua Kost</option>
              <?php foreach ($data["kost"] as $kost) : ?>                
                <option <?php if(isset($_POST["listkost"])) { if($_POST["listkost"] == $kost["id_kost"]) { echo "selected='true'"; } }?> 
                value="<?= $kost['id_kost']; ?>"><?= $kost["id_kost"].' - '.$kost["nama_kost"]; ?></option>
              <?php endforeach ?> 
            </select>
            <select class="custom-select" id="listlokasi" name="listlokasi" aria-label="Example select with button addon">
              <option <?php if(!isset($_POST["listlokasi"]) || $_POST["listlokasi"] == "") { echo "selected='true'"; } ?> value="">Semua Lokasi</option>
             <?php foreach ($data["lokasi"] as $lokasi) : ?>
               <option <?php if(isset($_POST["listlokasi"])) { if($_POST["listlokasi"] == $lokasi["id_lokasi"]) { echo "selected='true'"; } } ?>
               value="<?= $lokasi['id_lokasi']; ?>"><?= $lokasi["id_lokasi"].' - '.$lokasi["nama_lokasi"]; ?></option>
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
      <h3>Daftar Unit</h3>
      <?php foreach ($data['stock'] as $stock) : ?>
      <ul class="list-group">
        <li class="list-group-item">
          <?= $stock['id_unit'] ?>
          <a href="<?= BASEURL; ?>/stock/hapus/<?= $stock['sn']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin Gan?');">Hapus</a>
          <a href="<?= BASEURL; ?>/stock/hapus/<?= $stock['sn']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formmodal" data-id="<?= $stock['sn'];?>">Edit</a>          
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
        <h5 class="modal-title" id="judulmodal" data-id="Stock">Tambah Data Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/stock/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="namaKost">Kost</label>
            <select name="namakost" id="namaKost" class="form-control">
              <option value="0">Pilih Kost</option>
             <?php foreach ($data["kost"] as $kost) : ?>
               <option value="<?= $kost['id_kost']; ?>"><?= $kost["id_kost"].' - '.$kost["nama_kost"]; ?></option>
             <?php endforeach ?> 
            </select>
          </div>
          <div class="form-group">
            <label for="namaLokasi">Lokasi</label>
            <select name="namalokasi" id="namaLokasi" class="form-control">
              <option value="0">Pilih Lokasi</option>
             <?php foreach ($data["lokasi"] as $lokasi) : ?>
               <option value="<?= $lokasi['id_lokasi']; ?>"><?= $lokasi["id_lokasi"].' - '.$lokasi["nama_lokasi"]; ?></option>
             <?php endforeach ?> 
            </select>
          </div>
          <div class="form-group">
            <label for="noStock">Nomor Unit</label>
            <input type="text" class="form-control" name="nostock" id="noStock" required="required">
          </div>
<!--           <div class="form-group">
            <label for="priceList">Harga Sewa</label>
            <input type="text" class="form-control" name="pricelist" id="priceList" required="required">
          </div>
 -->      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>