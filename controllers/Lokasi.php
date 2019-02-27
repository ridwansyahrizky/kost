<?php 

/**
 * 
 */
class Lokasi extends Controller
{
	public function index()
	{
		$data['judul'] = 'Setup Lokasi';
		$data['lokasi'] = $this->model('Lokasi_model')->getLokasiAll();
		$data['fasilitas'] = $this->model('Fasilitas_model')->getFasilitasAll();
		$data['kost'] = $this->model('Kost_model')->getKostAll();
		$this->view('templates/header',$data);
		$this->view('lokasi/index',$data);
		$this->view('templates/footer');
	}

	public function detail($id)
	{
		$data['judul'] = 'Lokasi';
		$data['lokasi'] = $this->model('Lokasi_model')->getLokasibyId($id);
		$this->view('templates/header',$data);
		$this->view('lokasi/detail',$data);
		$this->view('templates/footer');
	}

	public function tambah()
	{		
		if($this->model('Lokasi_model')->tambahLokasi($_POST) > 0)
		{			
			FlashMsg::setFlash('Lokasi','berhasil','ditambahkan','success','');
			header('Location: ' . BASEURL .'/lokasi');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Lokasi','gagal','ditambahkan','danger','<br>Kemungkinan Karena : <br><ol><li>Nama Kost belum di pilih.</li><li>ID Lokasi sudah ada.</li></ol>');
			header('Location: ' . BASEURL .'/lokasi');
			exit;
		}
	}

	public function hapus($id,$idlokasi,$idkost)
	{
		if($this->model('Lokasi_model')->hapusLokasi($id,$idlokasi,$idkost) > 0)
		{			
			FlashMsg::setFlash('Lokasi','berhasil','dihapuskan','success','');
			header('Location: ' . BASEURL .'/lokasi');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Lokasi','gagal','dihapuskan','danger','<br>Kemungkinan Karena : <br><ol><li>Lokasi sudah memiliki unit.</li></ol>');
			header('Location: ' . BASEURL .'/lokasi');
			exit;
		}
	}
	
	public function getubah()
	{
		echo json_encode($this->model('Lokasi_model')->getLokasibyId($_POST["id"]));
	}

	public function ubah()
	{
		if($this->model('Lokasi_model')->ubahLokasi($_POST) > 0)
		{			
			FlashMsg::setFlash('Lokasi','berhasil','diubah','success','');
			header('Location: ' . BASEURL .'/lokasi');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Lokasi','gagal','diubah','danger','');
			header('Location: ' . BASEURL .'/lokasi');
			exit;
		}
	}

	public function cari()
	{		
		$data['judul'] = 'Setup Lokasi';
		$data['lokasi'] = $this->model('Lokasi_model')->cariLokasi();
		$data['kost'] = $this->model('Kost_model')->getKostAll();		
		$this->view('templates/header',$data);
		$this->view('lokasi/index',$data);
		$this->view('templates/footer');
	}	
}