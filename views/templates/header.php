<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman <?= $data['judul']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL;?>/css/bootstrap.css">	
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	  <a class="navbar-brand" href="<?= BASEURL; ?>">JURAGAN KOST</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item <?= $a = ($data['judul']) == 'Home' ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
	      </li>
		  <li class="nav-item dropdown <?= $a = ($data['judul']) == 'Setup Lokasi' || ($data['judul']) == 'Setup Unit' || ($data['judul']) == 'Upload Stock' || ($data['judul']) == 'Setup Fasilitas' || ($data['judul'] == 'Kost') ? 'active' : '' ?>">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Setting
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="<?= BASEURL; ?>/kost">Setup Kost</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/fasilitas">Setup Fasilitas</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/lokasi">Setup Lokasi</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/lokasi">Verifikasi Lokasi</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/stock">Setup Master Unit</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/upload">Upload Stock</a>
	          <!-- <a class="dropdown-item" href="<?= BASEURL; ?>/skema">Setup Skema Pembayaran</a>	           -->
	        </div>
	      </li>
		  <li class="nav-item dropdown <?= $a = ($data['judul']) == 'User' || ($data['judul']) == 'Utilitas'? 'active' : '' ?>">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Security
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="<?= BASEURL; ?>/user">User</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/utilitas">Utilitas User</a>	          
	          <!-- <a class="dropdown-item" href="<?= BASEURL; ?>/matrikulasi">Matrikulasi User</a>	           -->
	        </div>
	      </li>
		  <li class="nav-item dropdown <?= $a = ($data['judul']) == 'Customer' || ($data['judul']) == 'Sewa' || ($data['judul']) == 'Pembayaran' || ($data['judul']) == 'Penagihan'? 'active' : '' ?>">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Transaksi
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="<?= BASEURL; ?>/customer">Customer</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/sewa">Sewa</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/tagihan">Penagihan</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/bayar">Pembayaran</a>
	        </div>
	      </li>
<!-- 		  <li class="nav-item dropdown <?= $a = ($data['judul']) == 'Transaksi Online' ? 'active' : '' ?>">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Sewa
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="<?= BASEURL; ?>/sewa">Closing Sewa</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/sewa">Batal Sewa</a>
	        </div>
	      </li>
		  <li class="nav-item dropdown <?= $a = ($data['judul']) == 'Transaksi Online' ? 'active' : '' ?>">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Penagihan
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="<?= BASEURL; ?>/sewa">Peringatan</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/sewa">Tunggakan</a>
	        </div>
	      </li>
		  <li class="nav-item dropdown <?= $a = ($data['judul']) == 'Transaksi Online' ? 'active' : '' ?>">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Pembayaran
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="<?= BASEURL; ?>/sewa">Closing Sewa</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/sewa">Batal Sewa</a>
	        </div>
	      </li>
 -->	      <li class="nav-item <?= $a = ($data['judul']) == 'About' ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= BASEURL; ?>/about">About</a>
	      </li>
	      <li class="nav-item <?= $a = ($data['judul']) == 'About' ? 'active' : '' ?>">
	        <a class="nav-link" href="../signout.php">Logout</a>
	      </li>
<!-- 		  <li class="nav-item dropdown <?= $a = ($data['judul']) == 'Transaksi Manual' ? 'active' : '' ?>">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Transaksi Manual
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">			  
	      	  <a class="dropdown-item" href="<?= BASEURL; ?>/transaksi/closingmanual">Closing Sewa Manual</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/transaksi/bayarmanual">Pembayaran Manual</a>	         
	        </div>
	      </li>
		  <li class="nav-item dropdown <?= $a = ($data['judul']) == 'Collection' ? 'active' : '' ?>">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Collection
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">			  
	      	  <a class="dropdown-item" href="<?= BASEURL; ?>/collection/penawaran">Penawaran Perpanjangan Sewa</a>
	          <a class="dropdown-item" href="<?= BASEURL; ?>/collection/peringatan">Surat Peringatan Sewa</a>	         
	          <a class="dropdown-item" href="<?= BASEURL; ?>/collection/ratingcustomer">Rating Customer</a>	         
	        </div>
	      </li>
 -->
	    </ul>
	  </div>
	</div>	
</nav>