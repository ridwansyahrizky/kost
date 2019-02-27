<?php 

/**
 * 
 */
class User extends Controller
{
	public function index()
	{
		$data['judul'] = 'User';
		$data['kost'] = $this->model('Kost_model')->getKostAll();
		$data['user'] = $this->model('User_model')->getUserAll();
		$this->view('templates/header',$data);
		$this->view('user/index',$data);//ini manggil class view di folder core dan Controller.php
		$this->view('templates/footer');
	}
	
	public function blokir($id)
	{
		if($this->model('User_model')->Blokir($id) > 0)
		{			
			FlashMsg::setFlash('User','berhasil','diblokir','success','');
			header('Location: ' . BASEURL .'/utilitas');
			exit;
		}
		else
		{
			FlashMsg::setFlash('User','gagal','diblokir','danger','');
			header('Location: ' . BASEURL .'/utilitas');
			exit;
		}
	}

	public function aktivasi($id)
	{
		if($this->model('User_model')->Aktivasi($id) > 0)
		{			
			FlashMsg::setFlash('User','berhasil','di aktivasi','success','');
			header('Location: ' . BASEURL .'/utilitas');
			exit;
		}
		else
		{
			FlashMsg::setFlash('User','gagal','di aktivasi','danger','');
			header('Location: ' . BASEURL .'/utilitas');
			exit;
		}
	}

	public function tambah()
	{
		if($this->model('User_model')->tambahUser($_POST) > 0)
		{			
			FlashMsg::setFlash('User','berhasil','ditambahkan','success','');
			header('Location: ' . BASEURL .'/user');
			exit;
		}
		else
		{
			FlashMsg::setFlash('User','gagal','ditambahkan','danger','<br>Kemungkinan Karena : <br><ol><li>ID User sudah ada.</li><li>Konfirmasi password tidak sama.</li></ol>');
			header('Location: ' . BASEURL .'/user');
			exit;
		}
	}

	public function tambahUserCustomer()
	{
		if($this->model('User_model')->tambahUserCustomer($_POST) > 0)
		{			
			FlashMsg::setFlash('User Customer','berhasil','ditambahkan','success','');
			header('Location: ' . BASEURL .'/customer');
			exit;
		}
		else
		{
			FlashMsg::setFlash('User Customer','gagal','ditambahkan','danger','<br>Kemungkinan Karena : <br><ol><li>ID User sudah ada.</li><li>Konfirmasi password tidak sama.</li><li>ID Customer belum dipilih.</li></ol>');
			header('Location: ' . BASEURL .'/customer');
			exit;
		}
	}

	public function hapus($id)
	{
		if($this->model('User_model')->hapusUser($id) > 0)
		{			
			FlashMsg::setFlash('User','berhasil','dihapuskan','success','');
			header('Location: ' . BASEURL .'/user');
			exit;
		}
		else
		{
			FlashMsg::setFlash('User','gagal','dihapuskan','danger','');
			header('Location: ' . BASEURL .'/user');
			exit;
		}
	}

	public function getubah()
	{
		echo json_encode($this->model('User_model')->getUserbyId($_POST["id"]));
	}

	public function ubah()
	{
		if($this->model('User_model')->ubahUser($_POST) > 0)
		{			
			FlashMsg::setFlash('User','berhasil','diubah','success','');
			header('Location: ' . BASEURL .'/user');
			exit;
		}
		else
		{
			FlashMsg::setFlash('User','gagal','diubah','danger','');
			header('Location: ' . BASEURL .'/user');
			exit;
		}
	}

	public function setpass()
	{
		// var_dump($this->model('User_model')->SetPass($_POST));;
		if($this->model('User_model')->SetPass($_POST) > 0)
		{			
			FlashMsg::setFlash('Password User','berhasil','diubah','success','');
			header('Location: ' . BASEURL .'/utilitas');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Password User','gagal','diubah','danger','<br>Kemungkinan Karena : <br><ol><li>Konfirmasi password tidak sama.</li><li>Password lama salah.</li></ol>');
			header('Location: ' . BASEURL .'/utilitas');
			exit;
		}
	}

	public function cari()
	{
		$data['judul'] = 'User';
		$data['user'] = $this->model('User_model')->cariUser();
		$this->view('templates/header',$data);
		$this->view('user/index',$data);
		$this->view('templates/footer');
	}

}