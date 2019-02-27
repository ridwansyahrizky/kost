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
        Tambah Data Customer
      </button>
      <button type="button" class="btn btn-primary tambahData" data-toggle="modal" data-target="#formmodal2">
        Tambah User Customer
      </button>
    </div>
  </div>
  <!-- Search -->
  <div class="row">
    <div class="col-lg-6">
      <form action="<?= BASEURL ?>/customer/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Customer" name="keyword" id="keyword" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="cari" name="cari">Cari</button>
          </div>
        </div>      
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <h3>Daftar Customer</h3>
      <?php foreach ($data['customer'] as $customer) : ?>
      <ul class="list-group">
        <li class="list-group-item">
          <?= $customer['nama_customer'] .' - '. $customer['id_user'] ?>          
          <a href="<?= BASEURL; ?>/customer/hapus/<?= $customer['sn']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin Gan?');">Hapus</a>
          <a href="<?= BASEURL; ?>/customer/hapus/<?= $customer['sn']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formmodal" data-id="<?= $customer['sn'];?>">Edit</a>
          <a href="<?= BASEURL; ?>/customer/detail/<?= $customer['sn']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
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
        <h5 class="modal-title" id="judulmodal" data-id="Customer">Tambah Data Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/customer/tambah" method="post">
          <div class="form-group">
            <label for="namaCustomer">Nama Lengkap Customer</label>
            <input type="text" class="form-control" name="nama" id="namaCustomer" required="required">
          </div>
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                  <input type="hidden" name="id" id="id">
                  <div class="form-group">
                    <label for="Kewarganegaraan">Kewarganegaraan</label>
                    <br>
                    <div class="form-control" style="border: none;">
                      <input type="radio" name="kewarganegaraan" id="Kewarganegaraan" value="WNI" checked onclick="setMin('WNI');">WNI 
                      <input type="radio" name="kewarganegaraan" id="Kewarganegaraan" value="WNA" onclick="setMin('WNA');">WNA
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="noKTP">No. Identitas</label>
                    <input type="text" class="form-control" name="ktp" id="noKTP" required="required">
                  </div>
                  <div class="form-group">
                    <label for="tempatLahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat" id="tempatLahir" required="required">
                  </div>
                  <div class="form-group">
                    <label for="tglLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgllahir" id="tglLahir" required="required">
                  </div>      
                  <div class="form-group">
                    <label for="statusKawin">Status Perkawinan</label>
                    <select name="marital" id="statusKawin" class="form-control">
                      <option value="BELUM KAWIN">BELUM KAWIN</option>
                      <option value="KAWIN">KAWIN</option>
                      <option value="CERAI">CERAI</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 ml-auto">
                  <div class="form-group">
                    <label for="noHP">No. Handphone</label>
                    <input type="text" class="form-control" name="hp" id="noHP" required="required">
                  </div>
                  <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="email" id="Email" required="required">
                  </div>
                  <div class="form-group">
                    <label for="namaKerabat">Nama Kerabat</label>
                    <input type="text" class="form-control" name="namakerabat" id="namaKerabat" required="required">
                  </div>
                  <div class="form-group">
                    <label for="nohpKerabat">No HP Kerabat</label>
                    <input type="text" class="form-control" name="hpkerabat" id="nohpKerabat" required="required">
                  </div>
                  <div class="form-group">
                    <label for="hubunganKerabat">Hubungan Kerabat</label>
                    <select name="hubungankerabat" id="hubunganKerabat" class="form-control">
                      <option value="ORANG TUA">ORANG TUA</option>
                      <option value="ISTRI">ISTRI</option>
                      <option value="ANAK">ANAK</option>
                      <option value="SAUDARA KANDUNG">SAUDARA KANDUNG</option>
                      <option value="KERABAT LAINNYA">KERABAT LAINNYA</option>
                    </select>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal User -->
<div class="modal fade" id="formmodal2" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulmodal" data-id="User">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/user/tambahUserCustomer" method="post">
          <input type="hidden" name="id" id="id">
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
            <label for="idCustomer">ID Customer</label>
            <select name="idcustomer" id="idCustomer" class="form-control">
              <?php foreach ($data["customer2"] as $blank) : ?>
                <option value="<?= $blank['id_customer']; ?>"><?= $blank["id_customer"] .' - '. $blank["nama_customer"]; ?></option>
              <?php endforeach ?>
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
<script type="text/javascript">
  function setMin(kewarga){
    if(kewarga == "WNI")
      $('#noKTP').attr('minlength','16');
    else
      $('#noKTP').attr('minlength','50');
  }
</script>