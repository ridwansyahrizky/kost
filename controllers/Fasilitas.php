<?php 

/**
 * 
 */
class Fasilitas extends Controller
{
	public function index()
	{
		$data['judul'] = 'Setup Fasilitas';
		$data['fasilitas'] = $this->model('Fasilitas_model')->getFasilitasAll();
		$data['kost'] = $this->model('Kost_model')->getKostAll();
		$this->view('templates/header',$data);
		$this->view('fasilitas/index',$data);
		$this->view('templates/footer');
	}

	public function tambah()
	{		
		if($this->model('Fasilitas_model')->tambahFasilitas($_POST) > 0)
		{			
			FlashMsg::setFlash('Fasilitas','berhasil','ditambahkan','success','');
			header('Location: ' . BASEURL .'/fasilitas');
			exit;	
		}
		else
		{
			FlashMsg::setFlash('Fasilitas','gagal','ditambahkan','danger','<br>Kemungkinan Karena : <br><ol><li>Nama Kost belum di pilih.</li><li>Nama Fasilitas sudah ada dengan tipe yang sama.</li></ol>');
			header('Location: ' . BASEURL .'/fasilitas');
			exit;
		}
	}

	public function hapus($id,$idfasilitas,$idkost)
	{
		if($this->model('Fasilitas_model')->hapusFasilitas($id,$idfasilitas,$idkost) > 0)
		{			
			FlashMsg::setFlash('Fasilitas','berhasil','dihapuskan','success','');
			header('Location: ' . BASEURL .'/fasilitas');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Fasilitas','gagal','dihapuskan','danger','<br>Kemungkinan Karena : <br><ol><li>Fasilitas sudah dimiliki Lokasi.</li></ol>');
			header('Location: ' . BASEURL .'/fasilitas');
			exit;
		}
	}
	
	public function getubah()
	{
		echo json_encode($this->model('Fasilitas_model')->getFasilitasbyId($_POST["id"]));
	}

	public function ubah()
	{
		if($this->model('Fasilitas_model')->ubahFasilitas($_POST) > 0)
		{			
			FlashMsg::setFlash('Fasilitas','berhasil','diubah','success','');
			header('Location: ' . BASEURL .'/fasilitas');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Fasilitas','gagal','diubah','danger','');
			header('Location: ' . BASEURL .'/fasilitas');
			exit;
		}
	}

	public function cari()
	{		
		$data['judul'] = 'Setup Fasilitas';
		$data['fasilitas'] = $this->model('Fasilitas_model')->cariFasilitas();
		$data['kost'] = $this->model('Kost_model')->getKostAll();		
		$this->view('templates/header',$data);
		$this->view('fasilitas/index',$data);
		$this->view('templates/footer');
	}	
}