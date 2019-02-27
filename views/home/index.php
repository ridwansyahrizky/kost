<div class="container">	
	<div class="jumbotron mt-5">
	  <h1 class="display-4">Selamat Datang <?= $data["user"]["nama_user"]; ?>, di Website Juragan Kost</h1>
	  <p class="lead">Sebuah website yang diperuntukkan kepada pemilik kost, penghuni kost dan calon penghuni kost.</p>
	  <hr class="my-4">	  	  	
		<?php if($data["session"] == "")  : ?>
		  	<a class="btn btn-primary btn-lg" href="<?= BASEURL; ?>/login" role="button">Login</a>
		<?php endif ?>
	</div>	

	  <div class="row">
    <div class="col-lg-6">
      <h2>Reminder</h2>
      <ul class="list-group">
<!--         <li class="list-group-item">
        	<b>Reminder Complain</b>
	          <a href="<?= BASEURL; ?>/reminder ?>" class="badge badge-success float-right ml-1">Next</a>
	          <a href="<?= BASEURL; ?>/reminder ?>" class="badge badge-danger float-right ml-1">1</a>
        </li>
 -->        <li class="list-group-item">
        	<b>Reminder Penerimaan Pembayaran</b>
	          <a href="<?= BASEURL; ?>/reminder/penerimaan ?>" class="badge badge-success float-right ml-1">Next</a>
	          <a href="<?= BASEURL; ?>/reminder/penerimaan ?>" class="badge badge-danger float-right ml-1">1</a>
        </li>
        <li class="list-group-item">
        	<b>Reminder Pengajuan Perpanjangan Sewa</b>
	          <a href="<?= BASEURL; ?>/reminder/perpanjangan ?>" class="badge badge-success float-right ml-1">Next</a>
	          <a href="<?= BASEURL; ?>/reminder/perpanjangan ?>" class="badge badge-danger float-right ml-1">1</a>
        </li>
        <li class="list-group-item">
        	<b>Reminder Pengajuan Pemberhentian Sewa</b>
	          <a href="<?= BASEURL; ?>/reminder/pemberhentian ?>" class="badge badge-success float-right ml-1">Next</a>
	          <a href="<?= BASEURL; ?>/reminder/pemberhentian ?>" class="badge badge-danger float-right ml-1">1</a>
        </li>
        <li class="list-group-item">
        	<b>Reminder Perpanjangan Sewa</b>
	          <a href="<?= BASEURL; ?>/reminder/perpanjangcust ?>" class="badge badge-success float-right ml-1">Next</a>
	          <a href="<?= BASEURL; ?>/reminder/perpanjangcust ?>" class="badge badge-danger float-right ml-1">1</a>
        </li>
        <li class="list-group-item">
        	<b>Reminder Pemberhentian Sewa</b>
	          <a href="<?= BASEURL; ?>/reminder/pemberhentiancust ?>" class="badge badge-success float-right ml-1">Next</a>
	          <a href="<?= BASEURL; ?>/reminder/pemberhentiancust ?>" class="badge badge-danger float-right ml-1">1</a>
        </li>
        <li class="list-group-item">
        	<b>Reminder Pembayaran</b>
	          <a href="<?= BASEURL; ?>/reminder/pembayaran ?>" class="badge badge-success float-right ml-1">Next</a>
	          <a href="<?= BASEURL; ?>/reminder/pembayaran ?>" class="badge badge-danger float-right ml-1">1</a>
        </li>
      </ul>
    </div>
  </div>
</div>
