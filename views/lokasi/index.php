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
        Tambah Data Lokasi
      </button>
    </div>
  </div>
  <!-- Search -->
  <form action="<?= BASEURL ?>/lokasi/cari" method="post">
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
      <h3>Daftar Lokasi</h3>
      <?php foreach ($data['lokasi'] as $lokasi) : ?>
      <ul class="list-group">
        <li class="list-group-item">
          <?= $lokasi['nama_lokasi'] ?>
          <a href="<?= BASEURL; ?>/lokasi/hapus/<?= $lokasi['sn']; ?>/<?= $lokasi['id_lokasi']; ?>/<?= $lokasi['id_kost']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin Gan?');">Hapus</a>
          <a href="<?= BASEURL; ?>/lokasi/hapus/<?= $lokasi['sn']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formmodal" data-id="<?= $lokasi['sn'];?>">Edit</a>          
        </li>
      </ul>
      <?php endforeach ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulmodal" data-id="Lokasi">Tambah Data Lokasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/lokasi/tambah" method="post">
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
            <label for="idLokasi">ID Lokasi</label>
            <input type="text" class="form-control" name="idlokasi" id="idLokasi" required="required">
          </div>
          <div class="form-group">
            <label for="namaLokasi">Nama Lokasi</label>
            <input type="text" class="form-control" name="namalokasi" id="namaLokasi" required="required">
          </div>
          <hr>
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ukuranKamar">Ukuran Kamar</label>
                    <input type="text" class="form-control" name="ukurankamar" id="ukuranKamar" required="required">
                  </div>
                  <div class="form-group">
                    <label>Fasilitas Kamar</label>
                    <br>
                    <table>
                      <?php 
                      $index = 0;
                      foreach ($data["fasilitas"] as $fasilitas) :?>
                        <?php if($fasilitas["tipe_fasilitas"] == "1") :?>
                          <?php if ($index / 2 == 0) { ?>
                            <tr>
                               <td><input type="checkbox" name="fasilitaskamar[]" class="fasilitaskamar" id="<?= $fasilitas["nama_fasilitas"]; ?>" value="<?= $fasilitas["id_fasilitas"]; ?>"> <label for="<?= $fasilitas["nama_fasilitas"]; ?>"><?= $fasilitas["nama_fasilitas"]; ?></label></td>
                          <?php } else { ?>
                               <td><input type="checkbox" name="fasilitaskamar[]" class="fasilitaskamar" id="<?= $fasilitas["nama_fasilitas"]; ?>" value="<?= $fasilitas["id_fasilitas"]; ?>"> <label for="<?= $fasilitas["nama_fasilitas"]; ?>"><?= $fasilitas["nama_fasilitas"]; ?></label></td>
                            </tr>
                          <?php } ?>
                        <?php $index++; endif ?>
                      <?php endforeach; $index = 0; ?>
                    </table>                    
                  </div>
                </div>
                <div class="col-md-6 ml-auto">
                  <div class="form-group">
                    <label for="hargaSewa">Harga Sewa (Rp)</label>
                    <input type="text" class="form-control" name="hargasewa" id="hargaSewa" required="required">
                  </div>
                  <div class="form-group">
                    <label>Fasilitas Kamar Mandi</label>
                    <br>
                    <table>
                      <?php 
                      foreach ($data["fasilitas"] as $fasilitas) :?>
                        <?php if($fasilitas["tipe_fasilitas"] == "2") :?>
                          <?php if ($index / 2 == 0) { ?>
                            <tr>
                               <td><input type="checkbox" name="fasilitaskamarmandi[]" class="fasilitaskamarmandi" id="<?= $fasilitas["nama_fasilitas"]; ?>" value="<?= $fasilitas["id_fasilitas"]; ?>"> <label for="<?= $fasilitas["nama_fasilitas"]; ?>"><?= $fasilitas["nama_fasilitas"]; ?></label></td>
                          <?php } else { ?>
                               <td><input type="checkbox" name="fasilitaskamarmandi[]" class="fasilitaskamarmandi" id="<?= $fasilitas["nama_fasilitas"]; ?>" value="<?= $fasilitas["id_fasilitas"]; ?>"> <label for="<?= $fasilitas["nama_fasilitas"]; ?>"><?= $fasilitas["nama_fasilitas"]; ?></label></td>
                            </tr>
                          <?php } ?>
                        <?php $index++; endif ?>
                      <?php endforeach; $index = 0; ?>
                    </table>                  
                  </div>
                </div>                
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Fasilitas Umum</label>
                    <br>
                    <table>
                      <?php 
                      foreach ($data["fasilitas"] as $fasilitas) :?>
                        <?php if($fasilitas["tipe_fasilitas"] == "3") :?>
                          <?php if ($index / 2 == 0) { ?>
                            <tr>
                               <td><input type="checkbox" name="fasilitasumum[]" class="fasilitasumum" id="<?= $fasilitas["nama_fasilitas"]; ?>" value="<?= $fasilitas["id_fasilitas"]; ?>"> <label for="<?= $fasilitas["nama_fasilitas"]; ?>"><?= $fasilitas["nama_fasilitas"]; ?></label></td>
                          <?php } else { ?>
                               <td><input type="checkbox" name="fasilitasumum[]" class="fasilitasumum" id="<?= $fasilitas["nama_fasilitas"]; ?>" value="<?= $fasilitas["id_fasilitas"]; ?>"> <label for="<?= $fasilitas["nama_fasilitas"]; ?>"><?= $fasilitas["nama_fasilitas"]; ?></label></td>
                            </tr>
                          <?php } ?>
                        <?php $index++; endif ?>
                      <?php endforeach; $index = 0;?>
                    </table>                    
                  </div>
                </div>                
                <div class="col-md-6 ml-auto">
                  <div class="form-group">
                    <label>Fasilitas Parkir</label>
                    <br>
                    <table>
                      <?php 
                      foreach ($data["fasilitas"] as $fasilitas) :?>
                        <?php if($fasilitas["tipe_fasilitas"] == "4") :?>
                          <?php if ($index / 2 == 0) { ?>
                            <tr>
                               <td><input type="checkbox" name="fasilitasparkir[]" class="fasilitasparkir" id="<?= $fasilitas["nama_fasilitas"]; ?>" value="<?= $fasilitas["id_fasilitas"]; ?>"> <label for="<?= $fasilitas["nama_fasilitas"]; ?>"><?= $fasilitas["nama_fasilitas"]; ?></label></td>
                          <?php } else { ?>
                               <td><input type="checkbox" name="fasilitasparkir[]" class="fasilitasparkir" id="<?= $fasilitas["nama_fasilitas"]; ?>" value="<?= $fasilitas["id_fasilitas"]; ?>"> <label for="<?= $fasilitas["nama_fasilitas"]; ?>"><?= $fasilitas["nama_fasilitas"]; ?></label></td>
                            </tr>
                          <?php } ?>
                        <?php $index++; endif ?>
                      <?php endforeach; $index = 0;?>
                    </table>                  
                  </div>
                </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Akses Lingkungan</label>
                    <br>
                    <table>
                      <tr>
                        <td><input type="checkbox" name="akses[]" class="akses" value="1" id="Apotek"> <label for="Apotek">Apotek / Klinik</label></td>
                        <td><input type="checkbox" name="akses[]" class="akses" value="2" id="Sekolah"> <label for="Sekolah">Kampus / Sekolah</label></td>
                        <td><input type="checkbox" name="akses[]" class="akses" value="3" id="rumahMakan"> <label for="rumahMakan">Rumah Makan</label></td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="akses[]" class="akses" value="4" id="miniMarket"> <label for="miniMarket">Mini Market</label></td>
                        <td><input type="checkbox" name="akses[]" class="akses" value="5" id="Masjid"> <label for="Masjid">Masjid</label></td>
                        <td><input type="checkbox" name="akses[]" class="akses" value="6" id="angkutanUmum"> <label for="angkutanUmum">Angkutan Umum</label></td>
                      </tr>
                    </table>                      
                  </div>
                </div>                
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Keterangan">Keterangan Lainnya</label>
                    <br>
                    <textarea style="width: 100%" name="keterangan" id="Keterangan"></textarea>
                  </div>
                </div>                
            </div>
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