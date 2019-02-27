<?php 

/**
 * 
 */
class Stock extends Controller
{
	
	public function index()
	{
		$data['judul'] = 'Setup Unit';
		// $data['lokasi'] = $this->model('Lokasi_model')->getLokasiAll();
		$data['stock'] = $this->model('Stock_model')->getStockAll();
		$data['kost'] = $this->model('Kost_model')->getKostAll();
		$this->view('templates/header',$data);
		$this->view('stock/index',$data);
		$this->view('templates/footer');
	}

	public function filterlokasi()
	{
		echo json_encode($this->model('Stock_model')->filterLokasibyKost($_POST["id"]));
	}

	public function tambah()
	{
		if($this->model('Stock_model')->tambahStock($_POST) > 0)
		{			
			FlashMsg::setFlash('Unit','berhasil','ditambahkan','success','');
			header('Location: ' . BASEURL .'/stock');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Unit','gagal','ditambahkan','danger','<br>Kemungkinan Karena : <br><ol><li>Nama Kost belum di pilih.</li><li>Nama Lokasi belum dipilih.</li><li>Harga harus angka.</li></ol>');
			header('Location: ' . BASEURL .'/stock');
			exit;
		}
	}
	public function hapus($id)
	{
		if($this->model('Stock_model')->hapusStock($id) > 0)
		{			
			FlashMsg::setFlash('Unit','berhasil','dihapuskan','success','');
			header('Location: ' . BASEURL .'/stock');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Unit','gagal','dihapuskan','danger','<br>Kemungkinan Karena : <br><ol><li>Stock sudah disewa.</li></ol>');
			header('Location: ' . BASEURL .'/stock');
			exit;
		}
	}
	
	public function getubah()
	{
		echo json_encode($this->model('Stock_model')->getStockbyId($_POST["id"]));
	}

	public function ubah()
	{
		if($this->model('Stock_model')->ubahStock($_POST) > 0)
		{			
			FlashMsg::setFlash('Unit','berhasil','diubah','success','');
			header('Location: ' . BASEURL .'/stock');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Unit','gagal','diubah','danger','');
			header('Location: ' . BASEURL .'/stock');
			exit;
		}
	}

	public function cari()
	{						
		$data['judul'] = 'Setup Unit';
		$data['stock'] = $this->model('Stock_model')->getStockbyKostLokasi($_POST["listkost"],$_POST["listlokasi"]);
		$data['kost'] = $this->model('Kost_model')->getKostAll();		
		$data['lokasi'] = $this->model('Lokasi_model')->getLokasibyKost($_POST["listkost"]);
		$this->view('templates/header',$data);
		$this->view('stock/index',$data);
		$this->view('templates/footer');
	}	

	public function upload($value='')
	{
		# code...
	}
}