<div class="container mt-3">
  <div class="row">
     <div class="col-lg-6">
       <?php FlashMsg::flash(); ?>
     </div>
  </div>

  <div class="row mb-4">
    <div class="col-lg-6">
      <h3>Matrikulasi</h3>
      <form method="post" action="<?= BASEURL?>/matrikulasi/simpanMatrikulasi">
      <table class="table">
        <caption>List of users</caption>
        <thead>
          <tr>
              <th scope="col">***</th>
            <?php foreach ($data['kost'] as $kost) :?>
              <th scope="col"><?= $kost['nama_kost']; ?></th>
            <?php endforeach ?>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($data['user'] as $user) :?>
              <tr>
                <th scope="col"><?= $user['id_user']; ?></th>
                <?php foreach ($data['kost'] as $cbkost) :?>
                  <th>
                    <input type="checkbox" name="data[]" value="<?= $user["id_user"].';'.$cbkost["id_kost"]; ?>" <?= $checked = $user["id_kost"] != "" && $user["id_kost"] == $cbkost["id_kost"] ? "checked" : "" ?>>
                  </th>
                <?php endforeach ?>
              </tr>
            <?php endforeach ?>          
        </tbody>
      </table>
      <button type="submit" class="btn btn-primary">Simpan</button>    
      </form>
    </div>
  </div>
</div>