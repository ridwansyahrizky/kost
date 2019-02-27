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
        Tambah Data Kost
      </button>
    </div>
  </div>
  <!-- Search -->
  <div class="row">
    <div class="col-lg-6">
      <form action="<?= BASEURL ?>/kost/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Kost" name="keyword" id="keyword" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="cari" name="cari">Cari</button>
          </div>
        </div>      
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <h3>Daftar Kost-an</h3>
      <?php foreach ($data['kost'] as $kost) : ?>
      <ul class="list-group">
        <li class="list-group-item">
          <?= $kost['nama_kost'] ?>          
          <a href="<?= BASEURL; ?>/kost/hapus/<?= $kost['sn']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin Gan?');">Hapus</a>
          <a href="<?= BASEURL; ?>/kost/hapus/<?= $kost['sn']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formmodal" data-id="<?= $kost['sn'];?>">Edit</a>
<!--           <a href="<?= BASEURL; ?>/kost/detail/<?= $kost['sn']; ?>" class="badge badge-primary float-right ml-1">Detail</a> -->
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
        <h5 class="modal-title" id="judulmodal" data-id="Kost">Tambah Data Kost</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/kost/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="namaKost">Nama Kost</label>
            <input type="text" class="form-control" name="nama" id="namaKost" required="required">
          </div>
<!--           <div class="form-group">
            <label for="alamatKost">Alamat Kost</label>
            <input type="text" class="form-control" name="alamat" id="alamatKost" required="required">
          </div> -->
          <div class="form-group">
            <label for="namaPemilik">Nama Pemilik</label>
            <input type="text" class="form-control" name="namapemilik" id="namaPemilik" required="required">
          </div>
          <div class="form-group">
            <label for="noKontak1">No. Kontak 1</label>
            <input type="text" class="form-control" name="nokontak1" id="noKontak1" required="required">
          </div>
          <div class="form-group">
            <label for="noKontak2">No. Kontak 2</label>
            <input type="text" class="form-control" name="nokontak2" id="noKontak2">
          </div>
<!--           <div class="form-group">
            <label for="jmlKamar">Jumlah Kamar</label>
            <input type="text" class="form-control" name="jumlahkamar" id="jmlKamar">
          </div>          
 -->          <!-- <div class="form-group">
            <label for="fasilitasKost">Fasilitas</label>
            <input type="checkbox" class="form-control" value="kamarmandi" text="Kamar">Kamar
            <select name="fasilitasKost" id="fasilitas" class="form-control">
              <option value="kamarmandi">Kamar Mandi Dalam</option>
              <option value="wifi">Wi-FI</option>
              <option value="parkir">Tempat Parkir Kendaraan</option>
            </select>
          </div> -->
          <div class="form-group">
            <label for="tipeKost">Tipe Kost</label>
            <select name="tipe" id="tipeKost" class="form-control">
              <option value="0">Semua Gender</option>
              <option value="1">Khusus Putra</option>
              <option value="2">Khusus Putri</option>
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