<div class="container mt-5">
	<div class="card text-center">
	  <div class="card-header">
	    <?= $data['kost']['nama_kost'] ?>
	  </div>
	  <div class="card-body">
	    <h5 class="card-title">
	    	<b><?= $gen = ($data['kost']['general'] == '1') ? 'Khusus Laki - Laki' : ($data['kost']['general'] == '2') ? 'Khusus Perempuan' : 'Semua Gender'?>	    		
	    	</b>	    	
	    </h5>
	    <p class="card-text">
	    	<?= $data['kost']['alamat_kost'] ?>
<!-- 	    <br>
	    	<?= $data['kost']['jml_pintu'] ?> Pintu
 -->	    <br>
	    	<p>Rating <img src="<?= BASEURL ?>/icon/png/star-2x.png"?></p>
	    </p>	    
	  </div>
	  <div class="card-footer text-muted">
	    <a href="<?= BASEURL ?>/kost" class="btn btn-primary">Kembali</a>
	  </div>
	</div>	
</div>