<?php 

/**
 * 
 */
class Kost extends Controller
{
	public function index()
	{
		$data['judul'] = 'Kost';
		$data['kost'] = $this->model('Kost_model')->getKostAll();
		$this->view('templates/header',$data);
		$this->view('kost/index',$data);
		$this->view('templates/footer');
	}

	public function detail($id)
	{
		$data['judul'] = 'Kost';
		$data['kost'] = $this->model('Kost_model')->getKostbyId($id);
		$this->view('templates/header',$data);
		$this->view('kost/detail',$data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		if($this->model('Kost_model')->tambahKost($_POST) > 0)
		{			
			FlashMsg::setFlash('Kost','berhasil','ditambahkan','success','');
			header('Location: ' . BASEURL .'/kost');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Kost','gagal','ditambahkan','danger','');
			header('Location: ' . BASEURL .'/kost');
			exit;
		}
	}

	public function hapus($id)
	{
		if($this->model('Kost_model')->hapusKost($id) > 0)
		{			
			FlashMsg::setFlash('Kost','berhasil','dihapuskan','success','');
			header('Location: ' . BASEURL .'/kost');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Kost','gagal','dihapuskan','danger','<br>Kemungkinan Karena : <br><ol><li>Kost sudah memiliki lokasi.</li></ol>');
			header('Location: ' . BASEURL .'/kost');
			exit;
		}
	}
	
	public function getubah()
	{
		echo json_encode($this->model('Kost_model')->getKostbyId($_POST["id"]));
	}

	public function ubah()
	{
		if($this->model('Kost_model')->ubahKost($_POST) > 0)
		{			
			FlashMsg::setFlash('Kost','berhasil','diubah','success','');
			header('Location: ' . BASEURL .'/kost');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Kost','gagal','diubah','danger','');
			header('Location: ' . BASEURL .'/kost');
			exit;
		}
	}

	public function cari()
	{
		$data['judul'] = 'Kost';
		$data['kost'] = $this->model('Kost_model')->cariKost();
		$this->view('templates/header',$data);
		$this->view('kost/index',$data);
		$this->view('templates/footer');
	}
}	